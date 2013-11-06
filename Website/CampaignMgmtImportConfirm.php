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
						$tmpfile = "$SaveToDir/$file";
						if (file_exists($tmpfile)) {

							echo "$tmpfile exists<br />\n";
							if (is_writable($tmpfile)) {
								echo "$tmpfile is writable<br />\n";
							} else {
								echo "$tmpfile is NOT writable<br />\n";
							}
							if (is_uploaded_file($tmpfile)) {
								echo "$tmpfile is an uploaded file<br />\n";
							} else {
								echo "$tmpfile is NOT an uploaded file<br />\n";
							}

							// delete the file
							unlink("$tmpfile");	
							echo "$tmpfile deleted<br />\n";
						} else {
							echo "$tmpfile not found or read-only<br />\n";
						}

?>
						<br />&nbsp;<br />
<a href="CampaignMgmtImport.php?btn=1">Go back</a>
<?php

//						header ("Location: $returnpage?btn=1");

					} elseif ($templateImport == 2) {
						//include template_to_airfield.php
						include ('includes/template_to_airfield.php');
						
						//truncate airfields_models table and copy active airfields into having 0 models assigned
						include ('includes/copyActiveAirfields.php');

						// Now delete the file
						// test backslashes for DEL command
						$SaveToDir = "C:\\BOSWAR";
						$tmpfile = "$SaveToDir\\$file";
						echo "$tmpfile<br />\n";
						if (file_exists($tmpfile)) {
							echo "$tmpfile exists<br />\n";
							if (is_writable($tmpfile)) {
								echo "$tmpfile is writable<br />\n";
							} else {
								echo "$tmpfile is NOT writable<br />\n";
							}
							if (is_uploaded_file($tmpfile)) {
								echo "$tmpfile is an uploaded file<br />\n";
							} else {
								echo "$tmpfile is NOT an uploaded file<br />\n";
							}

							// delete the file
							// this isn't working for .Group files 
							if (unlink("$tmpfile")) {	
								echo "$tmpfile deleted<br />\n";
							} else {
								$deleteError = "unlink permission denied";
							}

							$lines = array();
							exec ("DEL /F/Q \"$tmpfile\"",$lines,$deleteError);
							// gave error 3: path not found?
							// this may require DOS style backslashes... try that.

							if ($deleteError) {
								echo "file delete error: $deleteError<br />\n";
							} else {
								echo "DEL command gave no error<br />\n";
								if (file_exists($tmpfile)) {
									echo "BUT $tmpfile still exists!<br />\n";
								}
							}
						} else {
							echo "$tmpfile not found or read-only<br />\n";
						}
?>

						<br />&nbsp;<br />
<a href="$returnpage" onClick="history.back();return false;">Go back</a>

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
