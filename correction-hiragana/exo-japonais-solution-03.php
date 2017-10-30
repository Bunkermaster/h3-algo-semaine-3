<?php
/**
 * Solution basique
 * Tests conditionnels bien ordonnés et tout propres
 *
 * J'ai optimisé l'ordre des comparaisons pour prendre en compte la
 * probabilité forte de caractères japonais et j'ai rajouté
 * la comparaison du filler (les octets après l'octet qui donne la longueur
 */

// definition des constantes
define("MASK_UTF8_1B_INVERSE", 0b10000000);
define("MASK_UTF8_2B", 0b11100000);
define("MASK_UTF8_2B_CONTROL", 0b11000000);
define("MASK_UTF8_3B", 0b11110000);
define("MASK_UTF8_3B_CONTROL", 0b11100000);
define("MASK_UTF8_4B", 0b11111000);
define("MASK_UTF8_4B_CONTROL", 0b11110000);
define("ITERATIONS", 1000000);

if (false === $leTexte = file_get_contents('hiragana-kanji.txt')) {
    die("File not found");
}
var_dump($leTexte);
$iterationCounter = 0;
$totalRunTime = 0;
while ($iterationCounter < ITERATIONS) {
    ob_start();
    $index = 0;
    $longueurDeLaChaine = strlen($leTexte);
    $byteCountDown = 0;
// tant que je n'ai pas traité tous les caractères, je boucle
    $startTime = microtime(true);
    while ($index < $longueurDeLaChaine) {
        // stockage de l'octet courant dans une variable pour eviter
        // de le rechercher dans le tableau associatif à chaque test
        $currentByte = $leTexte[$index];
        echo $currentByte;
        $currentOrd = ord($currentByte);
        if ((~$currentOrd & MASK_UTF8_1B_INVERSE) == MASK_UTF8_1B_INVERSE) {
            $byteCountDown = 0;
        } elseif (($currentOrd & MASK_UTF8_2B) == MASK_UTF8_2B_CONTROL) {
            $byteCountDown = 1;
        } elseif (($currentOrd & MASK_UTF8_3B) == MASK_UTF8_3B_CONTROL) {
            $byteCountDown = 2;
        } elseif (($currentOrd & MASK_UTF8_4B) == MASK_UTF8_4B_CONTROL) {
            $byteCountDown = 3;
        }
        if ($byteCountDown > 0 ) {
            $byteCountDown--;
        } else {
            // affichage du retour à la ligne
            echo PHP_EOL;
        }
        // incrementation de l'index pour parcourir le tableau
        $index = $index + 1;
    }
    $runTime = microtime(true) - $startTime;
    $totalRunTime += $runTime;
    $iterationCounter++;
    ob_clean();
}
echo "Itérations = ".$iterationCounter.PHP_EOL;
echo "Total = ".$totalRunTime.PHP_EOL;
echo "Moyenne = ".($totalRunTime / $iterationCounter).PHP_EOL;
/*
 * Itérations = 1000000
 * Total = 20.327437162399
 * Moyenne = 2.0327437162399E-5
 */