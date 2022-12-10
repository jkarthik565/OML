<?php
require_once('Administrator/PHP/connect.php');
$username = $_POST['username'];
$password = $_POST['password'];
if ($check = $connect -> query("SELECT * FROM tblusers WHERE username = '$username' AND password ='$password'")) {
if(mysqli_num_rows($check) >= 1){
	while($row = $check -> fetch_array(MYSQLI_ASSOC)){
		session_start();
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['role'] = $row['role'];
		$_SESSION['username'] = $row['username'];
		if($_SESSION['role']=="admin"){
		header("Location:Administrator/PHP/AdminHome.php");	
		}
		if($_SESSION['role']=="subscriber"){
		header("Location:Subscriber/PHP/SubscriberHome.php");	
		}
		if($_SESSION['role']=="singer"){
		header("Location:Singer/PHP/SingerHome.php");	
		}
		if($_SESSION['role']=="publicuser"){
		header("Location:pUser/PHP/UserHome.php");	
		}
	}
	
}else{
	header("Location:loginpage.php?error_log=1");	
}
}else{
die("Something Wrong");
}
?>