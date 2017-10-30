<?php
/**
 * Solution basique, masques de controle basees sur le bit à 0 dans chaque cas
 * Tests conditionnels bien ordonnés et tout propres
 */

// definition des constantes
define("MASK_UTF8_1B_INVERSE", 0b10000000);
// 2 bytes 0b110xxxxx
define("MASK_UTF8_2B", 0b11000000);
define("MASK_UTF8_2B_CONTROL", 0b00100000);
// 3 bytes 0b1110xxxx
define("MASK_UTF8_3B", 0b11100000);
define("MASK_UTF8_3B_CONTROL", 0b00010000);
// 2 bytes 0b11110xxx
define("MASK_UTF8_4B", 0b11110000);
define("MASK_UTF8_4B_CONTROL", 0b00001000);
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
    $byteCountDown = 0;
    // tant que je n'ai pas traité tous les caractères, je boucle
    $startTime = microtime(true);
    while ($index < strlen($leTexte)) {
        // stockage de l'octet courant dans une variable pour eviter
        // de le rechercher dans le tableau associatif à chaque test
        $currentByte = $leTexte[$index];
        echo $currentByte;
        $currentOrd = ord($currentByte);
        if ((~$currentOrd & MASK_UTF8_1B_INVERSE) === MASK_UTF8_1B_INVERSE) {
            $byteCountDown = 0;
        } elseif (($currentOrd & MASK_UTF8_2B) === MASK_UTF8_2B &&
            ($currentOrd & MASK_UTF8_2B_CONTROL) === 0
        ) {
            $byteCountDown = 1;
        } elseif (($currentOrd & MASK_UTF8_3B) === MASK_UTF8_3B &&
            ($currentOrd & MASK_UTF8_3B_CONTROL) === 0
        ) {
            $byteCountDown = 2;
        } elseif (($currentOrd & MASK_UTF8_4B) === MASK_UTF8_4B &&
            ($currentOrd & MASK_UTF8_4B_CONTROL) === 0
        ) {
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
 * Total = 24.121536970139
 * Moyenne = 2.4121536970139E-5
 */
