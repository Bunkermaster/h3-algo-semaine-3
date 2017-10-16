<?php
// watashi no wa aka desu
// le mien est rouge
$myString = "私のは赤です。";
echo "Single Byte :".strlen($myString).PHP_EOL;
echo "Multibyte :".mb_strlen($myString).PHP_EOL;
