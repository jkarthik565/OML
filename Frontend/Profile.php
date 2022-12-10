<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OML | Company Profile</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css" />
</head>

<body>
<div class="header_wrapper">
	<div class="login">
          <?php
				$today = date("F j, Y");
				echo '&nbsp;Today is '.$today;
				?>
                &nbsp;&nbsp;&nbsp;<a href="FeedbackForm.php">Submit Feedback</a>
            <ul>        	
                <li><a href="../loginpage.php">User Login</a></li>
            </ul>
   	</div></div>

<div class="header_menu"><!--Start Menu-->
	<div class="menu">
    	<ul>
        	<li><a href="../index.php">HOME</a></li>
            <li><a href="Albums.php">ALBUMS</a></li>
            <li><a href="Songs.php">VOTE</a></li>
            
    	</ul>
    </div>
</div><!--End Menu-->
<div class="header_under"></div>
<div class="container_wrapper"><!--Start Container for the web content-->
    <div class="sidebar_menu"><!--Sidebar-->
    	<h3 class="header_1">OML</h3>
            <ul>
            	<li><a href="History.php">History</a></li>
                <li><a href="Profile.php">Company Profile</a></li>
                <li><a href="Contacts.php">Contact Us</a></li>
                <li><a href="Careers.php">Careers</a></li>
            </ul>
    </div><!--End sidebar-->
    <div class="col2"><!--Start second column-->
   
     	<div id="header_title">OML Company Profile</div>
        	<div class="information">
            	<div class="content1_info">
					<p>OML is a global music publishing company and contains one of the world's greatest collections of musical compositions, ranging from well-known standards to new songs by emerging artists.</p>
                </div>
        	</div>
    </div><!--End second column-->
</div>
<div class="footer_wrapper">
    <div class="footer_menu">
    	<ul>
        	<li>Find the us <a href="Contacts.php">OML Office</a> or <a href="Contacts.php">contact us</a> for more information</li>    
        </ul>
        <br /> <br /> <br />
        <span style="color:#999; font-size:14px; margin-top:10px;">&copy;OML, Inc.</span>
    </div>
</div>
</body>
</html>