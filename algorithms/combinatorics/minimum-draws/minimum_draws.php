<?php

/*
Jim is off to a party and is searching for a matching pair of socks.
His drawer is filled with socks, each pair of a different color.
In its worst case scenario, how many socks (x) should Jim remove from
his drawer after which he finds a matching pair?

Link: https://www.hackerrank.com/challenges/minimum-draws
*/

$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

$getNext = function() use ($_fp) {
    return (int) trim(fgets($_fp));
};

$numCases = $getNext();
for ($i = 0; $i < $numCases; $i++) {
    $pairs = $getNext();
    $numDraws = $pairs > 0 ? $pairs + 1 : 0;
    echo $numDraws . "\n";
}

