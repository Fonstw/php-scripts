<?php

if ($name = 'Henk')
	echo '✓ String assignment does it!' . PHP_EOL;
else
	echo '✘ Skips on string assignment.' . PHP_EOL;

if ($nobody = '')
	echo '✓ Also on empty ones!' . PHP_EOL;
else
	echo '✘ Not on empty ones.' . PHP_EOL;

if ($void = null)
	echo '✓ Null assignment does it!' . PHP_EOL;
else
	echo '✘ Skips on null assignment.' . PHP_EOL;

if ($date = new DateTime('2022-04-01'))
	echo '✓ Date assignment does it!' . PHP_EOL;
else
	echo '✘ Skips on date assignment.' . PHP_EOL;

if ($bool = true)
	echo '✓ Positive boolean assignment does it!' . PHP_EOL;
else
	echo '✘ skips on positive boolean assignment.' . PHP_EOL;

if ($bool = false)
	echo '✓ Also on negative ones!' . PHP_EOL;
else
	echo '✘ Not on negative ones.' . PHP_EOL;

if ($availability = 'yes')
    $availability = 'echwel';

$availability = isset($availability) ? 'available' : 'unavailable';

echo "\nA variable declared like this is $availability outside of their if's.\n";
