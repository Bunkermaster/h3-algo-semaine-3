<?php
// solution 1
//$a = "bonjour";
//$b = "lol";
//[$a,$b] = [$b,$a];
//echo '$a: '.$a.PHP_EOL;
//echo '$b: '.$b.PHP_EOL;

// solution 2
$a = "bonjour";
$b = "lol";
$a = $a ^ $b;
$b = $a ^ $b;
$a = $a ^ $b;
echo '$a: '.$a.PHP_EOL;
echo '$b: '.$b.PHP_EOL;
