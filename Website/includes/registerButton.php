<?php 

# show the login button if the user is not logged on         
       
	if(!isset($_SESSION["username"])) 
		{
		# show the register button
		echo "		<li><a href=\"registerForm.php\" class=\"register\"><span></span></a></li>\n";
		}
	else
		{
		# don't show the register button
		echo "<!--    <li><a href=\"registerForm.php\" class=\"register\"><span></span></a></li> --> \n";
		}
?>