<?php
    # reference the username next to the navigation bar              
    if(isset($_SESSION["username"])) 
        {
            $username = $_SESSION["username"];
            echo "<div class=\"userLoggedOnInfo\">You are logged on as <b>$username</b>.</div>\n";
        }
        else
        {
            echo "<div class=\"userLoggedOnInfo\">You are not logged on!</div>\n";
        }
?>        