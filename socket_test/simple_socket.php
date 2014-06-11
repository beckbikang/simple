<?php
$hostname = "www.baidu.com";
$port = "80";
$length = 128;

$fp = fsockopen($hostname,$port,$errno,$errstr,30);
if(!$fp){
    throw new Exception("can't open the website");
}else{
    $out = "GET / HTTP/1.1\r\n";
    $out .= "Host: www.baidu.com\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp, $out);
    while(!feof($fp)){
        echo fgets($fp, $length);
    }
    fclose($fp);
}