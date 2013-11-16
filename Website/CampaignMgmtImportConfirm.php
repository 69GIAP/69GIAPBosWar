<?php 

// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();

// Include the website header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );


?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
				<?php
					// require connect2CampaignFunction.php
					require ( 'functions/connect2Campaign.php' );

					// include getCampaignVariables.php
					include ( 'includes/getCampaignVariables.php' );

					// declare $camp_link to be a global variable
					global $camp_link;

					// connect to campaign db
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					// get post variables
					$templateImport	= $_POST["templateImport"];
					$file			= $_POST["file"];
					$SaveToDir		= $_POST["SaveToDir"];
//					$returnpage		= $_POST["returnpage"];

					if ($templateImport == 1) {
						//require getMinMaxXZFromMissionFile.php
						require ('functions/getMinMaxXZFromMissionFile.php');

						//require getCountriesFromMissonFile.php
						require ('functions/getCountriesFromMissionFile.php');

						//require importAirfields.php
						require ('functions/importAirfields.php');

						//require importPoints.php
						require ('functions/importPoints.php');

						// require importBridges.php
						require ('functions/importBridges.php');

						if (get_minmaxxz_from_mission_file($SaveToDir,$file)) {
							echo "Min and Max X and Z values of Combat Area updated.<br />\n";
						}

						if (get_countries_from_mission_file($SaveToDir,$file)) {
							echo "Countries and Coalitions updated.<br />\n";
						}

						// import airfields
						import_airfields($SaveToDir,$file);

						// ensure airfield names are unique
						include ('includes/differentiateAirfields.php');
						
						//truncate airfields_models table and 
						// copy active airfields into having 0 models assigned
						include ('includes/copyActiveAirfields.php');

						// Import supply and control points
						import_points($SaveToDir,$file);

						// import bridges
						import_bridges($SaveToDir,$file);

						// Now delete the file
						$filename = $SaveToDir.'/'.$file;
						if (file_exists($filename)) {
							// delete the file
							unlink("$filename");	
							echo "$filename deleted<br />\n";
						} else {
							echo "$filename not found or read-only<br />\n";
						}
?>
						<br />&nbsp;<br />
<a href="CampaignMgmtSupplyControlPoints.php?btn=campMgmt&fi=airfields">Next</a>
<?php
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
	# close $camp_link
	$camp_link->close();
	# close $dbc
	$dbc->close();
	# Include the footer
	include ( 'includes/footer.php' );
?>
