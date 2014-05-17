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
					
					$newCampStatus = $_POST["newCampStatus"];
						
				if ($_POST["createCampaign"] == 1) {
					$query="UPDATE campaign_settings SET status = $newCampStatus WHERE camp_db like '$loadedCampaign'";
				}
						
				# updates
				if(!$result = $camp_link->query($query)){
					die('There was an error running the query <br>'.$query."<br>" . $camp_link->error());
				}
				else {
					if(!$result = $dbc->query($query)){
					die('There was an error running the query <br>'.$query."<br>" . $dbc->error());
					}
					else {
						// close $camp_link
						$camp_link->close();
						# close $dbc
						$dbc->close;
						
						header ("Location: CampaignMgmtChangeStatus.php?btn=campStp&sde=campState");		
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
	$dbc->close;
	# Include the footer
	include ( 'includes/footer.php' );
?>
