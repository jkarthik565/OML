<?php
//String connection to the database
$connect = mysqli_connect("localhost","root","","dbmis");
if ($connect -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connect -> connect_error;
  exit();
}
?>