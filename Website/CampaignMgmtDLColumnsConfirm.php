<?php 

// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
		
// Include the webside header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );

// Include Post variable debugging
	include ( 'includes/debugging/debuggingPostVariables.php');

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
			<?php
				// require connect2CampaignFunction.php
				require ( 'functions/connect2Campaign.php' );

				// include getCampaignVariables.php
				include ( 'includes/getCampaignVariables.php' );
		
				// use this information to connect to campaign 
				$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

                // require downloadColumns.php                
				require ('functions/downloadColumns.php');

//				download_columns(1);
				download_columns(2);

				// DONE BUTTON
				echo "<fieldset id=\"actions\">\n";	
				echo "<input type=\"hidden\" name=\"action\" value = \"done\">\n";	
				echo "		<button type=\"submit\" id=\"downloadColumns\" value ='' >Download Done</button>\n";
				echo "	</fieldset>\n";
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
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
