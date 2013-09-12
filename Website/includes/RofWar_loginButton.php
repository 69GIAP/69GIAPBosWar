<?php 

# show the login button if the user is not logged on         
       
	if(!isset($_SESSION["username"])) 
		{
		# show the login button
		echo "		<li><a href=\"RofWar_loginForm.php\" class=\"login\"><span></span></a></li>\n";
		}
	else
		{
		# show the logout button
		echo "    <li><a href=\"RofWar_logout.php\" class=\"logout\"><span></span></a></li>\n";
		}
?>