<?php
//String connection to the database
$connect = mysqli_connect("localhost","root","",$_SESSION['username']);
if ($connect -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connect -> connect_error;
  exit();
}
?>