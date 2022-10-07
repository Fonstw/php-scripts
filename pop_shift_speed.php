<?php

// array_shift (from beginning)

$arr = range(1, 10000);

$start = (double) microtime();

for ($i=0; $i < 10000; $i++)
{
	array_shift($arr);
}

$timeForShift = (double) microtime() - $start;

echo "array_shift took $timeForShift seconds\n";

// array_pop (from end)

$arr = range(1, 10000);

$start = (double) microtime();

for ($i=0; $i < 10000; $i++)
{
	array_pop($arr);
}

$timeForPop = (double) microtime() - $start;

echo "array_pop took $timeForPop seconds\n";

if ($timeForPop > $timeForShift)
	echo "array_shift was " . $timeForPop/$timeForShift . " times faster.\n";
else
	echo "array_pop was " . $timeForShift/$timeForPop . " times faster.\n";
