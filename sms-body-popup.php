<?php
session_start();
include "connect_db.php";
$account=$_SESSION["account"];
//$templete_id=$_REQUEST[q]; 
$templete_id= $_SESSION["templete_id"];
$officername=$_POST["officer"];

$numbers = mysqli_query($con, "SELECT templete_name, text1,text2,text3,text4,text5,text6,text7,text8,text9,text10, col1, col2, col3, col4, col5, col6, col7, col8, col9, col10  FROM tbl_templete_format WHERE templete_id ='$templete_id'");
while($row = mysqli_fetch_assoc($numbers)){
                                            
            $col_name="0";                              
                                          
        if( $row["col1"]!="") { if($row["col1"]=="officer"){$data1=$officername;}else{ $col_name=$row["col1"];   $result = mysqli_query($con,  "SELECT $col_name FROM tbl_sms WHERE accountnumber ='$account' ");  while($row1 = mysqli_fetch_array($result)) { $data1=$row1[$col_name]; }   if($col_name=="icnumber"){$data1=substr($data1,0,8)."***".substr($data1,-1);} }}
        if( $row["col2"]!="") { if($row["col2"]=="officer"){$data2=$officername;}else{$col_name=$row["col2"];   $result = mysqli_query($con,  "SELECT $col_name FROM tbl_sms WHERE  accountnumber ='$account' ");  while($row1 = mysqli_fetch_array($result)) { $data2=$row1[$col_name]; }   if($col_name=="icnumber"){$data2=substr($data2,0,8)."***".substr($data2,-1);} }}
        if( $row["col3"]!="") {if($row["col3"]=="officer"){$data3=$officername;}else{$col_name=$row["col3"];   $result = mysqli_query($con,  "SELECT $col_name FROM tbl_sms WHERE  accountnumber ='$account' ");  while($row1 = mysqli_fetch_array($result)) { $data3=$row1[$col_name]; }   if($col_name=="icnumber"){$data3=substr($data3,0,8)."***".substr($data3,-1);}}}
        if( $row["col4"]!="") { if($row["col4"]=="officer"){$data4=$officername;}else{$col_name=$row["col4"];   $result = mysqli_query($con,  "SELECT $col_name FROM tbl_sms WHERE  accountnumber ='$account' ");  while($row1 = mysqli_fetch_array($result)) { $data4=$row1[$col_name]; }   if($col_name=="icnumber"){$data4=substr($data4,0,8)."***".substr($data4,-1);}}}
        if( $row["col5"]!="") { if($row["col5"]=="officer"){$data5=$officername;}else{ $col_name=$row["col5"];   $result = mysqli_query($con,  "SELECT $col_name FROM tbl_sms WHERE  accountnumber ='$account' ");  while($row1 = mysqli_fetch_array($result)) { $data5=$row1[$col_name]; }   if($col_name=="icnumber"){$data5=substr($data5,0,8)."***".substr($data5,-1);}}}
        if( $row["col6"]!="") { if($row["col6"]=="officer"){$data6=$officername;}else{$col_name=$row["col6"];   $result = mysqli_query($con,  "SELECT $col_name FROM tbl_sms WHERE  accountnumber ='$account' ");  while($row1 = mysqli_fetch_array($result)) { $data6=$row1[$col_name]; }   if($col_name=="icnumber"){$data6=substr($data6,0,8)."***".substr($data6,-1);}}}
        if( $row["col7"]!="") { if($row["col7"]=="officer"){$data7=$officername;}else{ $col_name=$row["col7"];   $result = mysqli_query($con,  "SELECT $col_name FROM tbl_sms WHERE  accountnumber ='$account' ");  while($row1 = mysqli_fetch_array($result)) { $data7=$row1[$col_name]; }   if($col_name=="icnumber"){$data7=substr($data7,0,8)."***".substr($data7,-1);}}}
        if( $row["col8"]!="") { if($row["col8"]=="officer"){$data8=$officername;}else{ $col_name=$row["col8"];   $result = mysqli_query($con,  "SELECT $col_name FROM tbl_sms WHERE  accountnumber ='$account' ");  while($row1 = mysqli_fetch_array($result)) { $data8=$row1[$col_name]; }   if($col_name=="icnumber"){$data8=substr($data8,0,8)."***".substr($data8,-1);}}}
    //  if( $row["col9"]!="") { $col_name=$row["col9"];   $result = mysqli_query($con,  "SELECT $col_name FROM tbl_sms WHERE  accountnumber ='$account' ");  while($row1 = mysqli_fetch_array($result)) { $data9=$row1[$col_name]; } }  if($col_name=="icnumber"){$data9=substr($data9,0,2)."*****".substr($data9,-2);}
      
        // echo " $text1 $data1 $text2 $data2 $text3 $data3 $text4 $data4 $text5 $data5 $text6 $data6 $text7 $data7 $text8 $data8 $text9 $data9";
      
       if( isset($row["text1"])) {echo $row["text1"];}   if( isset($data1))  {echo " $data1 ";   }
       if( isset($row["text2"])) {echo $row["text2"];}   if( isset($data2))  {echo " $data2 ";   }
       if( isset($row["text3"])) {echo $row["text3"];}   if( isset($data3))  {echo " $data3 ";   }
       if( isset($row["text4"])) {echo $row["text4"];}   if( isset($data4))  {echo " $data4 ";   }
       if( isset($row["text5"])) {echo $row["text5"];}   if( isset($data5))  {echo " $data5 ";   }
       if( isset($row["text6"])) {echo $row["text6"];}   if( isset($data6))  {echo " $data6 ";   }
       if( isset($row["text7"])) {echo $row["text7"];}   if( isset($data7))  {echo " $data7 ";   }
       if( isset($row["text8"])) {echo $row["text8"];}   if( isset($data8))  {echo " $data8 ";   }
       if( isset($row["text9"])) {echo $row["text9"];}   //if( isset($data9))  {echo " $data9 ";   }
    }
 ?>
           
