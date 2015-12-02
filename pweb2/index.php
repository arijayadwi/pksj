<?php include ("./include/header.php"); ?>
<?php
    $reg = @$_POST['reg'];
//declare variable
    $fn = "";//Fullname
    $un = "";//username
    $em = "";//Email
    $pswd = "";//Password
    $pswd2 = "";//Password2
    $d = "";//tanggal Sign Up
    $u_check = "";//ngecek username udah ada atau belom
//registrasi form
$fn = strip_tags(@$_POST['fname']);//Fullname
$un = strip_tags(@$_POST['username']);//username
$em = strip_tags(@$_POST['email']);//Email
$pswd = strip_tags(@$_POST['password']);//Password
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d");//hari-bulan-tahun


if ($reg) {
    $u_check = mysql_query("SELECT username FROM users WHERE username ='$un'");
    $check = mysql_num_rows($u_check);
    //cek username udah ada atau nggak
    if($check==0){
        if($fn && $un && $em && $pswd && $pswd2){
            //check password
            if ($pswd==$pswd2) {
                //lewat dari 25 karakter
                if (strlen($un)>25 || strlen($fn)>25) {
                    echo "Maximum panjang username/fullname hanya 25 karakter";
                }
                else
                {
                    if (strlen($pswd)>30||strlen($pswd)<3) {
                        echo "Password Anda Harus Diantara 3 sampai 30 karakter";
                    }
                    else
                    {
                        $pswd = md5($pswd);
                        $pswd2 = md5($pswd2);
                        $query = mysql_query("INSERT INTO users VALUES ('', '$un', '$fn', '$em', '$pswd', '$d', '0', '')");
                        die ("<p>Welcome to Music Altar</p>Login to your account to get started ...");
                    }
                }
            }
            else {
                echo "Your Password don't match !";
            }
        }
        else {
            echo "Plese fill in all field";
        }
    }
    else {
        echo "Username already taken ...";
    }
}
//User login code
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
	$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters
    $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters
	$md5password_login = md5($password_login);
    $sql = mysql_query("SELECT id FROM users WHERE username='$user_login' AND password='$md5password_login' LIMIT 1"); // query the person
	//Check for their existance
	$userCount = mysql_num_rows($sql); //Count the number of rows returned
	if ($userCount == 1) {
		while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
	}
		 //$_SESSION["id"] = $id;
		 $_SESSION["user_login"] = $user_login;
        setcookie("user_login", $_POST["user_login"], time() +  (86400 * 30));
        header("location: home.php");
		// $_SESSION["password_login"] = $password_login;
        //setcookie("password_login", $_POST["password_login"], time() + (86400 * 30), "/index.php");
         exit("<meta http-equiv=\"refresh\" content=\"0\">");
		} else {
		echo 'That information is incorrect, try again';
		exit();
	}
}

?>

<div id="slider">
        <img src="slide/img1.jpg" id="img" />
</div>
<div class="content">
       
       <div class="con1">
            <table>
                <tr>
                    <td width="40%" valign="top">
                        <form action="index.php" method="post">
                            <input type="text" name="user_login" size="25" placeholder="Username" /><br /><br />
                            <input type="password" name="password_login" size="25" placeholder="Password" /><br /><br />
                            <input type="submit" name="login" value="Log in">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <div class="con2">
            <table>
                <tr>
                    <td width="40%" valign="top">
                        <p>New to Music Altar ? Sign Up Below !</p>
                        <form action="#" method="post">
                            <input type="text" name="fname" size="25" placeholder="Full Name" /><br /><br />
                            <input type="text" name="username" size="25" placeholder="Username" /><br /><br />
                            <input type="text" name="email" size="25" placeholder="Email Address" /><br /><br />
                            <input type="password" name="password" size="25" placeholder="Password" /><br /><br />
                            <input type="password" name="password2" size="25" placeholder="Password Again" /><br /><br />
                            <input type="submit" name="reg" value="Sign Up for Music Altar">
                        </form>
                    </td>
                </tr>
            </table>
        </div> 
        
    </div>
    <div class="con3">
            <h1>
                Welcome to Music Altar.
            </h1><br />
            <p>
                Connect with your friends and other fascinating people about music. Get in moment picture and watch event unfolds.
            </p>
        </div>
    <div class="copyright">
       <img src="image/brit.jpg">
        <h2>musicaltar.com</h2>
        <h3>&copy;2015</h3>
        <h4>Author : I Putu Gede Indra Gunawan (5113100073)</h4>
    </div>
		


<?php include("./include/footer.php"); ?>