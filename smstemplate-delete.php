<?php
include "connect_db.php";
//$account=$_SESSION["account"];
$templete_id=$_REQUEST["id"]; 
$delete = mysqli_query($con, "DELETE FROM tbl_templete_format WHERE templete_id='$templete_id'");
if($delete > 0){  echo "success"; }else{  echo "failed"; }
?>