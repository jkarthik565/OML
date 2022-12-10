<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="subscriber"){
header("location:../../loginpage.php");	
}else{
	require_once('connect.php');
	$id = $_REQUEST['id'];
	$getImage = $connect -> query("SELECT albumimage FROM tblalbum WHERE id = '".$id."'");
	while($rowImage = $getImage -> fetch_array(MYSQLI_ASSOC)){
		$image = $rowImage['albumimage'];	
	}
	unlink("../../Administrator/PHP/upload_images/album/".$image);
	$deletealbum = $connect -> query("DELETE FROM tblalbum WHERE id = '".$id."'");
	$deletesong = $connect -> query("DELETE FROM tblsongs WHERE songalbum = '".$id."'");
	header("Location: SubscriberViewAlbums.php");
}
?>