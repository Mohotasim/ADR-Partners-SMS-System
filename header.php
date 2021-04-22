<?php
    session_start();
    include "connect_db.php";
         
    if(isset($_SESSION["email"]))
	   { 
        $sessionid = $_SESSION["id"];
        $sessiondisplayname = $_SESSION["displayname"];
        $sessionrole = $_SESSION["role"];
        $sessionemail = $_SESSION["email"];
    }else{
        echo '<script>window.location.href="index.php"</script>';
    }
	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">ADR PARTNERS SMS SYSTEM</a>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li><a href="dashboard.php">Home</a></li>
                     <!-- <li><a href="sms.php">SMS</a></li> -->
                      <li><a href="smstemplate.php">SMS Template</a></li>
                      <li><a href="user.php">User Management</a></li>
          					  <li><a href="smslog.php">SMS Log</a></li>
          					  <li><a href="upload.php" >Account List</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="#"><?php echo $sessiondisplayname ?> </a></li>
                      <li><a class="btn btn-danger" href="logout.php">Logout</a></li>
                    </ul>
                  </div>
                </div>
            </nav>