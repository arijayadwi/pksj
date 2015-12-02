<?php
//cara 1
include ("./include/header.php");

$query = mysql_query("SELECT * from image where username='$username'"); 
    $row = mysql_fetch_assoc($query); 
    //echo $row['name']; 
    $filename=$row['name']; 
    $filedata=$row['image']; 
    //$filetype=$row['tipe']; 
    //echo $filename;
    //echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
    //header("Content-type: $filetype"); 
    header("Content-Transfer-Encoding: binarynn"); 
    header("Pragma: no-cache"); header("Expires: 0"); header("Content-Disposition: attachment; filename=$filename"); ob_clean(); flush(); echo $filedata; exit();

//echo $username;
//$query = mysql_query("SELECT name from `image` where username='$username'");
//$row = mysql_fetch_assoc($query);
//echo $row['name'];

?>