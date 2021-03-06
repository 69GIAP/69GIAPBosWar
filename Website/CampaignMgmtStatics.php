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
					# include connect2CampaignFunction.php
					include ( 'functions/connect2Campaign.php' );

					# include getCampaignVariables.php
					include ( 'includes/getCampaignVariables.php' );
		
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					# useful stuff goes here
					
					# close $camp_link
					$camp_link->close();
                ?>
                <p>A static is a group of dissimilar objects, vehicles, trains etc. which are in a geographic location. This allows us to track their status in the statistics and to activate and deactivate vehicles during a mission via complex triggers, thus reducing performance
				problems in mission.</p>
            
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
