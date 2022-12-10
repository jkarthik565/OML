<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="subscriber"){
header("location:../../loginpage.php");	
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OML | Subscriber Page</title>
<link rel="stylesheet" type="text/css" href="../css/SubscriberStyle.css" />
<script type="text/javascript" src="../Javascript/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../Javascript/formvalidatesong.js"></script>
</head>
<script type="text/javascript">
function upload(){
	document.getElementById('form').onsubmit = function(){
		document.getElementById('form').target='uploadframe';
		document.getElementById('status').innerHTML=status;
	}	
}
function _(el) {
  return document.getElementById(el);
}
var limit=1;
function uploadFile() {
  if(limit>1){
	  alert('File limit Exceeded');
	  return;
  }
  var file = _("txtsong").files[0];
  if(file.size>10485760){
	  alert('File size Exceeded');
	  return;
  }
  if(file.type!="audio/mpeg" && file.type!="audio/mp3"){
	  alert('Not a valid format');
	  return;
  }
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("txtsong", file);
  limit=limit+1;
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "file_upload_parser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
  //use file_upload_parser.php from above url
  ajax.send(formdata);
}

function progressHandler(event) {
  _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(event) {
  _("status").innerHTML = event.target.responseText;
  _("progressBar").value = 0; //wil clear progress bar after successful upload
}

function errorHandler(event) {
  _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
  _("status").innerHTML = "Upload Aborted";
}
window.onload='upload';
</script>
<body>
<div class="header_wrapper">
	<div class="login">
          <?php
				$today = date("F j, Y");
				echo '&nbsp;Today is '.$today;
				?>
            <ul>
            	
                <li><a href="logout.php">Subscriber Logout</a></li>
            </ul>
   	</div>
</div>
<!--Start Menu-->
<div class="header_menu">
	<div class="menu">
    	<ul>
        	<li><a href="SubscriberHome.php">HOME</a></li>
            <li><a href="SubscriberCategory.php">CATEGORIES</a></li>
            <li><a href="SubscriberAlbum.php">ALBUMS</a></li>
			<li><a href="AllAlbums.php">ALL ALBUMS</a></li>
    	</ul>
    </div>
</div>
<!--End Menu-->
<div class="header_under"></div>
<!--Start Container for the web content-->
<div class="container_wrapper">
	<!--Sidebar-->
    <div class="sidebar_menu">
    	<div>
    		<h4 class="header">OML Menu</h4>
        </div>
    	<ul>
        	<li><a href="SubscriberAlbum.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add Album</a></li>
            <li><a href="SubscriberViewAlbums.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;View Records</a></li>
 
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Add Song</h2>
        <div class="success"></div>
		<div class="error"></div>
			<form id="form" method="post" name="form" enctype="multipart/form-data" action="SubscriberAddSong.php" target="uploadframe">	
                <div>
                    <iframe src="" id="uploadframe" name="uploadframe" 
                    style="width:0px; height:0px; border:0px;"></iframe>
                </div>     
            	<div>
                	<label for="Category">Song Category</label>
                    <?php
					require_once('connect.php');
					$id = $_REQUEST['id'];
					$get = $connect -> query("SELECT tblalbum.id,tblalbum.albumname,tblalbum.albumsinger,tblalbum.albumwriter,tblcategory.catname,tblcategory.id FROM tblalbum,tblcategory WHERE tblalbum.albumcat = tblcategory.id AND tblalbum.id ='".$id."'");
					while($row = $get -> fetch_array(MYSQLI_ASSOC)){
					?>
                    <input type="hidden" value="<?php echo $row['id']?>" />
               		<input type="text" value="<?php echo $row['catname']?>" name="txtcat" id="txtcat" size="39" readonly="readonly"/>
                </div>
                <div>
                	<label for="Category">Song Album</label> 
                    
               		<input type="text" size="39" value="<?php echo $row['albumname']?>" readonly="readonly" />
                </div>
                	
                	<input type="hidden" name="id" value="<?php echo $row['id']?>"/>
           
                <div>
                	<label for="Singer">Album Singer</label>
                	<input type="text" name="txtsinger" id="txtsinger" value="<?php echo $row['albumsinger']?>"  readonly="readonly" size="39"/>
                </div>
                <div>
                	<label for="Singer">Album Writer</label>
                	<input type="text" name="txtwriter" id="txtwriter" value="<?php echo $row['albumwriter']?>"  readonly="readonly" size="39"/>
                </div>
                <div>
                	<label for="Description">Description</label>
                    <textarea rows="8" cols="50" placeholder="MP3 Description" name="txtdesc" id="txtdesc"></textarea>
                </div>
                <div>
				<?php 
					}
					$sql = $connect -> query("SELECT id from tblalbum where id = '$id'");
					while($row1 = $sql -> fetch_array(MYSQLI_ASSOC)){	
				?>
                	<input type="hidden" value="<?php echo $row1['id'] ?>"  name="txtalbum" id="txtalbum"/>
                <?php
					}
				?>
				</div>
                <div>
                	<label for="Category">Song File</label>
               		<input type="file" name="txtsong" id="txtsong" onchange="uploadFile()"/><br>
					<label for="Category">Upload Progress</label>
					<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
					<h3 id="status"></h3>
					<p id="loaded_n_total"></p>
                </div>
                <div>
                	<input type="submit" value="Add Song" id="button1"/>
                    <input type="button" value="Back" id="button2" onClick="window.location.href='SubscriberViewAlbums.php'"/>
                </div>
            </form>
    </div>
     <!--End Web Content-->
</div>
<!--End Container-->
<div class="footer_wrapper">
    <div class="footer_menu">
    	<ul>
        	<li>Find the us <a href="Frontend/Contacts.php">OML Office</a> or <a href="Frontend/Contacts.php">contact us</a>  for more information</li>  
        </ul>
        <br /> <br /> <br />
        <span style="color:#999; font-size:14px; margin-top:10px;">&copy; OML, Inc.</span>
    </div>
</div>
</body>
</html><?php } ?>