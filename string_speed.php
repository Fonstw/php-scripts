<?php

// Double quotes ("quotation marks")

$start = (double) microtime();

for ($i=0; $i < 1000000; $i++)
{
	$var = "var$i";
}

$timeForDouble = (double) microtime() - $start;

echo "Double quotes took $timeForDouble seconds\n";

// Single quotes ('apostrophes')

$start = (double) microtime();

for ($i=0; $i < 1000000; $i++)
{
	$var = 'var' . $i;
}

$timeForSingle = (double) microtime() - $start;

echo 'Single quotes took ' . $timeForSingle . ' seconds' . PHP_EOL;

if ($timeForSingle > $timeForDouble)
	echo "Double quotes were " . $timeForSingle/$timeForDouble . " times faster.\n";
else
	echo "Single quotes were " . $timeForDouble/$timeForSingle . " times faster.\n";
