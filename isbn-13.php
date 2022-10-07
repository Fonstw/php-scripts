<?php

if (count($argv) < 2)
	die("Please enter an ISBN-13 number, for example: 9781565926103\n");

# Example 9781565926103.
$isbn = $argv[1];

if (!is_numeric($isbn) || strlen($isbn) !== 13)
	die("Please enter 13 digits only, without dashes.\n");

$toCheck = substr($isbn, 0, 12);
$total = 0;
foreach (str_split($toCheck) as $index => $digit)
	$total += (int)$digit * ($index%2 ? 3 :1);

$nearest10 = ceil($total/10) * 10;
$checkDigit = $nearest10-$total;
var_dump($checkDigit);die;

$valid = $checkDigit == substr($isbn, 12);

echo "$isbn is " . ($valid ? "a valid" : "an invalid") . " ISBN number.\n";
