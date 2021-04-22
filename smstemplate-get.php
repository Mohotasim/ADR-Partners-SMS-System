<?php
session_start();
include "connect_db.php";
$account=$_SESSION["account"];
$templete_id=$_REQUEST["q"];  
if($templete_id!=""){$_SESSION["templete_id"]=$templete_id;}//this code is for sms-body-popup.php //to detect templete_id 

$numbers = mysqli_query($con, "SELECT templete_name, text1,text2,text3,text4,text5,text6,text7,text8,text9,text10, col1, col2, col3, col4, col5, col6, col7, col8, col9, col10  FROM tbl_templete_format WHERE templete_id ='$templete_id'");
while($row = mysqli_fetch_assoc($numbers)){
                                            $t1= $row["text1"];  if($row["col1"]!=""){ $c1="[".$row["col1"]."]"; } else {$c1="";}
                                            $t2= $row["text2"];  if($row["col2"]!=""){ $c2="[".$row["col2"]."]"; } else {$c2="";}
                                            $t3= $row["text3"];  if($row["col3"]!=""){ $c3="[".$row["col3"]."]"; } else {$c3="";}
                                            $t4= $row["text4"];  if($row["col4"]!=""){ $c4="[".$row["col4"]."]"; } else {$c4="";}
                                            $t5= $row["text5"];  if($row["col5"]!=""){ $c5="[".$row["col5"]."]"; } else {$c5="";}
                                            $t6= $row["text6"];  if($row["col6"]!=""){ $c6="[".$row["col6"]."]"; } else {$c6="";}
                                            $t7= $row["text7"];  if($row["col7"]!=""){ $c7="[".$row["col7"]."]"; } else {$c7="";}
                                            $t8= $row["text8"];  if($row["col8"]!=""){ $c8="[".$row["col8"]."]"; } else {$c8="";}
                                            $t9= $row["text9"];  if($row["col9"]!=""){ $c9="[".$row["col9"]."]"; } else {$c9="";}
                                            
                                         echo "$t1 $c1 $t2 $c2 $t3 $c3 $t4 $c4 $t5 $c5 $t6 $c6 $t7 $c7 $t8 $c8 $t9 $c9";
                                          } 
?>