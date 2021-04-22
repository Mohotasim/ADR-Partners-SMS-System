

<?php
    include "header.php";
    $icnumber = "";
    $loginuser=$_SESSION["id"];
?>
            <form class="card card-sm" action="" method="post">
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <div class="card-body row no-gutters align-items-center">
                                <div class="col-md-6">
                                    <?php
                                        if(!isset($_SESSION["account"])){$_SESSION["account"] = " ";}
                                    ?>
                                    <input class="form-control" type="text" name="txtNumber" placeholder="Account number" value="<?php echo $_SESSION["account"] //$number// isset($_POST['txtNumber']) ? $_POST['txtNumber'] : '' ?>" >
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-lg btn-success btn-sm" name="btnSearch" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-5" id="tblSearch">
                    <table class="table table-bordered">
                        <tr>
                            <th>Tel Number</th>
                            <th>Type</th>
                        </tr>
                    <?php
                        if(isset($_POST["btnSearch"])){
                            $Number = $_POST["txtNumber"];
                            $_SESSION["account"] = $Number;
                            $numbers = mysqli_query($con, "SELECT id, accountnumber, name, icnumber, phonenumber, vehiclenumber, type, createdon FROM tbl_sms WHERE accountnumber='$Number'");
                            while($row = mysqli_fetch_assoc($numbers)){
                                $icnumber = $row["icnumber"];
                            ?>
                            <tr>
                                <td><a href="#" data='<?php echo $row["phonenumber"] ?>' class="phone"><?php echo $row["phonenumber"] ?></a></td>
                                <td><?php echo $row["type"] ?></td>
                            </tr>
                            <?php
                            }
                        }else{
                            if(isset($_SESSION["account"])){
                                $Number = $_SESSION["account"];
                                $numbers = mysqli_query($con, "SELECT id, accountnumber, name, icnumber, phonenumber, vehiclenumber, type, createdon FROM tbl_sms WHERE accountnumber='$Number'");
                                while($row = mysqli_fetch_assoc($numbers)){
                                    $icnumber = $row["icnumber"];
                                ?>
                                    <tr>
                                        <td><a href="#" data='<?php echo $row["phonenumber"] ?>' class="phone"><?php echo $row["phonenumber"] ?></a></td>
                                        <td><?php echo $row["type"] ?></td>
                                    </tr>
                                <?php
                                }
                            }
                        }
                    
                    ?>
                    </table>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>
                </div>
            </form>
        </div>
       
        <div class="container">
            <div class="well"> SMS Option</div>
            <div class="col-md-6">
                <form class="form-horizontal" action="#" method="post">
                  <div class="form-group">
                    <label for="email">Sending to:</label>
                    <input type="number" class="form-control" name="txtNumber" id="txtNumber">
                    <input type="hidden" value='<?php echo $_SESSION["account"] ?>' name="txtAccountnumber">
                  </div>
                  
                  <div class="form-group">
                    <label for="pwd">SMS Template:</label>
                         <?php 
                             echo"<select class='form-control' id='optionid'  name='templete_id' onchange='select_option(this.value)'> ";
                             ?>
                            
                            
                             <?php
                             echo"</select>"; 
                            
                           ?>
                  </div>
                  
                  <div class="form-group">
                    <label for="pwd">Officer Name:</label>
                    <select name="txtOfficer" id="txtOfficer" class="form-control">
                        <option value=''>Select Type</option>
                        <?php
                            $userid=$_SESSION["id"];
                            $officersql=mysqli_query($con,"SELECT `id`, `userid`, `officer`, `officer_name`, `createdon` FROM `tbl_officer` WHERE userid='$userid' ");
                            while($officerrow=mysqli_fetch_assoc($officersql)){

                        ?>
                        <option value="<?php echo $officerrow["officer"];?>"><?php echo $officerrow["officer"];?></option>
                        <?php
                            }
                        ?>
                        <!--
                        <option value='Officer 1'>Officer 1</option>
                        <option value='Officer 2'>Officer 2</option>
                        <option value='Officer 3'>Officer 3</option>
                    -->
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="email">SMS Preview:</label>
                    <!--<textarea type="number" ROWS="6"  class="form-control" name="txtSms" id="txtSms"></textarea> -->
                    <textarea type="text" ROWS="6"  class="form-control" name="txtSms" id="txtHint"></textarea>
                  </div>
                  <div class="form-group">
                    <!--<button type="submit" name="btnSendSMS" class="btn btn-primary">Send SMS</button>-->
                    
                    <a href='#' class="btn btn-success preview"><i class="fa"></i> SMS Preview </a> <!--data value is transfared by session-->
                  </div>
                                                    
                </form>
            </div>
        </div>
        
        
        
        
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Number</h4>
              </div>
              <div class="modal-body" style="padding:40px;">
                
                  <div class="form-group">
                    <label for="email">Tel Number:</label>
                    <input type="number" class="form-control" id="txtmodalNumber" max="12" name="txtmodalNumber">
                    <input type="hidden" value='<?php echo $_SESSION["account"] ?>' id="txtmodalAccountnumber" name="txtmodalAccountnumber">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Type:</label>
                    <select id="txtmodalType" name="txtmodalType" class="form-control">
                        <option value=''>Select Type</option>
                        <option value='CUSTOMER'>CUSTOMER</option>
                        <option value='PARENT'>PARENT</option>
                        <option value='SPOUSE'>SPOUSE</option>
                    </select>
                  </div>
                  <p style="color:red;" id="message"></p>
                 
                    <a href="#" class="btn btn-primary btnAddNumber">Submit</a>
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
          </div>
        </div>
        
        
        
    <!-- Modal -sms send  preview -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Send Preview</h4>
            </div>
            <div class="modal-body"  style="padding:50px;">
                
            <form class="form-horizontal" name="form1" action="" method="post">
                <div class="form-group">
                    <label for="email">To :</label>
                    <input readonly type="number" class="form-control" name="txtNumber" id="txtNumber1"> <br><br>
                    <input type="hidden" value='<?php echo $_SESSION["account"] ?>' name="txtSmsAccountnumber">
                     <input type="hidden" value='<?php echo $_SESSION["templete_id"] ?>' name="txtTmpId">
                    <strong> Body : </strong><br>
                    <textarea readonly rows="6" class="form-control" name="smsbody" id="bodydetails"></textarea>
                    
                    <!--<input type="hidden" name="Gw-Username" value="adrpartners">
                    <input type="hidden" name="Gw-Password" value="hQwL65">
                    <input type="hidden" name="Gw-From" value="ADR">
                    <input type="hidden" name="Gw-To" value="60135509117">
                    <input type="hidden" name="Gw-Coding" value="1">-->
                    
                    
                    <input type="submit" name="sendbtn" class="btn btn-primary" value="Send SMS" >
                </div>
                  <?php  
                    if(isset($_POST["sendbtn"])){  //sendbtn press from sms preview popup 
                        //$Number = $_POST["txtNumber"];
                        $Number = $_POST["txtNumber"];
                        $body = $_POST["smsbody"];
                        $AccountNumber = $_POST["txtSmsAccountnumber"]; 
                        $tmplid=$_POST["txtTmpId"];

                        $request = "";
                        $output[] = array();
                        $request .= urlencode("Gw-Username") . "=" . urlencode("adrpartners") . "&";
                        $request .= urlencode("Gw-Password") . "=" . urlencode("hQwL65") . "&";
                        $request .= urlencode("Gw-From") . "=" . urlencode("ADR") . "&";
                        $request .= urlencode("Gw-To") . "=" . urlencode($Number) . "&";
                        $request .= urlencode("Gw-Coding") . "=" . urlencode("1") . "&";
                        $request .= urlencode("Gw-Text") . "=" . urlencode($body);
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
                        
                        mysqli_query($con, "INSERT INTO tbl_smslog(templete_id, accountnumber, phonenumber, body, type, status,created_by) VALUES 
                            ('$tmplid', '$AccountNumber', '$Number', '$body', '', '$output','$loginuser') ");
                        
                        //echo '<script>window.location.href="sms.php?msg="</script>';
                        echo "<meta http-equiv=refresh content='0; url=sms.php'>";
                        
                    }
                  ?>
            </form>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>

        <script>
            $(".phone").on("click", function(e){
                //alert("hit");
                e.preventDefault();
                var phonenumber = $(this).attr("data");
                $('#txtNumber').val(phonenumber);
                $('#txtNumber1').val(phonenumber);
                //alert(phonenumber);
                $.ajax({
                    url: "model/setmobileno.php",
                    type: "post",
                    data: {phonenumber:phonenumber},
                    success: function (response) {
                        $('#optionid').html(response);
                        
                        //alert(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                });
                
            });
            
            $("#btnSearch").on("click", function(){
                var account = $('#txtNumber').val();
                //alert(account);
                $.ajax({
                    url: "model/search.php",
                    type: "post",
                    data: {account:account},
                    success: function (response) {
                        $('#tblSearch').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                });
            });
            
            $("#btnAdd").on("click", function(){
                var TelNumber = $('#txtmodalNumber').val();
                var Accountnumber = $('#txtmodalAccountnumber').val();
                var Type = $('#txtmodalType').val();
                
                //alert(TelNumber+ Accountnumber + Type);
                $.ajax({
                    url: "model/addnew.php",
                    type: "post",
                    data: {TelNumber:TelNumber, Accountnumber:Accountnumber, Type:Type},
                    success: function (response) {
                        $("#myModal").modal("hide");
                        $('#tblSearch').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                });
            });
            $("#txtSMSType").change(function(){
                var smstype = $(this).val();
                if(smstype=="A"){
                    $("#txtSms").html("Receive greetings from ADR Partners Sdn. Bhd. <?php echo $sessiondisplayname; ?> <<?php echo $icnumber ?>>. You have not paid the remaining depth amount RM 5000.00.  Kindly contact <Officer Name> (Extracted from dropdown officer name list) on the following number +603-454566 to get the appropriate details. Thank you.")
                }else if(smstype=="B"){
                    $("#txtSms").html("Receive greetings from ADR Partners Sdn. Bhd. <?php echo $sessiondisplayname; ?> <<?php echo $icnumber ?>>. You have paid RM 2000 from your depth amount. The remaining amount are RM 4000.00. Kindly contact <Officer Name> (Extracted from Dropdown officer name list) on the following number +603-454566 to get the appropriate details. Thank you.");
                }else if(smstype=="B"){
                    $("#txtSms").html("Receive greetings from ADR Partners Sdn. Bhd. <?php echo $sessiondisplayname; ?> <<?php echo $icnumber ?>>. Congratulations. You have completed all the remaining dues of your depth amount. For the receipt you can contact our staff <officer Name>Extracted from dropdown officer name list) on the following number +603-454566. Thank you.");
                }
            });
            
            
            
                    
            $(".preview").on("click", function(event){
                event.preventDefault();
                //var id = $(this).attr("data"); // data id value is sent by session
                var officer=$("#txtOfficer").val();
                $.ajax({
                    url: "sms-body-popup.php",
                    type: "post",
                    data: {officer:officer},
                    success: function (result)
                    {
                        $('#myModal1').modal('show');
                        $("#bodydetails").html(result);
                        //alert(result);
                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");
                    }
                });
            });
        
        </script>
        <script>
            function select_option(str) 
            {    if (str == "") { document.getElementById("txtHint").innerHTML = ""; return; } 
                else{  if (window.XMLHttpRequest) {  xmlhttp = new XMLHttpRequest(); }       // code for IE7+, Firefox, Chrome, Opera, Safari 
                         else { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }     // code for IE6, IE5 
                      xmlhttp.onreadystatechange = function()
                      { if (this.readyState == 4 && this.status == 200)
                           { document.getElementById("txtHint").innerHTML = this.responseText; } 
                      };
                     xmlhttp.open("GET","smstemplate-get.php?q="+str,true); xmlhttp.send(); 
                   }
            }
        </script>
        <script type="text/javascript">
            $(".btnAddNumber").on("click", function(){
                        var mnumber = $('#txtmodalNumber').val();
                        var Accountnumber = $('#txtmodalAccountnumber').val();
                        var Type = $('#txtmodalType').val();
        				if(Type == ""){alert("PLEASE SELECT CUSTOMER TYPE");
                           return false;}
        				var lnt =mnumber.length;
                        var err="0"
                        if(mnumber.substr(0,3)!="601"){
                            $("#message").text("Invalid Country code. Please add 601 infront of The Phone number");
                           
                        }else{

                            if((lnt !="12") && (lnt !="11") ){
                                $("#message").text("Invalid Phone Number. You Entered " + lnt + " Digit instead of 12.");
                            }else{

                                $.ajax({
                                    url: "model/addnumber.php",
                                    type: "post",
                                    data: {
                                        mnumber:mnumber,
                                        Accountnumber:Accountnumber,
                                        Type:Type
                                    },
                                    success: function (response) {
                                        alert(response);
                                        location.reload();
        								

                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                       console.log(textStatus, errorThrown);
                                    }
                                });

                            }
                        }

                        
                    });
        </script>
        
    </body>
</html>