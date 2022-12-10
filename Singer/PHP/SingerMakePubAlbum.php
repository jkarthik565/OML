<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="singer"){
header("location:../../loginpage.php");	
}else{
require_once('connect.php');
$id = $_REQUEST['id'];
$album1=$connect -> query("SELECT * FROM tblalbum where id=$id");
$album2=$connect -> query("SELECT * FROM tblsongs where songalbum=$id");
require_once('connect2.php');
while($album = $album1 -> fetch_array(MYSQLI_ASSOC)){
$albumcat=$album['albumcat'];
$albumname=$album['albumname'];
$albumsinger=$album['albumsinger'];
$albumwriter=$album['albumwriter'];
$albumdesc=$album['albumdesc'];
$albumimage=$album['albumimage'];
}
$rows=$connect -> query("SELECT ID FROM `tempalbum` WHERE id=$id AND username='".$_SESSION['username']."'");
if(mysqli_num_rows($rows)>0){
	echo "<script>alert('Already Requested');</script>";
}elseif($connect -> query("INSERT INTO `tempalbum`(id,albumcat,albumname,albumsinger,albumwriter,albumdesc,albumimage,username) VALUES($id,'".$albumcat."','".$albumname."','".$albumsinger."','".$albumwriter."','".$albumdesc."','".$albumimage."','".$_SESSION['username']."');")){
	while($album = $album2 -> fetch_array(MYSQLI_ASSOC)){
$songid=$album['id'];
$cat=$album['songcat'];
$alb=$album['songalbum'];
$singer=$album['songsinger'];
$desc=$album['songdesc'];
$file=$album['songfile'];
$writer=$album['songwriter'];
$points=$album['songpoints'];
$connect -> query("INSERT INTO `tempsongs` VALUES($songid,'".$cat."',$alb,'".$singer."','".$desc."','".$file."','".$writer."','".$points."','".$_SESSION['username']."');");
}
	header("Location: SingerViewAlbums.php");
}else{
	echo "<script>alert('Something Wrong!');</script>";
}
}
?>