<?php
    //include "config.inc.php";
    $DATABASE_HOST = 'localhost'; // Host name
    $DATABASE_USERNAME = 'root';
	$DATABASE_PASSWORD = '';
    $DATABASE_NAME ='smstest' ; // Database name
    
    // Connect to server and select databse.
    $con = mysqli_connect( $DATABASE_HOST, $DATABASE_USERNAME, $DATABASE_PASSWORD, $DATABASE_NAME);
    mysqli_select_db($con,"$DATABASE_NAME")or die("cannot select DB");
?>