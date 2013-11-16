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
					# get the  object you want to list on this page
					$objectClass = $_GET['objectClass'];
					
					# include connect2CampaignFunction.php
					include ( 'functions/connect2Campaign.php' );
		
					# include getCampaignVariables.php
					include ( 'includes/getCampaignVariables.php' ); 
									
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					echo "<p>We can restrict availability of vehicles to one or other side in the campaign<br>
					Note from Stenka : Vehicles that can not move under their own power (like Artillery) are converted to trucks for transit. The vehicle they are converted to should be stored in the objects table
					and be editable here. Not needed for Beta test.</p>\n";
					
					# start form
					echo "<form id=\"campaignMgmtForm\" name=\"objectSetup\" action=\"CampaignMgmtObjectsConfirm.php\" method=\"post\">\n";
					
					# get the master aircraft model list
					include ('includes/getMasterObjectInformation.php');
					
					# BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" id=\"loginSubmit\" value ='$objectClass' >Apply</button>\n";
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
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
