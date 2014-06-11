<?php
set_time_limit(0);

$protocol = 'tcp';
$get_prot = getprotobyname($protocol);

$socket = socket_create(AF_INET,SOCK_STREAM,$get_prot);
var_dump($socket);


