<?php
require_once('../Administrator/PHP/connect.php');
error_reporting(E_ERROR);
$song = $_POST['song'];
$ip = $_SERVER['REMOTE_ADDR'];
$time = time();
$timeout = 60*60*24; //24 hours
$out = $time - $timeout;
if(!isset($_POST['song'])){
	echo "<script>alert('Please Choose a song!');window.location.href='Songs.php';</script>";
}else{
	$checkIP = $connect -> query("SELECT * FROM tblip WHERE ip = '$ip' AND time > '$out'") or die (mysqli_error());
	if(mysqli_num_rows($checkIP) >=1){
		echo "<script>alert('Opps..You can only vote once a day!');window.location.href='Songs.php';</script>";	
	}else{
	$insertIP = $connect -> query("INSERT INTO tblip(ip,time) VALUES ('".$ip."','".$time."')") or die(mysqli_error());
	$updatepoints = $connect -> query("UPDATE tblsongs SET songpoints = songpoints + 1 WHERE id = '".$song."'") or die (mysqli_error());
		echo "<script>alert('Thank you for voting!');window.location.href='Songs.php';</script>";
	}
}
?>
