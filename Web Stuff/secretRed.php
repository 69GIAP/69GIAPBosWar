<?php 
# creates a new session for tracking the user is logged on 
session_start(); 
# Incorporate the MySQL debug script.
require ( 'debug.php' );
# Incorporate the MySQL connection script.
require ( '../connect_db.php' );
?>
<?php include 'header.php'; ?>

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
                  <li><a href="register_form.php" class="register"><span></span></a></li>
            
             <?php
                        
                if(!isset($_SESSION["username"])) 
                    {
                    # close html document properly before exit
                    echo "<li><a href=\"login_form.php\" class=\"login\"><span></span></a></li>\n";
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
                <li><a href="#" class="redAirbanner"><span></span></a></li>
                <li><a href="#" class="redGroundbanner"><span></span></a></li>
            </ul>
        </div>
         
        <div id="content">
           <p>Welcome to the BOSWAR project protected area!</p>
        </div>
        
<?php include 'footer.php'; ?>
