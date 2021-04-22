<html>
    <body>
        <form class="form-horizontal" name="form1" action="" method="post">
            <div class="form-group">
                <label for="email">To :</label>
                <input type="number" class="form-control" name="txtNumber" id="txtNumber1"> <br><br>
                <strong> Body : </strong><br>
                <textarea type="text" ROWS="6" class="form-control" name="smsbody" id="bodydetails"></textarea>
                
                <!--<input type="hidden" name="Gw-Username" value="adrpartners">
                <input type="hidden" name="Gw-Password" value="hQwL65">
                <input type="hidden" name="Gw-From" value="ADR">
                <input type="hidden" name="Gw-To" value="60135509117">
                <input type="hidden" name="Gw-Coding" value="1">-->
                
                
                <button type="submit" name="sendbtn" class="btn btn-primary">Send SMS</button>
            </div>
            <?php  
                if(isset($_POST["sendbtn"])){  //sendbtn press from sms preview popup 
                    $Number = $_POST["txtNumber"];
                    $body = $_POST["smsbody"];
                    
                    $request = "";
                    $output[] = array();
                    $request .= urlencode("Gw-Username") . "=" . urlencode("adrpartners") . "&";
                    $request .= urlencode("Gw-Password") . "=" . urlencode("hQwL65") . "&";
                    $request .= urlencode("Gw-From") . "=" . urlencode("ADR") . "&";
                    $request .= urlencode("Gw-To") . "=" . urlencode($Number) . "&";
                    $request .= urlencode("Gw-Coding") . "=" . urlencode("1") . "&";
                    $request .= urlencode("Gw-Text") . "=" . urlencode("Hello. this is testing");
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
                    print "<pre>";
                    print ($header);
                    print "</pre>";
                    // Open the connection
                    $port = 11009;
                    $socket = @fsockopen($host, $port, $errno, $errstr);
                    if ($socket){
                        echo "request sent";
                        // Send HTTP request
                        fputs($socket, $header . $request);
                        // Get the response
                        while(!feof($socket)){
                            $output = fgets($socket); //get the results
                        }
                        fclose($socket);
                    }
                    else{
                        die ("connection failed....\r\n");
                    }
                    print "\r\n\r\n";
                    print "<pre>";
                    print_r($output);
                    print "</pre>";
                    
                    $status = $_SERVER['HTTP_GW_DLR_STATUS'];
                    $msgid = $_SERVER['HTTP_GW_MSGID'];
                    $from = $_SERVER['HTTP_GW_FROM'];
                    $to = $_SERVER['HTTP_GW_TO'];
                    echo "GW-From => $from \n";
                    echo "GW-To => $to \n";
                    echo "GW-Dlr-Status => $status \n";
                    echo "GW-Msgid => $msgid \n";

                    //echo $Number;
                    //echo $body;
                    //mysqli_query($con, "INSERT INTO tbl_sms(accountnumber, phonenumber, type) VALUES ('$Accountnumber', '$Number','$Type')");
                    //echo '<script>window.location.href="dashboard.php"</script>';
                        
                }
            ?>
            </form>
    </body>        
</html>