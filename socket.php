<?php

$port = 1234;
$address = 'localhost';
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

socket_connect($socket, $address, $port);

sorket_write($socket, 'test', 4);

socket_close($scoket);
