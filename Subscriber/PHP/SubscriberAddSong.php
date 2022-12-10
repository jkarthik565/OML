<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="subscriber"){
header("location:../../loginpage.php");	
}else{
	require_once('connect.php');
				$txtcat = $_POST['txtcat'];
				$txtdesc = $_POST['txtdesc'];
				$txtalbum = $_POST['txtalbum'];
				$txtsinger = $_POST['txtsinger'];
				$txtwriter = $_POST['txtwriter'];
				$txtsong = basename($connect ->real_escape_string($_SESSION['filename']));
				$insert = $connect -> query("INSERT INTO tblsongs(songcat,songalbum,songsinger,songdesc,songfile,songwriter) VALUES('".$txtcat."','".$txtalbum."','".$txtsinger."','".$txtdesc."','".$txtsong."','".$txtwriter."')") 
				or die ('An error occured '. mysqli_error());
}
?>