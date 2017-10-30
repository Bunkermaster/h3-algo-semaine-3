<?php
function addFour($value)
{
    return ($value + 4);
}

$donnees = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$donnees = array_map("addFour", $donnees);
var_dump($donnees);
