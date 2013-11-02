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
					if (empty($_POST["userId"])) {
						$_POST["userId"] = $userId;
						$id = $userId;
					}
					else {
						$id = $_POST["userId"];
					}
				# group file folder path
				if (empty($_POST['groupFilePath'])) {
					$_POST['groupFilePath'] = '';
				}
				else {
					$groupFilePath = $_POST['groupFilePath'];
					$numchar = strlen($groupFilePath);
					$lastchar = substr($groupFilePath,$numchar -1, 1);
//					echo "$lastchar<br />\n";
					if ($lastchar == '\\' || $lastchar == '/') {
						$groupFilePath = substr($groupFilePath,0,$numchar -1);
					}
					$groupFilePath = $dbc->real_escape_string($groupFilePath);
				}

				# Coalition NEW
				if (empty($_POST["userCoalitionIdNew"]))
				{
					$_POST["userCoalitionIdNew"] = '0';
				}
				$userCoalitionIdNew = $_POST["userCoalitionIdNew"];
						
				# encrypt password
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
					if(empty($_POST["campdb"])) {
						$_POST["campdb"] = $loadedCampaign;
						$campdb = $_POST["campdb"];
					}
					else {
						$campdb = $_POST["campdb"];
					}

				# get user name
					$sql = "SELECT username FROM users WHERE user_id = $id;";
					
					if(!$result = $dbc->query($sql)){
					die('There was an error running the query ' . $dbc->error());
					}
					# load the name into a variable 
					while($row = $result->fetch_assoc()) 
					 {
						$modifiedUser = $row['username'];
					 }
				# If a users should be deleted
				if (($_POST["modify"] == 0))
					{
						$sql  = "DELETE FROM users WHERE	user_id = $id;";
						$sql .= "DELETE FROM campaign_users WHERE user_id = $id;";
					}
					else
				# if a user wants to have his password reset
				if (($_POST["modify"] == 1))
					{
						$sql = "UPDATE users SET password = '$password' WHERE user_id = $id;";
					}
					else
				# if a user wants to have another role
				if (($_POST["modify"] == 2))
					{
						$sql = "UPDATE users SET role_id = \"$newUserRoleId\" WHERE user_id = $id;";
					}
				# if a user is assigned to a campaign / update coalition
				if (($_POST["modify"] == 3))
					{
						# check if an entry exists
						$sql = "SELECT user_id from campaign_users WHERE user_id = $id and camp_db = '$campdb';";
						
						if(!$result = $dbc->query($sql))
							{die('There was an error running the query [' . $dbc->error . ']');}
							
						if ($result = $dbc->query($sql)) 
						{				
							/* fetch associative array */
							while ($obj = $result->fetch_object()) 
								{
									$exists=($obj->user_id);
								}
							# if an entry exists we update the coalition Id, if not we create a new entry. This avoids duplicate conflicting entries
							if (isset($exists))
								{
									$sql = "UPDATE campaign_users SET CoalID = '$userCoalitionIdNew' WHERE user_id = $id and camp_db = '$campdb';";
								}
							else 
								{
									$sql = "INSERT INTO campaign_users (user_id, camp_db, CoalID) VALUES ($id, '$campdb', '$userCoalitionIdNew');";
								}
						}
				
					}
				# remove a user from a campaign
				if (($_POST["modify"] == 4))
					{	
						$sql = "DELETE FROM campaign_users WHERE user_id = $id and camp_db = '$campdb';";
					}
				# update coalition
				if (($_POST["modify"] == 5))
					{	
						$sql = "UPDATE campaign_users SET CoalID = $userCoalitionIdNew WHERE user_id = $id and camp_db = '$campdb';";
					}
				# store group file path, each single user has to do this on his own - only commanders and campaign administrators can see the form field
				if (($_POST["modify"] == 6))
					{	
						$sql = "SELECT id from campaign_users WHERE user_id = $id and camp_db = '$loadedCampaign';";
						$result = $dbc->query($sql);
						if ($result->num_rows!=0)
							{
								$sql = "UPDATE campaign_users SET groupFile_path = '$groupFilePath' WHERE user_id = $id and camp_db = '$loadedCampaign';";
								$error = 0;
							}
						else
							{
								echo "Error!\n";
								$error = 1;
							}
					}																		
				
				# Feedback success or failure
				if (!$dbc->multi_query($sql))
					{
						die("<br>There was an error running the query: $sql. <br>" . $dbc->error());
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
						$query="SELECT Coalitionname from rof_coalitions where CoalID = $userCoalitionIdNew";
						if(!$result = $dbc->query($query)) {
							die('There was an error receiving the connnection information [' . $dbc->error . ']');
						}
			
						if ($result = $dbc->query($query)) {
							/* fetch associative array */
							while ($row = $result->fetch_object()) {
								$userCoalitionNew =($row->Coalitionname);
							}
						}
						echo "<br>The user <b>$modifiedUser</b> has been assigned to the <b>$userCoalitionNew</b> coalition in the <b>$campdb</b> campaign successfully!\n";
					}
				if (($_POST["modify"] == 4))
					{
						echo "<br>The user <b>$modifiedUser</b> has been removed from the <b>$campdb</b> campaign successfully!\n";
					}
				if (($_POST["modify"] == 6))
					{	
						if($error == 1) {
							echo "<br>The user is not assigned to the selected campaign! Please first assign the user and then retry storing the Group File path.\n";
						}
						else {
							echo "<br>Your Group file path has been changed successfully!\n";
						}
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
	# close $dbc
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
