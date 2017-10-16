<?php
$variableA = 42;
$variableB = $variableA;
echo '$variableA:'.$variableA.PHP_EOL;
echo '$variableB:'.$variableB.PHP_EOL;
$variableB = 12;
/*
 * 42
 * 42
 */
echo '$variableA:'.$variableA.PHP_EOL;
echo '$variableB:'.$variableB.PHP_EOL;
/*
 * 42
 * 12
 */
