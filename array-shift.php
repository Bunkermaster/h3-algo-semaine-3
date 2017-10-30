<?php
/**
 * First In First Out FIFO
 */
//header("Content-Type: text/text");
$donnees = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$elementDuDebut = array_shift($donnees);
echo $elementDuDebut.PHP_EOL;
var_dump($donnees);
