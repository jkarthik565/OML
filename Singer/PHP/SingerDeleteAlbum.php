<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="singer"){
header("location:../../loginpage.php");	
}else{
	require_once('connect.php');
	$id = $_REQUEST['id'];
	$getImage = $connect -> query("SELECT avail,albumimage FROM tblalbum WHERE id = '".$id."'");
	if(mysqli_num_rows($getImage)>0){
	while($rowImage = $getImage -> fetch_array(MYSQLI_ASSOC)){
		$image = $rowImage['albumimage'];
		$avail = $rowImage['avail'];
	}
	unlink("../../Administrator/PHP/upload_images/album/".$image);
	$deletealbum = $connect -> query("DELETE FROM tblalbum WHERE id = '".$id."'");
	$deletesong = $connect -> query("DELETE FROM tblsongs WHERE songalbum = '".$id."'");
	require_once('connect2.php');
	$deletealbum = $connect -> query("DELETE FROM tempalbum WHERE id = '".$id."' AND username='".$_SESSION['username']."'");
	$deletesong = $connect -> query("DELETE FROM tempsongs WHERE songalbum = '".$id."' AND username='".$_SESSION['username']."'");
	if($avail==='pb'){
	$deletealbum = $connect -> query("DELETE FROM tblalbum WHERE id = '".$id."'");
	$deletesong = $connect -> query("DELETE FROM tblsongs WHERE songalbum = '".$id."'");
	}
	header("Location: SingerViewAlbums.php");
	}
}
?>