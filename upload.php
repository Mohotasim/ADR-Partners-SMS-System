
<?php
    include "header.php";
?>
<?php
//require_once 'connect_db.php';

if (isset($_POST["import"])) {

    $filename=$_FILES["file"]["tmp_name"];  
    //".$getData[0]."
     if($_FILES["file"]["size"] > 0){
        $file = fopen($filename, "r");
        fgetcsv($file);
        $message="";
        $message2 = 0; 
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE){

            $errorMsg="";
            if($getData[1]=="" OR $getData[2]=="" OR $getData[3]=="" OR $getData[4]==""){
                    $message2 = $message2+1;// 'Blank Account No/Name/Ic/Phone number Detected'; 
                    $errorMsg="BlankRow";
                    $type = "error";
            }
            

            if($errorMsg==""){

                $Reference = "";
                if (isset($getData[0])) {
                    $Reference = mysqli_real_escape_string($con, $getData[0]);
                }
                $accountnumber = "";
                if (isset($getData[1])) {
                    $accountnumber = mysqli_real_escape_string($con, $getData[1]);
                }
                $name = "";
                if (isset($getData[2])) {
                    $name = mysqli_real_escape_string($con, $getData[2]);
                }
                $icnumber = "";
                if (isset($getData[3])) {
                    $icnumber = mysqli_real_escape_string($con, $getData[3]);
                }
                $phonenumber = "";
                if (isset($getData[4])) {
                    $phonenumber = mysqli_real_escape_string($con, $getData[4]);
                }
                $vehiclenumber = "";
                if (isset($getData[5])) {
                    $vehiclenumber = mysqli_real_escape_string($con, $getData[5]);
                }
                $type = "";
                if (isset($getData[6])) {
                    $type = mysqli_real_escape_string($con, $getData[6]);
                }
                $amount = "";
                if (isset($getData[7])) {
                    $amount = mysqli_real_escape_string($con, $getData[7]);
                }
                $contact=mysqli_query($con,"SELECT accountnumber,phonenumber FROM tbl_sms WHERE phonenumber='$phonenumber' AND accountnumber='$accountnumber'  ");
                $nrow=mysqli_num_rows($contact);
                $first3digit=substr($phonenumber, 0, 3);
                $length=strlen($phonenumber);
                if($nrow>0){
                    $type = "error";
                    $message = "Dublicate/Invalid Phone number.<br>";
                }
                elseif( ($first3digit =="601") && ( ($length ==12) || ($length ==11) )  ){

                    $sqlInsert = mysqli_query($con, "INSERT INTO tbl_sms(Reference, accountnumber, name, icnumber, phonenumber, vehiclenumber, type, amount) VALUES 
                    ('$Reference', '$accountnumber', '$name', '$icnumber', '$phonenumber', '$vehiclenumber', '$type', '$amount')");
                
                    
                    if ($sqlInsert>0) {
                        $type = "success";
                        //$message.= "CSV Data Imported into the Database<br>";
                    } else {
                        $type = "error";
                        $message= "Problem in Importing CSV Data<br>";
                    }

                }
                
                else{
                    
                    $type = "error";
                    $message = "Dublicate/Invalid Phone number .<br>";
                }
                //$type="success";
                //$message="Ok";
            }else{
                $type="error";
                //$message2.=$errorMsg;
            }

        }
      
           fclose($file);  
           //$message.=$message;
     }

}
?>
<style>
body {
    font-family: Arial;
    width: 550px;
}

.outer-scontainer {
    background: #F0F0F0;
    border: #e0dfdf 1px solid;
    padding: 20px;
    border-radius: 2px;
}

.input-row {
    margin-top: 0px;
    margin-bottom: 20px;
}

.btn-submit {
    background: #333;
    border: #1d1d1d 1px solid;
    color: #f0f0f0;
    font-size: 0.9em;
    width: 100px;
    border-radius: 2px;
    cursor: pointer;
}

.outer-scontainer table {
    border-collapse: collapse;
    width: 100%;
}

.outer-scontainer th {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

.outer-scontainer td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display: none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
<h2>Import New List</h2>

    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php 
        if($message2>0){
                echo "Blank Account No/Name/Ic/Phone number Detected<br>";
            }

        if(!empty($message) ) { 
            echo  $message."<br>";
             }else{echo "All CSV Data Imported into the Database";}
         ?>
        </div>
    <div class="outer-scontainer">
        <div class="row">

            <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                    <br />

                </div>

            </form>

        </div>
    </div>
        <table id='userTable' class="table table-bordered">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Account number</th>
                    <th>Name</th>
                    <th>Ic number</th>
                    <th>Phone number</th>
                    <th>Vehicle number</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Created on</th>
                </tr>
            </thead>
            <?php
                $result = mysqli_query($con, "SELECT `id`, `Reference`, `accountnumber`, `name`, `icnumber`, `phonenumber`, `vehiclenumber`, `type`, `amount`, `createdon` FROM `tbl_sms` WHERE accountnumber<>'' AND phonenumber<>'' ");
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                <tr>
                    <td><?php  echo $row['Reference']; ?></td>
                    <td><?php  echo $row['accountnumber']; ?></td>
                    <td><?php  echo $row['name']; ?></td>
                    <td><?php  echo $row['icnumber']; ?></td>
                    <td><?php  echo $row['phonenumber']; ?></td>
                    <td><?php  echo $row['vehiclenumber']; ?></td>
                    <td><?php  echo $row['type']; ?></td>
                    <td><?php  echo $row['amount']; ?></td>
                    <td><?php  echo $row['createdon']; ?></td>
                </tr>
            <?php
                }
            ?>
                </tbody>
        </table>
        
        
        <script type="text/javascript">
            $(document).ready(function() {
                $("#frmCSVImport").on("submit", function () {

                    $("#response").attr("class", "");
                    $("#response").html("");
                    var fileType = ".csv";
                    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
                    if (!regex.test($("#file").val().toLowerCase())) {
                            $("#response").addClass("error");
                            $("#response").addClass("display-block");
                        $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
                        return false;
                    }
                    return true;
                });
            });
            </script>
    </body>
</html>