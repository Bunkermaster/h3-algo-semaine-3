<?php
$laChaine = "She sells sea shell by the sea shore";
$tailleChaine = strlen($laChaine);
$mideule = floor($tailleChaine/2);
$endIndex = $tailleChaine - 1;
$iterations = 0;
while ($iterations < $mideule) {
    [$laChaine[$iterations],$laChaine[$endIndex]] = [$laChaine[$endIndex],$laChaine[$iterations]];
    $iterations++;
    $endIndex--;
}
echo "Résultat: ".$laChaine.PHP_EOL;
echo "Itérations: ".$iterations.PHP_EOL;
/**
 * Résultat: erohs aes eht yb llehs aes slles ehS
 * Itérations: 18
 */