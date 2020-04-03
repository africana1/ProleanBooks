<?php
$randomId1 = rand(10, 9841024415);
$randomId2 = rand(102, 9841024415);
$randomId3 = rand(1024, 9841024415);

$md5Hash = md5($randomId1 * $randomId2 + $randomId3);
$myId[0] = str_split($md5Hash, 15);
$id = $myId[0][0];

$bodyClass = 'grey lighten-2 black-text';