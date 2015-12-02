<?php include ("./include/header.php"); ?>
<?php
if (isset($_GET['u'])) {
	$username = mysql_real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
 	//check user exists
	$check = mysql_query("SELECT username, fullname FROM users WHERE username='$username'");
	if (mysql_num_rows($check)===1) {
	$get = mysql_fetch_assoc($check);
	$username = $get['username'];
	$full_name = $get['fullname'];	
	}
	else
	{
        //header("Location : index.php");
    //echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost:8080/pweb/index.php\">";
    echo"<script type='text/javascript'> alert('You must be Log in');document.location='index.php'</script>";
	exit();
	}
	}
}

?>
<div id="wrap">
<div class="postForm">
     <form action="profile.php?u=<?php echo $username; ?>" method="POST">
        <textarea name="post" id="post" cols="60" rows="5"></textarea>
        <input type="submit" name="send" value="Post" style="background-color: #DCE5EE;
        float: right;
        border; 1px solid #666;
        color: #666;
        height: 73px;
        width: 65px";
         />
</form>
</div>
<div class="profilePosts">
<?php
    $getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10") or die(mysql_error());
    while ($row = mysql_fetch_assoc($getposts)) {
        $id = $row['id'];
        $body = $row['body'];
        $date_added = $row['date_added'];
        $added_by = $row['added_by'];
        $user_posted_to = $row['user_posted_to'];
        echo "<div class='posted_by'><a href='$added_by'>$added_by</a> - $date_added - </div>&nbsp;&nbsp;$body<br /><hr />";
        }
    
    
?>    
</div>
<div style="height:250px; width:200px;" >

<?php
    $sql = "SELECT image FROM `image` where username = '$username'"; // 
    $sth = mysql_query($sql);
    $result=mysql_fetch_array($sth);
// this is code to display 
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>'
?>
</div>
<?php
    $del = @$_POST['deletepic'];
    if ($del) {
        $del_pic_query = mysql_query("DELETE FROM image WHERE username = '$username'");
        exit("<meta http-equiv=\"refresh\" content=\"0\">");
        //echo "Your pic has been deleted";
        
    }
    else
    {
        
    }
    
?>

<form action="download.php" method="post">
<input type="submit" name="download" id="download" value="Download this pic"/>
</form>

<form action="profile.php" method="post">
<input type="submit" name="deletepic" id="deletepic" value="Delete"/>
</form>
<br />
<div class="textHeader"><?php echo $username; ?>'s Profile</div>
<div class="profileLeftSideContent">
    <?php
        $about_query = mysql_query("SELECT bio FROM users WHERE username = '$username'");
        $get_result = mysql_fetch_assoc($about_query);
        $about_the_user = $get_result['bio'];
        echo $about_the_user;

    ?>
</div>
<div class="textHeader"><?php echo $username; ?>'s Friends</div>

<div class="profileLeftSideContent">
    <img src="#" height"50" width="40" />&nbsp;&nbsp;
    <img src="#" height"50" width="40" />&nbsp;&nbsp;
    <img src="#" height"50" width="40" />&nbsp;&nbsp;
    <img src="#" height"50" width="40" />&nbsp;&nbsp;
    <img src="#" height"50" width="40" />&nbsp;&nbsp;
    <img src="#" height"50" width="40" />&nbsp;&nbsp;
    <img src="#" height"50" width="40" />&nbsp;&nbsp;
</div>
</div>




