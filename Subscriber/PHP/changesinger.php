<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="subscriber"){
header("location:../../loginpage.php");	
}else{
	extract($_SESSION);
	require_once('connect.php');
	$sql="ALTER TABLE TBLALBUM ADD COLUMN avail VARCHAR(2);";
	mysqli_query($connect,$sql) or die("Something went wrong");
	$sql="UPDATE TBLALBUM SET avail='pr' WHERE 1;";
	mysqli_query($connect,$sql) or die("Something went wrong");
	require_once('connect2.php');
	$sql="UPDATE TBLUSERS SET role='singer' WHERE username='".$username."';";
	mysqli_query($connect,$sql) or die("Something went wrong");
	unset($_SESSION['user_id']);
	session_destroy();
	header("Location:../../loginpage.php?login1=1");
}
?>