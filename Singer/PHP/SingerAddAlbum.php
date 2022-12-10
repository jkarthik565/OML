<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="singer"){
header("location:../../loginpage.php");	
}else{
require_once('connect.php');
				$txtimage = basename($connect ->real_escape_string($_SESSION['filename']));
				$txtalbum = $connect -> real_escape_string($_POST['txtalbum']);
				$txtsinger = $connect ->real_escape_string($_POST['txtsinger']);
				$txtwriter = $connect ->real_escape_string($_POST['txtwriter']);
				$txtdesc = $connect ->real_escape_string($_POST['txtdesc']);
				$txtcat = $connect ->real_escape_string($_POST['txtcat']);
					if($sqlalbum = $connect -> query("INSERT INTO tblalbum(albumcat,albumname,
											albumsinger,albumwriter,albumdesc,albumimage,avail)
					VALUES ('".$txtcat."','".$txtalbum."','".$txtsinger."',
							'".$txtwriter."','".$txtdesc."','".$txtimage."','pr')") or die 
							('An error occured whileprocessing the form ' . mysqli_error())){	
					$status = 'Success';
				}else{
					$status = 'Failed: Something went wrong';	
				}
				echo returnStatus($status);	
	function returnStatus($status)
				{
					return "<html><body>
					<script type='text/javascript'>
						function init(){if(top.uploadComplete) top.uploadComplete('".$status."');}
						window.onload=init;
					</script></body></html>";
				}
}
?>