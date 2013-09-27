<?php 

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
				
				# bind POST variables to SESSION
				$_SESSION["userName"]	= $_POST["username"]; 
				$userName				= $_SESSION["userName"];				
				
				# encrypt transmitted password
				$password 	= 	md5($_POST["password"]); 
			  
				# create SQL query
				$query = "SELECT u.user_id, u.username, u.password, u.role_id, r.role FROM users u, users_roles r WHERE u.username LIKE '$userName' AND u.role_id = r.role_id"; 
				
				# execute SQL query
				$result = mysqli_query($dbc, $query);
				$row 	= mysqli_fetch_object($result);
				
				# perform some sanity checks on the data
				if(empty($row->username))
					{
						echo "<p>Username <b>$userName</b> is wrong or not registered!</p>\n";
						unset ($_SESSION['userName']);
					}
				else if($row->password != $password)
					{
						echo "<p>The provided password was wrong!</p>\n";
						unset ($_SESSION['userName']);
					}
				else if($row->password == $password)
				   {
				
					# bind user_id to SESSION
					$_SESSION['userId'] = ($row->user_id);
					$userId = $_SESSION['userId'];
					
					# bind role_id to SESSION
					$_SESSION['userRoleId'] = ($row->role_id);
					$userRoleId = $_SESSION['userRoleId'];
					
					#  bind role name to SESSION
					$_SESSION['userRole'] = ($row->role);
					$userRole = $_SESSION['userRole'];
					
					# bind user name to SESSION
					$_SESSION['userName'] = ($row->username);
					$userName = $_SESSION['userName'];
								 					
					# if userRole variable is asigned forward to next section
					if(!empty($userRole))
						{
							header("Location: LoggedOn.php?btn=home");
						}
					exit;
					} 
				else 
					{ 
					echo "<p>Logon failed.</p>\n";
					echo "<p>Please retry!</p>\n"; 
					} 
						
				if(!isset($_SESSION["userName"])) 
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