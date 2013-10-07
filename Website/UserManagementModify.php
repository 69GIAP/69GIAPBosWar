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

				# User management code
				
				# bind post variable into variables
				#  User id
					$id = $_POST["userId"];			
				# encrypt pasword
					$password = md5($_POST["password"]);
				# User role
					if (empty($_POST['newUserRole']))
						{
							$sql="SELECT role_id from users where user_id = $id";
							$result = $dbc->query($sql);
							while($row = $result->fetch_assoc()) 
							 {
								$newUserRoleId = $row['role_id'];
							 }
							 # get corresponding role
							$sql = "SELECT role FROM users_roles WHERE role_id = '$newUserRoleId'";
							$result = $dbc->query($sql);
							while($row = $result->fetch_assoc()) 
							 {
								$newUserRole = $row['role'];
							 }
						}
					else
						{
							$newUserRole = $_POST["newUserRole"];
							# get corresponding roleID
							$sql = "SELECT role_id FROM users_roles WHERE role = '$newUserRole'";
							$result = $dbc->query($sql);
							while($row = $result->fetch_assoc()) 
							 {
								$newUserRoleId = $row['role_id'];
							 }
						}
						
				# campaign database
					$campdb = $_POST["campdb"];

				# get user name
					$sql = "SELECT username FROM users WHERE user_id = $id";
					
					if(!$result = $dbc->query($sql)){
					die('There was an error running the query ' . mysqli_error($dbc));
					}
					# load the name into a variable 
					while($row = $result->fetch_assoc()) 
					 {
						$modifiedUser = $row['username'];
					 }
				# If a users should be deleted
				if (($_POST["modify"] == 0))
					{
						$sql = "DELETE FROM users WHERE	user_id = '$id'; DELETE FROM campaign_users where user_id = '$id'";
					}
					else
				# if a user wants to have his password reset
				if (($_POST["modify"] == 1))
					{
						$sql = "UPDATE users SET password = '$password' WHERE user_id = '$id'";
					}
					else
				# if a user wants to have another role
				if (($_POST["modify"] == 2))
					{
						$sql = "UPDATE users SET role_id = \"$newUserRoleId\" WHERE user_id = '$id'";
					}
				# if a user is assigned to a campaign
				if (($_POST["modify"] == 3))
					{	
						$sql = "INSERT INTO campaign_users (user_id, camp_db, CoalID) VALUES ('$id', '$campdb', 0)";
					}
				# remove a user from a campaign
				if (($_POST["modify"] == 4))
					{	
						$sql = "DELETE FROM campaign_users WHERE user_id = '$id' and camp_db = '$campdb'";
					}
				# update coalition
				if (($_POST["modify"] == 5))
					{	
						$userCoalitionIdNew = $_POST["userCoalitionIdNew"];
						$sql = "UPDATE campaign_users SET CoalID = $userCoalitionIdNew WHERE user_id = '$id'";
					}													
				
				# Feedback success or failure
				if (!mysqli_multi_query($dbc,$sql))
					{
						die('<br>There was an error running the query: ' . mysqli_error($dbc));
					}
				  
				if (($_POST["modify"] == 0)) 
					{
						echo "<br>Record <b>$id</b> owned by user <b>$modifiedUser</b> deleted successfully!\n";
					}
				if (($_POST["modify"] == 1))
					{
						echo "<br>Password for user record <b>$id</b> owned by user <b>$modifiedUser</b> updated successfully!\n";
					}
				if (($_POST["modify"] == 2))
					{
						echo "<br>The role for user <b>$modifiedUser</b> has been updated successfully to <b>$newUserRole</b>!<br>\n";
						# add an update to the SESSION['userRole'] to apply the adapted rights in case the user changes his own role e.g. from administrator to commander
						if ($id == $userId)
							{$_SESSION['userRole'] = $newUserRole;}
					}
				if (($_POST["modify"] == 3))
					{
						echo "<br>The user <b>$modifiedUser</b> has been assigned to the <b>$campdb</b> campaign successfully!\n";
					}
				if (($_POST["modify"] == 4))
					{
						echo "<br>The user <b>$modifiedUser</b> has been removed from the <b>$campdb</b> campaign successfully!\n";
					}	
				if (($_POST["modify"] == 5))
					{	
						$query="SELECT Coalitionname from rof_coalitions where CoalID = $userCoalitionIdNew";
						if(!$result = $dbc->query($query)) {
							die('There was an error receiving the connnection information [' . $dbc->error . ']');
						}
			
						if ($result = mysqli_query($dbc, $query)) {
							/* fetch associative array */
							while ($row = mysqli_fetch_object($result)) {
								$userCoalitionNew =($row->Coalitionname);
							}
						}
						echo "<br>The user <b>$modifiedUser</b> has been assigned to the <b>$userCoalitionNew</b> coalition successfully!\n";
					}										
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