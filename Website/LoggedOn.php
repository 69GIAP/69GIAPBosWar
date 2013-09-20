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
    
                    include ('includes/debuggingSessionVariables.php');	
					
					# Feedback to the user wich campaign he is connected to right now
					if (!empty($loadedCampaign))
						{
							echo "<p>You are connected to the <b>$loadedCampaign</b> database</p>\n";	
						}
					else
						{
							echo "<p>Please connect to a database</p>\n";		
						}
						
                    # show campaigns due to User role
                        if ($userRole == "administrator")
                            {
                                echo "<p>Logged on as <b>$userRole</b>.</p></>\n";
                                # get the full campaign list							
                                include ( 'includes/getCampaignsCommander.php' );
                            }
                        if ($userRole == "commander")
                            {
                                echo "<p>Logged on as <b>$userRole</b>.</p></>\n";
                                # get the filtered campaign list due to user camapaign_users table							
                                include ( 'includes/getCampaignsCommander.php' );
                            }
                        if ($userRole == "viewer")
                            {
                                echo "<p>Logged on as <b>$userRole</b>.</p></>\n";							
                                echo "<p>You don't have the necessary rights to view this content.</p>\n";
                            }
                        else
							{
								# This redirects the user to the Login screen if he tries to press a button and is not logged on
								include ( 'includes/errorNotLoggedOn.php' );
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
