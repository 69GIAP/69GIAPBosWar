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
					include ('includes/debuggingSessionVariables.php');					
                	# This redirects the user to the Login screen if he tries to press a button and is not logged on
					include ( 'includes/errorNotLoggedOn.php' );
					
					# show campaigns due to User role
					if ($userRole == "administrator")
						{
							include ( 'includes/getCampaignsAdmin.php' );
						}
					if ($userRole == "redAirAdmin" or $userRole == "redGroundAdmin")
						{
							include ( 'includes/getCampaignsRed.php' );
						}
					if ($userRole == "blueAirAdmin" or $userRole == "blueGroundAdmin")
						{
							include ( 'includes/getCampaignsBlue.php' );
						}
					if ($userRole == "viewer")
						{
							echo "<p>You don't have the necessary rights to view this content.</p>\n";
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
