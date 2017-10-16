<?php
define('OPT_SNAPE',1);
define('OPT_HAGRID',2);
define('OPT_BUNDLEDORE',4);
define('OPT_HERMIONE',8);
define('OPT_HARRY',16);
function harryPotter($lesGens)
{
    // dire bonjour aux persos
    if (($lesGens & OPT_SNAPE) === OPT_SNAPE) {
        echo "Hello TRAITOR!!!!!".PHP_EOL;
    }
    if (($lesGens & OPT_BUNDLEDORE) === OPT_BUNDLEDORE) {
        echo "Te vas a X_x!!1".PHP_EOL;
    }
    if (($lesGens & OPT_HAGRID) === OPT_HAGRID) {
        echo "UNE BIEREEEEEE!!!!!!!!".PHP_EOL;
    }
    if (($lesGens & OPT_HARRY) === OPT_HARRY) {
        echo "My parents are dead. ¬_¬".PHP_EOL;
    }
}
harryPotter(OPT_SNAPE | OPT_BUNDLEDORE | OPT_HARRY);
