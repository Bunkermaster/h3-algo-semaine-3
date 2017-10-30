<?php
$leTexte = file_get_contents('hiragana-kanji.txt');
//echo $leTexte;
$index = 0;
$longueurDeLaChaine = strlen($leTexte);
// tant que je n'ai pas traité tous les caractères, je boucle
while ($index < $longueurDeLaChaine) {
    echo decbin(ord($leTexte[$index])).PHP_EOL;
    $index = $index + 1;
//    $index++;
}
