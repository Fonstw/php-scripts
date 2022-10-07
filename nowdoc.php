<?php

$grote_plannen = <<<'EINDE_UITLEG'
NOWDOCS zijn `unparsed strings`.
Dus je kunt hierin gooien
wat je maar wilt
met \n, \\, \', \", ' en " zonder enige problemen

Schrijf haiku's:
	To·day it work·ed
	To·mor·row it will not work
	Ap·ple is like that

Citeer grote breinen: "I never let schooling get in the way of my education." ~Mark Twain

En meer!

Dit allemaal tot het gedefinieërde keyword.

Dat was dan
EINDE_UITLEG;

echo $grote_plannen . PHP_EOL;

// Het kan ook "normaal", trouwens.
$naam = <<<'naam'
Henk
naam;

echo "Hallo $naam!\n";

// En het kan ook... Op z'n PHP...
echo 'Hallo ' . <<<'BEGROETING'
wereld
BEGROETING . "!\n";