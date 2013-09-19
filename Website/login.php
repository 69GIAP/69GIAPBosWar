<?php 

# Incorporate the MySQL debug script.
	require ( 'includes/debug.php' );

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
	
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
                <?php
				
				# bind POST variables into variables for easier coding
				$username 	= 	$_POST["username"]; 
				$password 	= 	md5($_POST["password"]); 
			  
				# create SQL query
				$query = "SELECT username, password FROM users WHERE username LIKE '$username' LIMIT 1"; 
				
				# execute SQL query
				$result = mysqli_query($dbc, $query);
				
				# fetch results
				$row 	= mysqli_fetch_object($result);
				
				# perform some sanity checks on the data
				if(empty($row->username))
					{
						echo "<p>Username <b>$username</b> is wrong or not registered!</p>\n";
					}
				else if($row->password != $password)
					{
						echo "<p>The provided password was wrong!</p>\n";
					}
				else if($row->password == $password)
				   {
		
				# due to users role the redirection is dynamically set to the right page
					# gather the users role
					$query 	= "SELECT role FROM users WHERE username LIKE '$username' LIMIT 1";
					$result	= mysqli_query($dbc, $query);
					$row 	= mysqli_fetch_object($result);
					
					# bind role to SESSION
					$_SESSION['userRole'] = ($row->role);
					$userRole = $_SESSION['userRole'];
					
					# bind session variable to variable
					$_SESSION["username"] = $username;
					
					if($userRole == "administrator")
					{
						header("Location: LoggedOn_Admin.php");
					}
					else if($userRole == "redAirAdmin")
					{
						header("Location: LoggedOn_RedAirAdmin.php");
					}
					else if($roel == "redGroundAdmin")
					{
						header("Location: LoggedOn_redGroundAdmin.php");
					}
					else if($userRole == "blueAirAdmin")
					{
						header("Location: LoggedOn_blueAirAdmin.php");
					}
					else if($userRole == "blueGroundAdmin")
					{
						header("Location: LoggedOn_blueGroundAdmin.php");
					}
					else if($userRole == "viewer")
					{
						header("Location: LoggedOn_Viewer.php");
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
					} 
				echo "\n";
				
				mysqli_free_result($result);
					
				mysqli_close($dbc);
				
				?> 
        
            </div>
    
        </div>

<?php
	# Include the general sidebar
	include ( 'includes/sidebar.php' );
?>	

		<div id="clearing"></div>
	</div>

<?php
	# Include the footer
	include ( 'includes/footer.php' );
?>