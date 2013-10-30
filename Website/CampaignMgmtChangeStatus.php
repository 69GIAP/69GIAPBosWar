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
					# include connect2CampaignFunction.php
					include ( 'functions/connect2Campaign.php' );

					# include getCampaignVariables.php
					include ( 'includes/getCampaignVariables.php' );

					# start form
					echo "<form id=\"airfieldForm\" name=\"login\" action=\"CampaignConfigureConfirm.php\" method=\"post\">\n";
				
					echo "	<fieldset id=\"inputs\">\n";
					echo "		<p>The current status of the campaign is: <b>$camp_status</b></p>\n";
					echo "		<select name=\"newCampStatus\" id=\"database\">\n";
					# CHANGE CAMPAIGN STATUS
					include 'includes/getCampaignStatusGlobal.php'; 
					echo "		</select>\n";
					echo "	</fieldset>\n";
					# BUTTON	
					echo "<fieldset id=\"actions\">\n";
					echo "		<button type=\"submit\" name =\"createCampaign\" id=\"loginSubmit\" value =\"1\" >Change Campaign Status</button>\n";	
					echo "	</fieldset>\n";

					echo "</form>\n";          
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
