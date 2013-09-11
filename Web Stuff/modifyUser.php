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
        <p>User Management:</p>
            <ul id="sidebar">
                <li><a href="adminUsers.php?link=A" class="adminbanner"><span></span></a></li>
                <li><a href="adminUsers.php?link=R" class="sovietbanner"><span></span></a></li> 
                <li><a href="adminUsers.php?link=B" class="centerbanner"><span></span></a></li> 
                <li><a href="adminUsers.php?link=V" class="viewerbanner"><span></span></a></li>                                   
            </ul>
        </div>
         
        <div id="content">
        
		<?php

		# User management code
		
		# If a users should be deleted
		if (($_POST["modify"] == 0))
			{
				$sql = "DELETE FROM users WHERE	'$_POST[id]' = id";
			}
			else
		# if a user wants to have his password reset
		if (($_POST["modify"] == 1))
			{
				# encrypt pasword
				$password = md5($_POST["password"]);
				$sql = "UPDATE users set password = '$password' WHERE '$_POST[id]' = id";
			}
		
		# Feedback success or failure
		if (!mysqli_query($dbc,$sql))
		  {
			die('<br>Error: ' . mysqli_error($dbc));
		  }
		  
		if (($_POST["modify"] == 0)) 
			{
				echo "<br>Record {$_POST['id']} deleted successfully!\n";
			}
		if (($_POST["modify"] == 1))
			{
				echo "<br>Record {$_POST['id']} updated successfully!\n";
			}
		

        	echo '<br>Total rows updated: ' . $dbc->affected_rows . " <br>\n";
		
			mysqli_close($dbc);	
		
		?>
        
        </div>
        
<?php include 'footer.php'; ?>
