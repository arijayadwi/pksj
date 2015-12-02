<?php 
    include ("./include/header.php");
    if ($username){
        
    }
    else
    {
        die ("You must be logged in to view this page !");
    }
?>
<?php
    $send_data = @$_POST['senddata'];

    $old_password = @$_POST['oldpassword'];
    $new_password = @$_POST['newpassword'];
    $repeat_password = @$_POST['newpassword2'];

    //kalo udah di submit
    if ($send_data) {
        
        $password_query = mysql_query("SELECT * FROM users WHERE username='$username'");
        while ($row = mysql_fetch_assoc($password_query)) {
            $db_password = $row['password'];
            
            //md5 old password
            $old_password_md5 = md5($old_password);
            
            if ($old_password_md5 == $db_password) {
                //echo "Your old password match";
                if ($new_password == $repeat_password)
                {
                    if (strlen($new_password) <= 3){
                        echo "Sorry! Your must be more than 3 character long!";
                    }
                    else
                    {
                    //echo "Your new password match";
                    $new_password_md5 = md5($new_password);
                    
                    $password_update_query = mysql_query("UPDATE users SET password = '$new_password_md5' WHERE username = '$username'");
                    echo "Succes ! Your password has been updated !";
                    }
                }
                else{
                    echo "Your new password don't match";
                }
            }
            else
            {
                echo "The old password incorrect !";
            }
        }
    
    }
    else {
        echo "";
    }
$updateinfo = @$_POST['update_info'];
    $get_info = mysql_query("SELECT fullname, bio FROM users WHERE username='$username'");
//Update your profile info
    $get_row = mysql_fetch_assoc($get_info);
    $db_fullname = $get_row['fullname'];
    $db_bio = $get_row['bio'];
//submit update info
if ($updateinfo) {
    $fullname = strip_tags(@$_POST['fullname']);
    $bio = @$_POST['bio'];
    
    if (strlen($fullname) < 3) {
        echo "Your name must be 3 or more character!";
    }
    else 
    {
        $info_submit_query = mysql_query("UPDATE users SET fullname='$fullname', bio='$bio' WHERE username='$username'");
        echo "Your Profile Information has been updated!";
        header("Location: profile.php?u=$username");
    }
}
else
{
    
}

//upload image 
?>
<h2>Edit your Account Settings below</h2>
<hr />
<p>Upload Your Profile Avatar</p>
<form action="posting.php" method="post" enctype="multipart/form-data">
   <img id="uploadPreview" style="width:70px; height: auto;" />
    <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" />
    <input type="submit" width="120" height="24" name="simpan" value="Upload" >
</form>
<hr />
<form action="account_settings.php" method="post">
<p>Change Your Password</p><br />
Enter Your Old Password :<input type="text" name="oldpassword" id="oldpassword" size="30"><br />
Enter Your New Password :<input type="text" name="newpassword" id="newpassword" size="30"><br />
Your New Password Again:<input type="text" name="newpassword2" id="newpassword2" size="30"><br />
<input type="submit" name="senddata" id="senddata" value="Update Information"/>
</form>

<hr />
<p>Update Your Profile Info</p><br />
<form action="account_settings.php" method="post">
Fullname :<input type="text" name="fullname" id="fullname" size="50" value="<?php echo $db_fullname ?>"><br />
About You : <textarea name="bio" id="bio" cols="40" rows="7"><?php echo $db_bio ?></textarea>


<hr />
<input type="submit" name="update_info" id="update_info" value="Update Information"/>
</form>
<br />
<br />