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
<title>BOSWAR ::SECRET-ADMIN::</title>
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
        <p>User Management:</p>
            <ul id="sidebar">
                <li><a href="adminUsers.php?link=A" class="adminbanner"><span></span></a></li>
                <li><a href="adminUsers.php?link=R" class="sovietbanner"><span></span></a></li> 
                <li><a href="adminUsers.php?link=B" class="centerbanner"><span></span></a></li> 
                <li><a href="adminUsers.php?link=V" class="viewerbanner"><span></span></a></li>                                   
            </ul>
        </div>
         
        <div id="content">
        <!-- form for changing information in the users table -->
        <p>Please insert the ID of the user you want to delete:</p>
        <fieldset>
            <form name="delete" action="ModifyUser.php" method="post">
                <ul>
                    <li> <label for="id">User ID</label>
                        <input type="text" name="id" id="id" size="3" /></li>
                        
                    <li> <label for="password">New Password</label>
                        <input type="text" name="password" id="password" size="30" /></li>  
                                              
                    <li><label for="modify"></label>
                        <button type="modify" name="modify" value ="0" id="modify">Delete</button></li>
                        
                    <li><label for="modify"></label>
                		<button type="modify" name="modify" value ="1" id="modify">Update Password</button></li>                        
                <ul>
            </form>
        </fieldset>
        
		<?php
			# find out which list to load
			$link = $_GET["link"];
			
            # load the query according to the $_GET variable

			if ($link == "A")
			{
				echo "Registered Administrators:";
            	$sql = "SELECT * FROM users WHERE role like \"administrator\" ORDER BY role, username";
			}
			else
			if ($link == "R")
			{
				echo "Registered Red Admins:";
            	$sql = "SELECT * FROM users WHERE role like \"redAirAdmin\" OR role like \"redGroundAdmin\" ORDER BY role, username";
			}
			else
			if ($link == "B")
			{
				echo "Registered Blue Admins:";
            	$sql = "SELECT * FROM users WHERE role like \"blueAirAdmin\" OR role like \"blueGroundAdmin\" ORDER BY role, username";
			}
			else
			if ($link == "V")
			{
				echo "Registered Viewers:";
            	$sql = "SELECT * FROM users WHERE role like \"viewer\" ORDER BY role, username";
			}
            
            if(!$result = $dbc->query($sql)){
                die('<p>There was an error running the query [' . $dbc->error . ']</p>\n');
            }
            
            # Print out the contents of the entry 
            while($row = $result->fetch_assoc()) 
             {
				echo "<p>\n";
                print "<b>User ID:</b> ".$row['id'] . " <br>\n";
                print "<b>Username:</b> ".$row['username'] . " <br>\n";	
                print "<b>Email Adress:</b> ".$row['email'] . " <br>\n";
                print "<b>Telephone:</b> ".$row['phone'] . " <br>\n";				
                print "<b>Role:</b> ".$row['role'] . " <br>\n";
             }
             
             echo '<br>Total results: ' . $result->num_rows . " <br>\n";

			 echo "</p>\n";
            
        	mysqli_free_result($result);
            
			mysqli_close($dbc);	
        ?>
        
        </div>
        
        <div id="bottom">
            <div id="credits">
                <p>Powered by IL2 STURMOVIK - Battle of Stalingrad</p>
                <p>brought to you by =69.GIAP=</p>
            </div>
        </div>
        
    </body>
    
</html>
