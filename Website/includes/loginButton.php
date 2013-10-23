<?php 

# show the login button if the user is not logged on         
       
	if(!isset($_SESSION["userName"])) 
		{
			# show the login button
			echo "		<li><a href=\"UserMgmtLoginForm.php\" class=\"login\"><span></span></a></li>\n";
		}
	else
		{
			# show the logout button
			echo "		<li><a href=\"UserMgmtLogoutCheck.php\" class=\"logout\"><span></span></a></li>\n";
		}
?>