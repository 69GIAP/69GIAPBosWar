<?php
    # reference the username next to the navigation bar              
    if(isset($_SESSION["username"])) 
        {
            $username 	= $_SESSION["username"];
			$role 		= $_SESSION["userrole"];
            echo "<div class=\"userLoggedOnInfo\">You are logged on as <b>$username</b>.<br> \n";
			echo "You have the <b>$role</b> role.</div>\n";
        }
       else
        {
            echo "<div class=\"userLoggedOnInfo\">Commanders should log in.</div>\n";
        }
?>        
