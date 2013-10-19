<?php
    # reference the username next to the navigation bar              
    if(isset($_SESSION["userName"])) 
        {
            $userName 	= $_SESSION["userName"];
            echo "<div class=\"userLoggedOnInfo\">";
			echo "<b>User: </b> $userName<br> \n";
			echo "<b>Role: </b>$userRole<br>";
			if (!empty($loadedCampaign))
				{
					echo "<b>Database: </b> $loadedCampaign</div>\n";
				}
			else
				{
					echo "</div>\n";
				}
        }
       else
        {	
            echo "<div class=\"userLoggedOnInfo\">Commanders should log in.<br></div>\n";
        }
?>        
