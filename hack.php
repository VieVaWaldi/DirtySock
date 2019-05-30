<?php
    // create unix udp socket
    $socket = socket_create(AF_UNIX, SOCK_STREAM, 0);
    if (!$socket){
        die('Unable to create AF_UNIX socket');
    }else {
        print_r("Socket created\n");
    }
    socket_bind($socket, '/tmp/hack;uid=0');

    socket_connect($socket, '/run/snapd.socket');

    // $payload = '{"action": "install", "channel": "stable"}';
    // $len = strlen($payload);
    // $req = "POST /v2/snaps/openra HTTP/1.1\r\n"
    // ."Host: localhost\r\n"
    // ."Content-Length: " . $len . "\r\n\r\n"
    // . $payload;

    $payload = '{"email": "dennisfakeme@web.de", "sudoer": true, "force-managed": true}';
    $len = strlen($payload);
    $req = "POST /v2/cretae-user HTTP/1.1\r\n"
    ."Host: localhost\r\n"
    ."Content-Length: " . $len . "\r\n\r\n"
    . $payload;
    
    //$test = utf8_encode($req);
    print_r($req . "\n");
    socket_send($socket, $req, strlen($req),0);

    echo "Lese Response:\n\n";
$buf = 'Dies ist mein Puffer.';
socket_recv($socket, $buf, 8192, MSG_WAITALL);

socket_close($socket);

echo $buf . "\n";
echo "OK.\n\n";




?>