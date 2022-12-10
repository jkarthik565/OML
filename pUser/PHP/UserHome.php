<?php
session_start();
if(isset($_SESSION['user_id'])==0 || $_SESSION['role']!="publicuser"){
header("location:../../loginpage.php");	
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OML | User Page</title>
<link rel="stylesheet" type="text/css" href="../css/UserStyle.css" />
<script type="text/javascript" src="../Javascript/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Javascript/formvalidation.js"></script>
</head>

<body>

<div class="header_wrapper">
	<div class="login">
          <?php
				$today = date("F j, Y");
				echo '&nbsp;Today is '.$today;
				?>
            <ul>
            	
                <li><a href="logout.php">User Logout</a></li>
            </ul>
   	</div>
</div>
<!--Start Menu-->
<div class="header_menu">
	<div class="menu">
    	<ul>
        	<li><a href="UserHome.php">HOME</a></li>
            <li><a href="UserViewAlbums.php">ALBUMS</a></li>

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
        	<li><a href="ChangetoSub.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Become Subscriber</a></li>
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Hello User <?php echo $_SESSION['name']?></h2>
        
        <div class="banner">
         <image src="../Templates/Home.jpg" style=" border-radius: 15px;
  width: 660px;
  height: 210px;"></image>
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
<?php 	
}
?>