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
<script type="text/javascript" src="../Javascript/formvalidatealbum.js"></script>
</head>

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
    	<h4 class="header">OML Menu</h4>
    	<ul>
        	<li><a href="SubscriberAlbum.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add New Album</a></li>
            <li><a href="SubscriberViewAlbums.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;View Records</a></li> 
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Album Record Section</h2>	
        	<div class="form">
            	<table width="650" border="0" cellpadding="1" cellspacing="0" bgcolor="">
                	<tr>
                    	<th class="table">ID</th><th class="table">Album</th><th class="table">Singer</th><th class="table">Writer</th><th class="table">Image</th><th class="table">Action</th>
                    </tr>
                    <?php
						require_once('connect.php');
						error_reporting(E_ERROR);
						$line = 0;
						$page = 'SubscriberViewAlbums.php';
						$dataperpage = $connect -> query("SELECT * FROM tblalbum");
						$numpage = mysqli_num_rows($dataperpage);
						$start = $_GET['start'];
						$eu = $start - 0;
						$limit = 12;
						$thisp= $eu + $limit;
						$back = $eu - $limit;
						$next = $eu + $limit;
						if(strlen($start) > 0 && !is_numeric($start)){
							echo 'Data Error';	
							exit();
						}
						$sql = $connect -> query("SELECT tblalbum.id,tblcategory.catname,tblalbum.albumname,tblalbum.albumsinger,tblalbum.albumwriter,tblalbum.albumimage FROM tblalbum,tblcategory WHERE tblalbum.albumcat = tblcategory.id ORDER BY id ASC LIMIT $eu, $limit");
						while($rowCat = $sql -> fetch_array(MYSQLI_ASSOC)){
						if($line == 1){
							$bgcolor='#E0EEF8';
							$line=0;
						}else{
							$bgcolor = '#FFFFFF';
							$line=1;
						}
					?>
                    <tr align="center" bgcolor="<?php echo $bgcolor?>">
                    	<td align="center" width="20"><?php echo $rowCat['id'] ?></td>                    
                        <td align="center"><?php echo $rowCat['albumname'] ?></td>
                        <td align="center"><?php echo $rowCat['albumsinger'] ?></td>
                        <td align="center"><?php echo $rowCat['albumwriter'] ?></td>
                        <td align="center" width="60"><?php echo "<img src=../../Administrator/PHP/upload_images/album/$rowCat[albumimage] width=50 height=40"?></td>
                        <td align="center" width="220">
                        
                        <a href="SubscriberViewSongs1.php?id=<?php echo $rowCat['id']?>" class="link">View Songs</a>&nbsp;|&nbsp;
                        <a href="SubscriberSong.php?id=<?php echo $rowCat['id']?>" class="link">Add Song</a>&nbsp;|&nbsp;
                        <a href="SubscriberEditAlbum.php?id=<?php echo $rowCat['id']?>" class="link">Edit</a>&nbsp;|&nbsp;
                        <a href="SubscriberDeleteAlbum.php?id=<?php echo $rowCat['id']?>" class="link" onclick="return confirm('Do you want to delete this?');">Delete</a></td>
                    </tr>
                    
                    <?php
						}

						if($numpage>$limit){
							echo "<table align=center><tr><td align=left width=60>";
							if($back>=0){
								echo "<a href=$page?start=$back>PREV</a>";	
							}
							echo "</td><td align=center>";
								$l = 1;
								for($i = 0; $i < $numpage;$i = $i + $limit){
									if($i<>$eu){
										echo "<a href=$page?start=$i><font color=red>$l</font></a>";	
									}else{
										echo "<font color=red>$l</font>";	
									}
									$l = $l + 1;
								}
							echo "</td><td align=right>";
							if($thisp<$numpage){
								echo "<a href=$page?start=$next>NEXT</a>";	
							}
							echo "</td></tr></table>";
						}
					?>
                </table>
            </div>
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
</html>

<?php  }?>
