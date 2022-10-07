<?php

/**
 *
 */
class Person
{
	/** @var string */
	public $name;
	/** @var int */
	private $age;

	function __construct(?string $newName = null)
	{
		$this->name = $newName ?? bin2hex(random_bytes(8));

		$this->age = random_int(4, 95);
	}

	public function askSensitiveInfo(): int
	{
		return $this->age;
	}
}

function seeIfItWorks(object $person): string
{
	return $person->name . ' is ' . $person->askSensitiveInfo() . ' years old';
}

$james = new Person('James');

echo seeIfItWorks($james) . PHP_EOL;
