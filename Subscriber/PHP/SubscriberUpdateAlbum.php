
<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="subscriber"){
header("location:../../loginpage.php");	
}else{

require_once('connect.php');
$id = $_POST['id'];
$txtalbum = $connect -> real_escape_string($_POST['txtalbum']);
$txtsinger = $connect -> real_escape_string($_POST['txtsinger']);
$txtwriter = $connect -> real_escape_string($_POST['txtwriter']);
$txtdesc = $connect -> real_escape_string($_POST['txtdesc']);
$txtcat = $connect -> real_escape_string($_POST['txtcat']);
$path = $_FILES['txtimage']['name'];
if($path == ""){
	
	$update = $connect -> query("UPDATE tblalbum SET albumcat='".$txtcat."',
					   albumname='".$txtalbum."',
					   albumsinger='".$txtsinger."',
					   albumwriter='".$txtwriter."',
					   albumdesc='".$txtdesc."' WHERE id = '".$id."'") 
					   or die ('An error occured '.mysqli_error());	
}else{
	$getimage =$connect -> query("SELECT albumimage FROM tblalbum WHERE id = '".$id."'");
	while($rowImage = $getimage -> fetch_array(MYSQLI_ASSOC)){
		$image = $rowImage['albumimage'];	
	}
	unlink("../../Administrator/PHP/upload_images/album/".$image);
	
	if(($_FILES['txtimage']['type'] == "image/jpeg")
		||($_FILES['txtimage']['type'] == "image/pjpeg")
		||($_FILES['txtimage']['type'] == "image/png")
		||($_FILES['txtimage']['type'] == "image/gif"))
	{
			//Check errors first
			if($_FILES['txtimage']['error'] > 0){
				echo 'Error occured while processing the form';	
			}
			else{
			
				$txtimage = basename($connect -> real_escape_string($_FILES['txtimage']['name']));
				if(move_uploaded_file($_FILES['txtimage']['tmp_name'], 
						"../../Administrator/PHP/upload_images/album/".$_FILES['txtimage']['name'])){
					$sqlalbum = $connect -> query("UPDATE tblalbum SET albumcat='".$txtcat."',
					   						albumname='".$txtalbum."',
					   						albumsinger='".$txtsinger."',
										   	albumwriter='".$txtwriter."',
										   	albumdesc='".$txtdesc."',
											albumimage='".$txtimage."'
											WHERE id = '".$id."'") or die 
											('An error occured whileprocessing the form ' . mysqli_error());	
					$status = 'Success';
				}else{
					$status = 'Failed: Something went wrong';	
				}
				echo returnStatus($status);	
			}
	}else{
		echo 'Invalid image format';	
	}
	function returnStatus($status)
				{
					return "<html><body>
					<script type='text/javascript'>
						function init(){if(top.uploadComplete) top.uploadComplete('".$status."');}
						window.onload=init;
					</script></body></html>";
				}
}
}
?>