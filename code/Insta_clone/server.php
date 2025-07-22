<?php
$host="127.0.0.1";
$port=80801;
$socket=socket_create(AF_INET,SOCK_STREAM,0) or die("not create");
socket_connect($socket,$host,$port) or die("not connect");
socket_listen($socket,3) or die('not listen');
do{
    $accept=socket_accept($socket) or die('not accept');
    $msg=socket_read($accept,1024);
    $msg=trim($msg);
}while(true);
?>