<?php
$contenuDuFichier = file_get_contents('texte-hiragana.txt');
var_dump($contenuDuFichier);
$i = 0;
while($i < strlen($contenuDuFichier)){
    echo decbin(ord($contenuDuFichier[$i++])).PHP_EOL;
}
