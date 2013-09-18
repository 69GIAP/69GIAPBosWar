<?php
    # reference the username next to the navigation bar              
    if(isset($_SESSION["username"])) 
        {
            $username 	= $_SESSION["username"];
            echo "<div class=\"userLoggedOnInfo\">You are logged on as <b>$username</b>.<br> \n";
			echo "You have the <b>$role</b> role.<br>";
			if (!empty($loadedCampaign))
				{
					echo "You are working on the <b>$loadedCampaign</b> DB.</div>\n";
				}
			else
				{
					echo "</div>\n";
				}
        }
       else
        {
            echo "<div class=\"userLoggedOnInfo\">Commanders should log in.</div>\n";
        }
?>        
