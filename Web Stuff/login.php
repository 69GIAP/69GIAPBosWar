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
            <div id="title"></div>
            <ul id="navigation">
              <li><a href="#" class="menu1"><span></span></a></li>
              <li><a href="#" class="menu2"><span></span></a></li>
            </ul>
            <ul id="register">
              <li><a href="register.html" class="register"><span></span></a></li>
              <li><a href="login.html" class="login"><span></span></a></li>
            </ul>
        </div>
        
        <div id="left"></div>
        
        <?php
		
        # open container
        echo "<div id=\"content\">\n";

        $username = $_POST["username"]; 
        $password = md5($_POST["password"]); 
      
        # create SQL query
        $query = "SELECT username, password FROM users WHERE username LIKE '$username' LIMIT 1"; 
        
        # execute SQL query
        $result = mysqli_query($dbc, $query);
		
		# fetch results
		$row = mysqli_fetch_object($result);
        
        if($row->password == $password) 
            { 

		# selector due to users role the redirection is dynamically set to the right page
			# gather the users role
	        $query = "SELECT role FROM users WHERE username LIKE '$username' LIMIT 1";
        	$result = mysqli_query($dbc, $query);
			$row = mysqli_fetch_object($result);
			$_SESSION["username"] = $username;
			
			if($row->role == "administrator")
			{
				header("Location: secretAdmin.php");
			}
			else
			if($row->role == "redAirAdmin")
			{
				header("Location: secretRed.php");
			}
			else
			if($row->role == "redGroundAdmin")
			{
				header("Location: secretRed.php");
			}
			else
			if($row->role == "blueAirAdmin")
			{
				header("Location: secretBlue.php");
			}
			else
			if($row->role == "blueGroundAdmin")
			{
				header("Location: secretBlue.php");
			}
			else
			if($row->role == "viewer")
			{
				header("Location: secretviewer.php");
			}			
            exit;
            } 
        else 
            { 
            echo "<p>Logon failed. Either user is not registered or there was something wrong with the information provided.</p>\n";
			echo "<p>Please retry!</p>\n"; 
            } 
                
            if(!isset($_SESSION["username"])) 
                {
                echo "<form action=\"login.html\" >\n";
                echo "<input type=\"submit\" value=\"Retry\">\n";
                echo "</form>\n";		
        # close html document properly before exit
                echo "</div>\n";
                echo "<div id=\"bottom\">\n";
                echo    "<div id=\"credits\">\n";
                echo       "<p>Powered by IL2 STURMOVIK - Battle of Stalingrad</p>\n";
                echo       "<p>brought to you by =69.GIAP=</p>\n";
                echo    "</div>\n";
                echo "</div>\n";
                echo "</body>\n";
                echo "</html>\n";
                exit;  
            } 
        echo "</div>";
		
		mysqli_free_result($result);
            
		mysqli_close($dbc);
		
        ?> 
        
<?php include 'footer.php'; ?>
