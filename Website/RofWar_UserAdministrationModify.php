<?php 
# creates a new session for tracking the user is logged on 
	session_start(); 

# Incorporate the MySQL debug script.
	require ( 'includes/debug.php' );

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
	
# Include the webside header
	include ( 'includes/RofWar_header.php' );
	
# Include the navigation on top
	include ( 'includes/RofWar_navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
                
                <?php

				# User management code
				
				# bind post variable into variables
				#  User id
					$id = $_POST["id"];
				# encrypt pasword
					$password = md5($_POST["password"]);
				# User role
					$role = $_POST["role"];		
				# get user name
					$sql = "SELECT username FROM users WHERE id = $id";
					
					if(!$result = $dbc->query($sql)){
					die('There was an error running the query ' . mysqli_error($dbc));
					}
					# load the name into a variable 
					while($row = $result->fetch_assoc()) 
					 {
					$username = $row['username'];
					 }
			
				# If a users should be deleted
				if (($_POST["modify"] == 0))
					{
						$sql = "DELETE FROM users WHERE	id = '$id'";
					}
					else
				# if a user wants to have his password reset
				if (($_POST["modify"] == 1))
					{
						$sql = "UPDATE users set password = '$password' WHERE id = '$id'";
					}
					else
				# if a user wants to have another role
				if (($_POST["modify"] == 2))
					{
						$sql = "UPDATE users set role = \"$role\" WHERE id = '$id'";
					}
				
				# Feedback success or failure
				if (!mysqli_query($dbc,$sql))
					{
						die('<br>There was an error running the query: ' . mysqli_error($dbc));
					}
				  
				if (($_POST["modify"] == 0)) 
					{
						echo "<br>Record <b>$id</b> owned by user <b>$username</b> deleted successfully!\n";
					}
				if (($_POST["modify"] == 1))
					{
						echo "<br>Password for user record <b>$id</b> owned by user <b>$username</b> updated successfully!\n";
					}
				if (($_POST["modify"] == 2))
					{
						echo "<br>Role for user <b>$id</b> owned by user <b>$username</b> updated successfully to <b>$role</b>!\n";
					}
			
				?>
				
            </div>
    
        </div>

<?php
	# Include the general sidebar
	include ( 'includes/RofWar_sidebar.php' );
?>	

		<div id="clearing"></div>
	</div>

<?php
	# Include the footer
	include ( 'includes/RofWar_footer.php' );
?>