<?php 
# creates a new session for tracking the user is logged on 
	session_start(); 

# Incorporate the MySQL debug script.
	require ( 'includes/debug.php' );

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );

# header information
	include 'includes/header.php';
?>	
        
            <ul id="navigation">
              <li><a href="#" class="menu1"><span></span></a></li>
              <li><a href="#" class="menu2"><span></span></a></li>
            </ul>
            <ul id="register">
              <li><a href="registerForm.php" class="register"><span></span></a></li>
              <li><a href="loginForm.php" class="login"><span></span></a></li>
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
        
        if(empty($row->username))
            {
				echo "<p>Username <b>$username</b> is wrong or not registered!</p>\n";
			}
		else
		if($row->password != $password)
            {
				echo "<p>The provided password was wrong!</p>\n";
			}
		else
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
            echo "<p>Logon failed.</p>\n";
			echo "<p>Please retry!</p>\n"; 
            } 
                
            if(!isset($_SESSION["username"])) 
                {
                echo "<form action=\"loginForm.php\" >\n";
                echo "<input type=\"submit\" value=\"Retry\">\n";
                echo "</form>\n";		
        # close html document properly before exit
                echo "</div>\n";
				
				include 'includes/footer.php';
				
                exit;  
            } 
        echo "</div>\n";
		
		mysqli_free_result($result);
            
		mysqli_close($dbc);
		
        ?> 
        
<?php include 'includes/footer.php'; ?>