<?php 
include("./include/connect.php"); 
    session_start();
    if (!isset($_SESSION["user_login"])){
        $username = "";
    }
    else {
        $username = $_SESSION["user_login"];
        //header("Location: home.php");
    }

?>
<!DOCTYPE HTML>
<html>

<head>
	<title align="left">Music Altar</title>
	
	<link rel="stylesheet" type ="text/css" href="css+background/style.css">
    <script src="js/slide.js"></script>
	<script src="js/main.js" type="text/javascript"></script>
	<script src="js/preview.js" type="text/javascript"></script>
</head>

<body onload="slideA()">
<div class="header">

	<div class="headercontent">
        
        <?php
        if (!$username) {
        echo '<div class="nav">
            <ul>
                <li><a href="index.php">Sign Up+</a></li>
                <li><a href="index.php">Log in</a></li>
            </ul>
        </div>';
        }
        else {
             echo '<div class="nav">
            <ul>
                <li><a href="profile.php?u='.$username.'">Profile</a></li>
                <li><a href="account_settings.php">Account Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>';
        }
        ?>
    </div>
    <div class="headerbreak"></div>
    
</div>