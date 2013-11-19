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
					# require connect2CampaignFunction.php
					require ( 'functions/connect2Campaign.php' );

					# include getCampaignVariables.php
					include ( 'includes/getCampaignVariables.php' );
	
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					# initialize variable $returnpage if non existing
					if (empty($returnpage)) {
						$returnpage = '';
					}
					
					if (!isset($_GET['fi'])) {
						$fi = 'blank';
						}
					else {
						$fi = $_GET['fi'];
					}
//					echo "\$fi: $fi<br />\n";

					echo "<h2>Upload $campaign Template File</h2>";

					$query = "SELECT * from campaign_settings;";
					if(!$result = $camp_link->query($query)) {
						die('CampaignMgmtSetup.php query error [' . $camp_link->error . ']');
					}
		
					if ($result = $camp_link->query($query)) {
						/* fetch associative array */
						while ($obj = $result->fetch_object()) {
								$map=($obj->map);
						}
					}
					$result->free();

					# require pickFile.php
					require ('functions/pickFile.php');

					// configuration
					$SaveToDir = "C:/BOSWAR/";
					$FullPath ="$SaveToDir"."$abbrv-template.Mission";
//					echo "\$FullPath: $FullPath<br />\n";

					if ($fi == 'blank') { // skip if not
						if (file_exists("$FullPath")) {
							echo "<p>You have already uploaded $FullPath, so you should </p>\n"; 
							echo "<a href=\"CampaignMgmtImport.php?btn=campMgmt\">SKIP Upload.</a><p>(Because this file must be imported, and deleted, before you can upload another copy.)</p><p>If, for any reason, the file can not be imported, delete $FullPath and try again.</p>\n";
							
						} else {
							echo "<p>We will now upload our template mission file to the BOSWAR campaign manager.</p>\n";
							echo "<p>Note that this will create a directory, \"C:\\BOSWAR\" on the BOSWAR web server host if that directory does not already exist.</p>\n";

							echo "<p>Start by navigating to your <b>$abbrv-groups</b> directory.</p>\n";
							echo "<p>Choose <b>$abbrv-template.Mission.</b><br />
							Then click \"Upload File\".</p>\n";
							$returnpage = 'CampaignMgmtUpload.php?btn=campMgmt';

							# go
							pickFile($returnpage);
		
							// close $camp_link
							$camp_link->close();
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
    // close $dbc
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
