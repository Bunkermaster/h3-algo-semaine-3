<?php
$index = 0;
$chaine = "She sells sea shells";
$output = '';
while ($index < strlen($chaine)) {
    $output = $chaine[$index++] . $output;
}
echo $output;
