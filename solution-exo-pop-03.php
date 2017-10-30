<?php
/**
 * FIFO
 * iteration sur contenu du tableau avec destruction du tableau
 */
include "data.php";

// si on omet le test sur null, le 0 du premier element sort en false
while(null !== $valeur = array_shift($tableau)){
    echo $valeur.PHP_EOL;
}
