<?php

class OrderedUuidGenerator
{
	protected static function random_hex(int $length = 16): string
	{
		if ($length <= 15)
		{
			$gen = dechex(random_int(0, 16**$length - 1));
			$gen = str_pad($gen, $length, 0, STR_PAD_LEFT);

			return $gen;
		}

		$hex_string = '';

		for ($i=0; $i<$length; $i++)
			$hex_string .= dechex(random_int(0, 15));

		return $hex_string;
	}

	protected static function get_mac_hex(string $override = ''): string
	{
		if (strlen($override) === 12) {
			return $override;
		}

		exec("netstat -nr | grep default", $ip_output);
		$ip_output = implode("\n", $ip_output);
		preg_match_all('/(\d{1,3}.){3}\d{1,3}/', $ip_output, $matches);
		$ip_adress = $matches[0][0];

		exec("netstat -nr | grep $ip_adress", $mac_output);
		$mac_output = implode("\n", $mac_output);
		preg_match_all('/..:..:..:..:..:../', $mac_output, $matches);

		return str_replace(':', '', $matches[0][0]);
	}

	protected static function generate_base_uuid(): string
	{
		// First 12 chars based off timestamp.
		$base_uuid = dechex((int) (microtime(true) * 100_000));
		// Version number "unknown".
		$base_uuid .= dechex(random_int(6, 15));
		// Next 3 random.
		$base_uuid .= self::random_hex(3);
		// Variant digit "DCE 1.1, ISO/IEC 11578:1996".
		$base_uuid .= dechex(random_int(8, 11));
		// Next 15 are random and the MAC address.
		$base_uuid .= self::random_hex(3);
		$base_uuid .= self::get_mac_hex('44d45487da17');

		return $base_uuid;
	}

	/**
	 * Turns 00000000000000000000000000000000 to 00000000-0000-0000-0000-000000000000.
	 */
	protected static function format_uuid(string $uuid): string
	{
		// If the input isn't 32 characters long, don't use it.
		if (strlen($uuid) !== 32) {
			echo var_dump($uuid) . ' is not 32 characters long, and thus cannot be a valid UUID.' . PHP_EOL;
			die;
		}

		$dashed_uuid = substr_replace($uuid, '-', 8, 0);
		$dashed_uuid = substr_replace($dashed_uuid, '-', 13, 0);
		$dashed_uuid = substr_replace($dashed_uuid, '-', 18, 0);

		return substr_replace($dashed_uuid, '-', 23, 0);
	}

	public static function new(): string
	{
		$base_uuid = self::generate_base_uuid();

		return strtoupper(self::format_uuid($base_uuid));
	}
}

$ordered_uuid = new OrderedUuidGenerator();

echo $ordered_uuid->new();
