<?php
require_once('Administrator/PHP/connect.php');
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
if($check=$connect -> query("SELECT * FROM tblusers where username='$username';")){
if(mysqli_num_rows($check) >= 1){
header("Location:signup.php?error_log=1");
}else{
if ($check = $connect -> multi_query("
INSERT INTO tblusers(name,username,password,role,per) values('$name','$username','$password','publicuser','onlyread');")) {
	header("Location:loginpage.php?success_log=1");
}else{
echo "<script>alert('Something went wrong')</script>";
}
}
}else{
echo "<script>alert('Something went wrong')</script>";
}
?>