<?php 
# creates a new session for tracking the user is logged on 
	session_start(); 

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
                	# This redirects the user to the Login screen if he tries to press a button and is not logged on
					include ( 'includes/errorNotLoggedOn.php' );
				?>
                <!-- form for changing information in the users table -->
                <p>Please select the user you want to modify:</p>
                <fieldset class="UserMgmt">
                    <form name="delete" action="UserManagementModify.php" method="post">
                        <ul>
                            <li><label for="userid">Select User</label>
                                <select name="userid">
                                    <?php include 'includes/getUserNames.php' ?>
                                </select>
                            </li>
                                
                            <li><label for="password">New Password</label>
                                <input type="text" name="password" id="password" size="30" />
                                <label for="modify"></label>
                            	<button type="modify" name="modify" value ="1" >Update Password</button></li>
        
                            <li><label for="role">Select Role</label>
                                 <!-- this name element defines the variable name -->
                                <select name="role">
                                <!-- Load the roles stored in the table roles to fill selector -->
                                <?php	include 'includes/getUserRoles.php' ?></select>
                                
								<label for="modify"></label>
                                <button type="modify" name="modify" value ="2" >Update Role</button></li>
                            
                            <li><label for="campdb">Assign Campaign</label>
                                 <!-- this name element defines the variable name -->
                                <select name="campdb">
                                <!-- Load all active campaigns out of the campaign_settings table -->
                                <?php	include 'includes/getActiveCampaigns.php' ?></select>
                                
                                <label for="modify"></label>
                                <button type="modify" name="modify" value ="3" >Assign to Campaign</button></li>
                                
							<li><label for="remCampdb">Remove User From Campaign</label>
                                 <!-- this name element defines the variable name -->
                                <select name="remCampdb">
                                <!-- Load all active campaigns out of the campaign_settings table -->
                                <?php	include 'includes/getActiveCampaigns.php' ?></select>
                                
                                <label for="modify"></label>
                                <button type="modify" name="modify" value ="4" >Remove from Campaign</button></li> 
                                                                               
                            <li><label for="modify"></label>
                                <button type="modify" name="modify" value ="0" >!! Delete User !!</button></li>
                                                      
                        <ul>
                    </form>
                </fieldset>
                
                <?php
					# get the SESISON variable for the user role
					$role = $_SESSION['userrole'];
					
                    # load the query according to the user role
                    if ($role == "administrator")
                    {
                        echo "Registered Administrators:";
                        $sql = "SELECT * FROM users u  LEFT JOIN campaign_users c ON u.user_id = c.user_id ORDER BY role, username";
                    }
                    else
                    if ($role == "redGroundAdmin" or $role == "redAirAdmin")
                    {
                        echo "Registered Red Admins:";
                        $sql = "SELECT * FROM users WHERE role like \"redAirAdmin\" OR role like \"redGroundAdmin\" ORDER BY role, username";
                    }
                    else
                    if ($role == "blueGroundAdmin" or $role == "blueAirAdmin")
                    {
                        echo "Registered Blue Admins:";
                        $sql = "SELECT * FROM users WHERE role like \"blueAirAdmin\" OR role like \"blueGroundAdmin\" ORDER BY role, username";
                    }
                    else
                    if ($role == "viewer")
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
                        print "<b>Username:</b> ".$row['username'] . " <br>\n";	
                        print "<b>Email Adress:</b> ".$row['email'] . " <br>\n";
                        print "<b>Telephone:</b> ".$row['phone'] . " <br>\n";				
                        print "<b>Role:</b> ".$row['role'] . " <br>\n";
						print "<b>Campaign DB:</b> ".$row['camp_db'] . " <br>\n";
                     }
                     
                     echo '<br>Total results: ' . $result->num_rows . " <br>\n";
        
                     echo "</p>\n";
                    
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