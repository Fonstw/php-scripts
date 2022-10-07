<?php

class StringGenerator
{
	public function fromBase(int $min = 0, int $max = PHP_INT_MAX): string
	{
		// Generate a number as big as your PHP installation can generate.
		$randomNumber = random_int($min, $max);

		// Convert that from base 10 (all 10 digits) to base 36 (all 10 digits + all 26 letters)
		// 36 is also the highest base accepted by base_convert...
		return base_convert($randomNumber, 10, 36);
	}

	public function randomBytes(int $bytes = 12): string
	{
		// Generate random bytes (binary output, no text!) and encode that as base 64 string
		// Has all 10 digits, 26 lowercase letters, 26 uppercase letters and 2 characters (+ and /)
		// Pads with = if necessary.
		return base64_encode(random_bytes($bytes));
	}

	public function customFunction(int $length = 16, string $charset = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ `~!@#$%^&*()-=_+[]{};\'"\\|,./<>?'): string
	{
		// Will become the string to return.
		$string = '';
		// To make code more readable down the line
		$charsetLength = strlen($charset);

		// For as long as we want the string
		for ($c=0; $c < $length; $c++)
			// Add a random character from the charset
			$string .= $charset[random_int(0, $charsetLength-1)];

		// Return that string
		return $string;
	}
}

$stringGenerator = new StringGenerator;

// Read values from terminal arguments, but escape to own defaults.
$customLength = $argv[1] ?? 16;
$customCharSet = empty($argv[2]) ?  '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ `~!@#$%^&*()-=_+[]{};\'"\\|,./<>?' : $argv[2];

echo "By base conversion; generates digits and lowercase letters:\n";
echo $stringGenerator->fromBase() . "\n\n";

echo "By base64-encoding random bytes; generates digits, lowercase letters, uppercase letters, plusses and forward slashes, might produce equals-signs.\n";
// *.75 because converting plain-text to Base64 makes it 1/3 longer.
echo $stringGenerator->randomBytes($customLength * .75) . "\n\n";

echo "Using a custom function; generates the full keyboard layout or what was passed through the terminal:\n";
echo $stringGenerator->customFunction($customLength, $customCharSet) . "\n\n";

echo "They are all cryptographically secure.\n";
