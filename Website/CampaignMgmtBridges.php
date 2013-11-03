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
		
					# include connect2CampaignFunction.php
					include ( 'includes/getCampaignVariables.php' ); 
									
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
                
                echo "<p>We need a screen to edit a bridge status to declare it as damaged or repaired, can be hit with sql for the moment not needed for Beta</p>\n";
				
				# start form
				echo "<form id=\"campaignMgmtForm\" name=\"objectSetup\" action=\"CampaignMgmtBridgesConfirm.php\" method=\"post\">\n";
				
				# get the master aircraft model list
                include ('includes/getBridgeStatus.php');
				
				# BUTTON
				echo "<fieldset id=\"actions\">\n";	
				echo "		<button type=\"submit\" id=\"loginSubmit\" value ='' >Update Bridge Status</button>\n";
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
	# Include the footer
	include ( 'includes/footer.php' );
?>
