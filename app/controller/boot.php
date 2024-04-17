<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__."/app/config/define.php";

use Core\server\HttpServer;
use Swoole\Process;




if ($argc==2){
    $cmd = $argv[1];
    if ($cmd=='start'){
        $http = new HttpServer();
        $http->run();
    
    } elseif ($cmd=='stop'){
        $mid = intval(file_get_contents("./huzi.pid"));
        if (trim($mid)){
            Process::kill($mid);
        }
    } else {
        echo '无效命令';
    }
}   else {
    echo '无效命令';
}

