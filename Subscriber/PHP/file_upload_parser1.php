<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="subscriber"){
header("location:../../loginpage.php");	
}else{
	if(($_FILES['txtimage']['type'] == "image/jpeg")
		||($_FILES['txtimage']['type'] == "image/pjpeg")
		||($_FILES['txtimage']['type'] == "image/png")
		||($_FILES['txtimage']['type'] == "image/gif"))
	{
		$_SESSION['filename']=$_FILES['txtimage']['name'];
move_uploaded_file($_FILES['txtimage']['tmp_name'], "../../Administrator/PHP/upload_images/album/".$_FILES['txtimage']['name']);
	}else{
		echo 'Invalid image format';	
	}
}
?>
