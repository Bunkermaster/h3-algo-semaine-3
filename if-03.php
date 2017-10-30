<?php
define("FOREVER_ALONE", true);
define("GIVE_A_FRACK", false);
define("WANNA_PARTEH", true);
if (FOREVER_ALONE && GIVE_A_FRACK) {
    cry();
} elseif (FOREVER_ALONE && !GIVE_A_FRACK) {
    playPs4();
} elseif (!FOREVER_ALONE && GIVE_A_FRACK) {
    party();
} elseif (!FOREVER_ALONE && !GIVE_A_FRACK) {
    tinder();
}
