<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OML | Login</title>
<link rel="stylesheet"  type="text/css" href="Frontend/CSS/index.css"/>
<script type="text/javascript" src="Administrator/Javascript/jquery-1.6.2.min.js"></script>
<style>
#loginform{
	padding:0px;
	margin:0px;
	width:310px;
	height:400px;
	margin-left:auto;
	margin-right:auto;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('.error').delay(1500).fadeOut('normal');	
	$('.success').delay(1500).fadeOut('normal');	
});
</script>
</head>

<body>
<div class="header_wrapper">
	<div>
    	<!--for date and signout-->
    </div>
</div>
<!--Start Menu-->
<div class="header_menu">
	<div class="menu">
    	<ul>
        	<li><a href="index.php">HOME</a></li>
            <li><a href="Frontend/Albums.php">ALBUMS</a></li>
			<li><a href="Frontend/Songs.php">VOTE</a></li>
            
    	</ul>
    </div>
</div>
<!--End Menu-->
<div class="header_under"></div>
	<!--Start Container for the web content-->
		<div class="playlist_wrapper">
        	<div class="submenu"></div>
        		<div id="loginform">
                <div id="header_title">User SignUp Form</div>
                
            	<form action="sup.php" method="post" id="form">
                	<table>
                    	<tr>
                        	<td>Name</td>
                            <td><input type="text" name="name" size="39"/></td>
                        </tr>
						<tr>
                        	<td>Username</td>
                            <td><input type="text" name="username" size="39"/></td>
                        </tr>
                        <tr>
                        	<td>Password</td>
                            <td><input type="password" name="password" size="39"/></td>
                        </tr>
                         <tr>
                        	<td>&nbsp;</td>
                            <td><input type="submit" value="SignUp"/>&nbsp;<input type="reset" value="Cancel"/>&nbsp;
							<input type="submit" value="Login" formaction="login.php"/></td>
							
                        </tr>
                    </table>
                </form>
                <?php
				if(isset($_GET['error_log'])){
				?>
                <div class="error">Username already exists!</div>
               	<?php }?>
            </div>
        </div>
	</div><!--End Container-->
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