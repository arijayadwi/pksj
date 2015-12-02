<?php
// Connect to Database
include ("./include/header.php");

//$judul=$_POST['judul'];

if(isset($_POST['simpan'])){
    if(!isset($_FILES['image'])){
        echo 'Pilih file gambar';
    }
    else
    {
		$image 		= addslashes(file_get_contents($_FILES['image']['tmp_name']));
    	$image_name	= addslashes($_FILES['image']['name']);
        $image_size	= getimagesize($_FILES['image']['tmp_name']);
   		if($image_size == false){
		    echo 'File yang anda pilih Bukan gambar';
        }
        else
        {
        if(!$insert = mysql_query("INSERT INTO image VALUES('', '$image_name', '$image','$username')"))
            {
                echo 'Gagal upload gambar';
	        }

            else
            {
			    // Informasi berhasil dan kembali ke inputan
			    echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
		    }

	    }
    }
}

?>