<?php 

// Incorporate the MySQL connection script.
	require ( '../connect_db.php' );

// Include the website header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );

// Include $_POST debugging
	include ( 'includes/debugging/debuggingPostVariables.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
				<?php
					// include connect2CampaignFunction.php
					include ( 'functions/connect2Campaign.php' );

					// include getCampaignVariables.php
					include ( 'includes/getCampaignVariables.php' );

					// declare $camp_link to be a global variable
					global $camp_link;

					// connect to campaign db
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					// get post variables
					$templateImport = $_POST["templateImport"];
					$file = $_POST["file"];
					$SaveToDir = $_POST["SaveToDir"];
					$returnpage = $_POST["returnpage"];

					if ($templateImport == 1) {
						//include getMinMaxXZFromMissionFile.php
						require ('functions/getMinMaxXZFromMissionFile.php');

						//include getCountriesFromMissonFile.php
						require ('functions/getCountriesFromMissionFile.php');

						get_minmaxxz_from_mission_file($SaveToDir,$file);

						get_countries_from_mission_file($SaveToDir,$file);

						if (file_exists($SaveToDir/$file)) {
							// delete the file
							unlink($SaveToDir/$file);	
							echo "$SaveToDir/$file deleted<br />\n";
						} else {
							echo "$SaveToDir/$file not found or read-only<br />\n";
						}

//						header ("Location: $returnpage");

					} elseif ($templateImport == 2) {
						//include template_to_airfield.php
						include ('includes/template_to_airfield.php');
//						header ("Location: $returnpage");
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
