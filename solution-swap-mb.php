<?php
$leTexte = file_get_contents("demo-g1/hiragana-kanji.txt");
$strLen = mb_strlen($leTexte);
$i = 0;
$out = '';
while($i < $strLen){
    $out = mb_substr($leTexte, $i++, 1) . $out;
}
echo $out;
