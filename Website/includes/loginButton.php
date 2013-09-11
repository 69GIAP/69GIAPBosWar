<?php                 
	if(!isset($_SESSION["username"])) 
		{
		# close html document properly creating the login button  and then exit
		echo "<li><a href=\"loginForm.php\" class=\"login\"><span></span></a></li>\n";
		echo "</ul>\n";
		echo "</div>\n";
		echo "</div>\n";					
		
		echo"<div id=\"left\"></div>\n";
		# open container 
		echo "<div id=\"content\">\n";			
		echo "<p>To view the content of this area please register and log in first.</p>\n";

		echo "</div>\n";
		
		include 'includes/footer.php';
		
		exit; 
	}         
?> 