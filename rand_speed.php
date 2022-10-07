<?php

echo "WiP!!\n";

$start = (double) microtime();

for ($i=0; $i < 1000000; $i++)
{
	$var = rand(0, PHP_INT_MAX);
}

$timeItTook = (double) microtime() - $start;

echo 'rand() took ' . $timeItTook . ' seconds.' . PHP_EOL;



$start = (double) microtime();

for ($i=0; $i < 1000000; $i++)
{
	$var = random_int(0, PHP_INT_MAX);
}

$timeItTook = (double) microtime() - $start;

echo 'random_int() took ' . $timeItTook . ' seconds.' . PHP_EOL;