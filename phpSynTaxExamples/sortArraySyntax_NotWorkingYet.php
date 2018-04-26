<?php

/*sort() - ascending order
 *rsort() - descending order
 *asort() - ascending order, according to the value
 *ksort() - ascending order, according to the key
 *arsort() - descending order, according to the value
 *krsort() - descending order, according to the key*/
 

$myStuff = array("apple", "cookies", "milk", "juice", "carrot", "popcorn");

echo "<ul><li>" . $myStuff[0] . "</li><li>" . $myStuff[1] . "</li><li>" . $myStuff[2] . "</li><li>" . $myStuff[3] . "</li><li>" . $myStuff[4] . "</li><li>" . $myStuff[5] . "</li></ul>";

rsort($myStuff);

sort($myStuff);
?>