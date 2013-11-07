<?php 

// Incorporate the MySQL connection script.
	require ( '../connect_db.php' );

// Include the website header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );


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
					global $page_state;

					// connect to campaign db
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					// get post variables
					$templateImport	= $_POST["templateImport"];
					$file			= $_POST["file"];
					$SaveToDir		= $_POST["SaveToDir"];
					$returnpage		= $_POST["returnpage"];

					if ($templateImport == 1) {
						//include getMinMaxXZFromMissionFile.php
						require ('functions/getMinMaxXZFromMissionFile.php');

						//include getCountriesFromMissonFile.php
						require ('functions/getCountriesFromMissionFile.php');

						get_minmaxxz_from_mission_file($SaveToDir,$file);

						get_countries_from_mission_file($SaveToDir,$file);
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
<a href="CampaignMgmtImport.php?btn=1">Go back</a>
<?php

//						header ("Location: $returnpage?btn=1");

					} elseif ($templateImport == 2) {
						//require importAirfields.php
						require ('functions/importAirfields.php');
						import_airfields($SaveToDir,$file);
						
						//truncate airfields_models table and copy active airfields into having 0 models assigned
						include ('includes/copyActiveAirfields.php');

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
<a href="CampaignMgmtImport.php?btn=1">Go back</a>
<?php
//						header ("Location: $returnpage?btn=2"); 
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
