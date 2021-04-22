<?php
$request = "";
$request .= urlencode("Gw-Username") . "=" . urlencode("adrpartners") . "&";
$request .= urlencode("Gw-Password") . "=" . urlencode("hQwL65") . "&";
$request .= urlencode("Gw-From") . "=" . urlencode("ADR") .
"&";
$request .= urlencode("Gw-To") . "=" . urlencode("+8801758866016") . "&";
$request .= urlencode("Gw-Coding") . "=" . urlencode("1") . "&";
$request .= urlencode("Gw-Text") . "=" . urlencode("Test Message");
// Build the header
$host = "110.4.44.41";
$script = "/cgi-bin/sendsms";
$request_length = 0;
$method = "POST";
//Now construct the headers.
$header = "$method $script HTTP/1.1\r\n";
$header .= "Host: $host\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-length: " . strlen($request) . "\r\n";
$header .= "Connection: close\r\n\r\n";
// Open the connection
$port = 11009;
$socket = @fsockopen($host, $port, $errno, $errstr);
if ($socket){
    // Send HTTP request
    fputs($socket, $header . $request);
    // Get the response
    while(!feof($socket)){
        $output[] = fgets($socket); //get the results
        }
        fclose($socket);
        }
    else{
        //die ("connection failed....\r\n");
        print "\r\n\r\n";
        print "<pre>";
        print_r($output);
        print "</pre>";
    }
?>