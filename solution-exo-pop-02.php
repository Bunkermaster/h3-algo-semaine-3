<?php
/**
 * LIFO
 * iteration sur contenu du tableau sans destruction du tableau
 */
include "data.php";

// positionnement du pointeur de lecture du tableau à la fin du tableau
end($tableau);
// boucle, du'h
do{
    // affochage element courant
    echo current($tableau).PHP_EOL;
    // tant que prev() ne renvoit pas false (sur arrivée
    // du pointeur au debut du tableau)
} while (false !== prev($tableau));
