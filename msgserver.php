<?php
set_time_limit(0);

$ip = '192.168.11.108';
$port = 1234;
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
var_dump($sock);
if(!$sock){
    echo "socket create failed!: ".socket_strerror($sock);
}

if($ret = socket_bind($sock, $ip, $port) === false){
    echo "socket bind failed!";
}
if(socket_listen($sock, 5) === false){
    echo "listen error";
}
$count = 0;

do {
    $msgsock = socket_accept($sock);
    var_dump($msgsock);
    if($msgsock === false)
    {
        echo "socket_accept error: $msgsock";
        break;
    }
    else
    {

        $msg = "Server welcome! \n";
        socket_write($msgsock, $msg, strlen($msg));

        echo "测试成功!";
        $buf = socket_read($msgssock, 8192);

        $talkback = "收到信息: $buf \n";
        echo $talkback;

        if(++$count >= 5){
            break;
        }
    }
}while(true);

socket_close($sock);
