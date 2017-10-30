<?php
include "data.php";
while (null !== $lastElement = array_pop($tableau)) {
    echo $lastElement.PHP_EOL;
}
