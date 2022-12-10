<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="admin"){
header("location:../../loginpage.php");	
}else{
	require_once('connect.php');
	$id = $_REQUEST['id'];
	$getimage = $connect -> query("SELECT catimage FROM tblcategory WHERE id = '".$id."'");
	while($rowImage = $getimage -> fetch_array(MYSQLI_ASSOC)){
		  $image = $rowImage['catimage'];	
	}
	unlink("upload_images/category/".$image);
	$delete = $connect -> query("DELETE FROM tblcategory WHERE id = '".$id."'") or die ('An error occured '.mysqli_error());
	$delete = $connect -> query("DELETE FROM tblalbum WHERE albumcat = '".$id."'")or die ('An error occured '.mysqli_error());
	header("Location:AdminViewCategory.php");
}
?>