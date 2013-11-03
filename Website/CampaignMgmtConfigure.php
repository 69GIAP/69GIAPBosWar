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
	
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					# initialise variables
					echo "<h1>Configure $campaign Campaign Settings</h1>";
					# start form
					echo "<form id=\"campaignMgmtForm\" name=\"campaignSetup\" action=\"CampaignMgmtConfirm.php?btn=campMgmt\" method=\"post\">\n";
					
					echo "<br>By this point you have logged in with administrator rights, chosen a campaign name, created a campaign database and connected to that campaign database.<br>\n";
					echo "<br>Now that you are connected directly to your new campaign database it is time to configure it.<br>\n";
					echo "<br>There are two types of settings we need to configure - those that are not set in the mission editor, and those that are.";
					echo "<br>We start with those that are are not set in the editor.  These are set either here in the campaign database alone, or both here and in the game multiplayer options.<br />\n";
					echo "<br>We have tried to provide sensible defaults, but you may tweak these to fit your campaign and setup.<br />\n";

					# include getandsetCampaignSettings.php
					include ('includes/getandsetCampaignSettings.php');

					echo "</form>\n";

					// close $camp_link
					$camp_link->close();
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
    // close $dbc
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
