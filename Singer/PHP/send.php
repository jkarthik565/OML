<?php
require_once('connect.php');
$mymsg = $_POST['Singermsg'];
$name = $_POST['name'];
$to = $_POST['email'];
$subject = 'OML user feedbacks';
$from = 'bmegmusic@yahoo.com';
$header = 'From '. $from;
$message = "Hello ".$name ." thank you for sending as you feedback. <br/>" .$mymsg;
mail($to,$subject,$message,$header);
$updateStatus = $connect -> query("UPDATE tblfeedback SET status ='1'") or die (mysqli_error());
echo "<script>alert('Message has been sent!');window.location.href='feedbacks.php';</script>";
?>