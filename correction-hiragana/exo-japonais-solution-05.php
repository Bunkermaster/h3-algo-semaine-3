<?php
// definition des constantes
// definition des constantes
define("MASK_UTF8_1B_INVERSE", 0b10000000);
define("MASK_UTF8_2B", 0b11100000);
define("MASK_UTF8_2B_CONTROL", 0b11000000);
define("MASK_UTF8_3B", 0b11110000);
define("MASK_UTF8_3B_CONTROL", 0b11100000);
define("MASK_UTF8_4B", 0b11111000);
define("MASK_UTF8_4B_CONTROL", 0b11110000);
define("MASK_UTF8_FILLER", 0b11000000);
define("MASK_UTF8_FILLER_CONTROL", 0b10000000);
define("ITERATIONS", 1);

if (false === $leTexte = file_get_contents('hiragana-kanji.txt')) {
    die("File not found");
}
var_dump($leTexte);
$iterationCounter = 0;
$totalRunTime = 0;
ob_start();
while ($iterationCounter++ < ITERATIONS) {
    $index = 0;
    $longueurDeLaChaine = strlen($leTexte);
    $byteCountDown = 0;
// tant que je n'ai pas traité tous les caractères, je boucle
    $startTime = microtime(true);
    while ($index < $longueurDeLaChaine) {
        // stockage de l'octet courant dans une variable pour eviter
        // de le rechercher dans le tableau associatif à chaque test
        $currentByte = $leTexte[$index++];
        echo $currentByte;
        $currentOrd = ord($currentByte);
        if (($currentOrd & MASK_UTF8_FILLER) == MASK_UTF8_FILLER_CONTROL) {
            // filler, do nothing
            // erreurs si filler pas present
        } elseif (($currentOrd & MASK_UTF8_3B) == MASK_UTF8_3B_CONTROL) {
            $byteCountDown = 2;
        } elseif (($currentOrd & MASK_UTF8_1B_INVERSE) == 0) {
            $byteCountDown = 0;
        } elseif (($currentOrd & MASK_UTF8_2B) == MASK_UTF8_2B_CONTROL) {
            $byteCountDown = 1;
        } elseif (($currentOrd & MASK_UTF8_4B) == MASK_UTF8_4B_CONTROL) {
            $byteCountDown = 3;
        } else {
            // l'octet en encodé differement (11111000, 11111111, etc.)
        }
        if ($byteCountDown > 0 ) {
            $byteCountDown--;
        } else {
            // affichage du retour à la ligne
            echo PHP_EOL;
        }
    }
    $runTime = microtime(true) - $startTime;
    $totalRunTime += $runTime;
}
ob_flush();
echo "Itérations = ".$iterationCounter.PHP_EOL;
echo "Total = ".$totalRunTime.PHP_EOL;
echo "Moyenne = ".($totalRunTime / ITERATIONS).PHP_EOL;
/*
 * Itérations = 1000001
 * Total = 15.399259328842
 * Moyenne = 1.5399243929598E-5
 */
