<?php 

# Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
		
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
				<?php 

					# Feedback to the user wich campaign he is connected to right now
					if (!empty($loadedCampaign))
						{
							echo "<p>You are connected to the <b>$loadedCampaign</b> database</p>\n";	
						}
					else
						{
							echo "<h2>Please connect to a database</h2>\n";		
						}
						
                    # show campaigns due to User role
						if ($userRole == "administrator" or $userRole == "commander")
                            {	
								header ("Location: CampaignSelect.php?btn=home&sde=connect");
                            }
                        if ($userRole == "viewer")
                            {
                                echo "<p>Sorry, but as <b>$userRole</b> you don't have the necessary rights to connect to a database.<br>\n";
								echo "Please contact your administrator.</p>\n";
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
	# close $dbc
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
