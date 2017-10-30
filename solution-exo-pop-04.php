<?php
/**
 * FIFO
 * iteration sur contenu du tableau sans destruction du tableau
 */
include "data.php";

// positionnement du pointeur de lecture du tableau au début du tableau
reset($tableau);
// boucle, du'h
do{
    // affichage element courant
    echo current($tableau).PHP_EOL;
    // tant que next() ne renvoit pas false (sur arrivée
    // du pointeur a la fin du tableau)
} while (false !== next($tableau));
