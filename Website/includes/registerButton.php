<?php 

# show the login button if the user is not logged on         
       
	if(!isset($_SESSION["userName"])) 
		{
		# show the register button
		echo "		<li><a href=\"UserMgmtRegisterForm.php\" class=\"register\"><span></span></a></li>\n";
		}
	else
		{
		# don't show the register button
		echo "<!--    <li><a href=\"UserMgmtRegisterForm.php\" class=\"register\"><span></span></a></li> --> \n";
		}
?>