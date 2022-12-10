<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="subscriber"){
header("location:../../loginpage.php");	
}else{
	if(($_FILES['txtsong']['type'] == "audio/mpeg")
		||($_FILES['txtsong']['type'] == "audio/mp3"))
	{
		$_SESSION['filename']=$_FILES['txtsong']['name'];
move_uploaded_file($_FILES['txtsong']['tmp_name'], "../../Administrator/PHP/songs/".$_FILES['txtsong']['name']);
	}else{
		echo 'Invalid audio format';	
	}
}
?>
