<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="singer"){
header("location:../../loginpage.php");	
}else{
	extract($_SESSION);
	require_once('connect2.php');
	$sql="DELETE FROM TBLALBUM WHERE AUTHOR='".$username."';";
	$sql.="DELETE FROM TBLSONGS WHERE AUTHOR='".$username."';";
	$sql.="DELETE FROM TEMPALBUM WHERE USERNAME='".$username."';";
	$sql.="DELETE FROM TEMPSONGS WHERE USERNAME='".$username."';";
	$sql.="UPDATE TBLUSERS SET ROLE='subscriber' WHERE USERNAME='".$username."';";
	mysqli_multi_query($connect,$sql) or die("Something went wrong");
	require_once('connect.php');
	$sql="ALTER TABLE TBLALBUM DROP COLUMN avail;";
	mysqli_multi_query($connect,$sql) or die("Something went wrong");
	unset($_SESSION['user_id']);
	session_destroy();
	header("Location:../../loginpage.php?login2=1");
}
?>