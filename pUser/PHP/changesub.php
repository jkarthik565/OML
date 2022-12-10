<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="publicuser"){
header("location:../../loginpage.php");	
}else{
$servername = "localhost";
$username = "root";
$password = "";
$db="dbmis";
$filename="changetosub.sql";

// Create connection
$connect = new mysqli($servername, $username, $password);
// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}
extract($_SESSION);

// Create database
$sql = "CREATE DATABASE $username";
if ($connect->query($sql) === TRUE) {
	$connect = mysqli_connect("localhost","root","",$_SESSION['username']);
if ($connect -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connect -> connect_error;
  exit();
}
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
	 mysqli_query($connect,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
$connect = new mysqli($servername, "root", $password,$db);
$sql="UPDATE TBLUSERS SET ROLE='subscriber',PER='partial' WHERE username='".$username."'";
mysqli_query($connect,$sql) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error() . '<br /><br />');
  unset($_SESSION['user_id']);
session_destroy();
header("Location:../../loginpage.php?login=1");
} else {
  echo "<script>alert('Something went wrong')</script>" . $connect->error;
}

$connect->close();
}?>