<?php

// Double quotes ("quotation marks")

$start = (double) microtime();

for ($i=0; $i < 1000000; $i++)
{
	$var = "var";
}

$timeForDouble = (double) microtime() - $start;

echo "Double quotes took $timeForDouble seconds\n";

// Nowdoc (<<<'KEYWORD'
// lesser than signs
// KEYWORD)

$start = (double) microtime();

for ($i=0; $i < 1000000; $i++)
{
	$var = <<<'EOD'
	var
	EOD;
}

$timeForNow = (double) microtime() - $start;

echo <<<'EOD'
Nowdocs took 
EOD . $timeForNow . <<<'EOD'
 seconds
EOD . PHP_EOL;

if ($timeForNow > $timeForDouble)
	echo "Double quotes were " . $timeForNow/$timeForDouble . " times faster.\n";
else
	echo "Nowdocs were " . $timeForDouble/$timeForNow . " times faster.\n";
