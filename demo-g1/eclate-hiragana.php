<?php
$leTexte = file_get_contents("hiragana-kanji.txt");
var_dump($leTexte);
$index = 0;
while ($index < strlen($leTexte)) {
    echo decbin(ord($leTexte[$index])).PHP_EOL;
    $index = $index + 1;
}
