<html>
	<head>
		<title>pendaftaran</title>
		<script type="text/javascript">
	function showMsg()
	{
		var textcontrol = document.getElementById("username");
		var nama = textcontrol.value;
		if(nama=="admin")
		{
			alert("Hallo " +nama+ ".");
			document.location.href="home.php";
		}
		else
		{
			alert("Saya tidak mengenal anda.");
		}
	}
	</script>
		
	</head>
	<body>
	pendaftaran
	<form method="POST" action="home.php">
	<table width="535" height="472" border="1">
	 <tr bgcolor="#0099FF">
		<td width="175">&nbsp;</td>
		<td width="192"><strong>SELAMAT DATANG DI INFORMATIKA</strong></td>
		<td width="146">&nbsp;</td>
	</tr>
	<tr>
    <td height="187"><img src="maskot_bali.png" width="175" height="142" alt=""></td>
    <td><img src="maskot_jawa.png" width="173" height="125" alt=""></td>
    <td><img src="maskot_kalimantan.png" width="150" height="114" alt=""></td>
	</tr>
	
		<tr>
		<td>Username : </td>
		<td> <input type="text" name="username"/></td>
		</tr>
	
		<tr>
		<td>Password : </td>
		<td> <input type="password" name ="password"/></td>
		</tr>
		
		<tr>
		<td> </td>
		<td> <input type="submit" name="submit" value="submit" /></td>
		
	</table>
	</form>
	
	<?php
		if(@$_GET['status'] == "false" && isset ($_POST['submit']) )
		{
			echo "Silahkan masukkan username dan password";
		}
		?>
		
	</body>
</html>
