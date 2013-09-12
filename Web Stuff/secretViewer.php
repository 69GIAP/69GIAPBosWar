<?php 
# creates a new session for tracking the user is logged on 
session_start(); 
# Incorporate the MySQL debug script.
require ( 'debug.php' );
# Incorporate the MySQL connection script.
require ( '../connect_db.php' );
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOSWAR ::SECRET-Viewer::</title>
<!--  Link external CSS Master file containing all other CSS files -->
<link href="css/JavaCSS/BOSWAR_AllStyles.css" rel="stylesheet" type="text/css" />
<!-- Include jQuery Library -->
<script src="js/JavaCSS/jquery-1.2.2.pack.js" type="text/javascript"></script>

<!-- Let's do the animation -->
<script type="text/javascript" src="js/JavaCSS/animation.js"></script>

</head>

    <body>
        <div id="top">
           	<?php 
			# reference the username next to the navigation bar              
            if(isset($_SESSION["username"])) 
                {
                	$username = $_SESSION["username"];
                	echo "<div class=\"user\">You are logged on as <b>$username</b>.</div>\n";
                }
				else
				{
					echo "<div class=\"user\">You are not logged on!</div>\n";
				}
            ?>
            <div id="title"></div>
			
            <div id="navigationContainer">
            
                <ul id="navigation">
                  <li><a href="#" class="menu1"><span></span></a></li>
                  <li><a href="#" class="menu2"><span></span></a></li>
                </ul>
                <ul id="register">
                  <li><a href="register.html" class="register"><span></span></a></li>
            
             <?php
                        
                if(!isset($_SESSION["username"])) 
                    {
                    # close html document properly before exit
                    echo "<li><a href=\"login.html\" class=\"login\"><span></span></a></li>\n";
                    echo "</ul>\n";
                    echo "</div>\n";
                    echo "</div>\n";					
                    
                    echo"<div id=\"left\"></div>\n";
                    # open container 
                    echo "<div id=\"content\">\n";			
                    echo "<p>To view the content of this area please register and log in first.</p>\n";
            
                    echo "</div>\n";
                    echo "<div id=\"bottom\">\n";
                    echo    "<div id=\"credits\">\n";
                    echo       "<p>Powered by IL2 STURMOVIK - Battle of Stalingrad</p>\n";
                    echo       "<p>brought to you by =69.GIAP=</p>\n";
                    echo    "</div>\n";
                    echo "</div>\n";
                    echo "</body>\n";
                    echo "</html>";
                    exit; 
                }         
            ?> 
                <li><a href="logout.php" class="logout"><span></span></a></li>   
                </ul>
            </div>
		</div>
            
        <div id="left">
        <p>Purpose:</p>          
            <ul id="sidebar">
                <li><a href="#" class="viewerbanner"><span></span></a></li>
            </ul>
        </div>
         
        <div id="content">
           <p>Welcome to the BOSWAR project protected area!</p>
        </div>
        
        <div id="bottom">
            <div id="credits">
                <p>Powered by IL2 STURMOVIK - Battle of Stalingrad</p>
                <p>brought to you by =69.GIAP=</p>
            </div>
        </div>
        
    </body>
    
</html>
