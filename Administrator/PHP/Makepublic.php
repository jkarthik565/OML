<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="admin"){
header("location:../../loginpage.php");	
}else{
	require('connect.php');
	$id = $_REQUEST['id'];
	$sql = $connect -> query("SELECT id,username from tempalbum where temp_id='".$id."'");
	while($rowCat = $sql -> fetch_array(MYSQLI_ASSOC)){
	$rowname=$rowCat['username'];
	$id1=$rowCat['id'];
	}
	$get = $connect -> query("INSERT INTO tblalbum(albumcat,albumname,albumsinger,albumwriter,albumdesc,albumimage,author)
	SELECT albumcat,albumname,albumsinger,albumwriter,albumdesc,albumimage,username FROM tempalbum WHERE id = '".$id1."' AND username='".$rowname."'");
	$sql = $connect -> query("SELECT tba.id,tba.author from tblalbum tba,tempalbum tea where tba.albumname=tea.albumname AND tba.author=tea.username");
	$row=1231;
	$rowname="";
	while($rowCat = $sql -> fetch_array(MYSQLI_ASSOC)){
	$rowname=$rowCat['author'];
	$row=$rowCat['id'];
	}
	require('connect.php');
	$connect->query("UPDATE tempalbum SET id='$row' WHERE id='".$id1."' AND username='".$rowname."'");
	$connect->query("UPDATE tempsongs SET songalbum='$row' WHERE songalbum='".$id1."' AND username='".$rowname."'");
	require('connect2.php');
	$connect->query("UPDATE tblalbum SET id='$row',avail='pb' WHERE id='".$id1."'");
	$connect->query("UPDATE tblsongs SET songalbum='$row' WHERE songalbum='".$id1."'");
	
	require('connect.php');
	$getsongs = $connect -> query("INSERT INTO tblsongs(songcat,songalbum,songsinger,songdesc,songfile,songwriter,songpoints,author)
	SELECT songcat,songalbum,songsinger,songdesc,songfile,songwriter,songpoints,username FROM tempsongs WHERE songalbum = '".$row."'");
	
	$sql = $connect -> query("SELECT tba.id,tba.author from tblsongs tba,tempsongs tea where tba.songalbum=tea.songalbum");
	$row2=array();
	while($rowCat = $sql -> fetch_array(MYSQLI_ASSOC)){
	$row2[]=$rowCat['id'];
	$rowname=$rowCat['author'];
	}
	require('connect2.php');
	for($count=0;$count<mysqli_num_rows($sql);$count++){
	$connect->query("UPDATE tblsongs SET id='$row2[$count]' WHERE songalbum='".$row."'");
	}
	
	require('connect.php');
	$deletealbum = $connect -> query("DELETE FROM tempalbum WHERE id = '".$row."' AND username='".$rowname."'");
	$deletesong = $connect -> query("DELETE FROM tempsongs WHERE songalbum = '".$row."' AND username='".$rowname."'");
	header("Location: userrequests.php");
}
?>