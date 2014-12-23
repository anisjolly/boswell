<?php

$token = '4b58bab8-22d9-4a31-937a-9a6649e0134f';

require("libs/OpenLDBWS.php");
$OpenLDBWS = new OpenLDBWS($token);

$departureBoard = $OpenLDBWS->GetDepartureBoard(10,"MAI");

print_r($departureBoard);
?>
