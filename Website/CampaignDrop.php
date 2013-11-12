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
					# empty campaign specific variables
    				unset($loadedCampaign);
					unset($_SESSION['camp_db']);
					
					# Feedback to the user wich campaign he is connected to right now
					if (!empty($loadedCampaign))
						{
							echo "<p>You are connected to the <b>$loadedCampaign</b> database</p>\n";	
						}
					else
						{
							echo "<h3>Please select the campaign to be dropped - THIS CAN NOT BE UNDONE SO PLEASE BE CAREFUL!</h3>\n";		
						}
						
                    # show campaigns due to User role
						if ($userRole == "administrator" or $userRole == "commander")
                            {
								if (!empty($GET_['success']))
								{echo "The database was dropped!";}
								
                                # get the full campaign list							
                                include ( 'includes/getCampaignsObsolete.php' );
                            }
                        if ($userRole == "viewer")
                            {
                                echo "<p>As <b>$userRole</b> you don't have the necessary rights to connect to a database.<br>\n";
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
	$dbc->close();
	# Include the footer
	include ( 'includes/footer.php' );
?>
