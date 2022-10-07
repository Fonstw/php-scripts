<?php

$ja = true;
$nee = false;
$yes = true;

switch (true) {
	case $ja:
		echo 'Ja!' . PHP_EOL;
		break;

	case $nee:
		echo 'Nee!' . PHP_EOL;
		break;

	case $yes:
		echo 'Yes!' . PHP_EOL;
		break;

	default:
		echo 'Zijn we dan...' . PHP_EOL;
		break;
}
