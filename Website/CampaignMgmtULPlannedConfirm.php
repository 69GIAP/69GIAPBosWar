#Stenka 23/4/14 Creation<?php 
<?php 

// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
		
// Include the webside header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );


?>
	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
			<?php
			echo "<h2>Creating a mission</h2>\n";
			
			echo "<p>We have passed <b>.Group</b> files to the opposing mission planners and received back a <b>.Mission</b> file from one side containing the destination waypoints for columns and any changes 
to Z X positions of static groups allowed by the rules.</p>\n";
			echo "<p>We now need to upload the file to the server and update the database.</p>\n";
			
			// require connect2CampaignFunction.php
			require ( 'functions/connect2Campaign.php' );
			// include getCampaignVariables.php
			include ( 'includes/getCampaignVariables.php' );
			// use this information to connect to campaign 
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
					echo "<h3>Upload \"$campaign\" planner file(s)</h3>";
					
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
					$SaveToDir = "uploads/";
					$FullPath ="$SaveToDir"."$abbrv-planned.Mission";
//					echo "\$FullPath: $FullPath<br />\n";
					if ($fi == 'blank') { // skip if not
						if (file_exists("$FullPath")) {
							echo "<p>You have already uploaded $FullPath, so you should </p>\n"; 
							
							echo "<a href=\"CampaignMgmtImport2.php?btn=campStp&sde=MgmtUlFrmMsnPlnrs\">SKIP Upload.</a>\n";
							echo "<p>(Because this file must be imported, and deleted, before you can upload another copy.)</p>\n";
							echo "<p>If, for any reason, the file can not be imported, delete $FullPath and try again.</p>\n";
							
						} else {
							echo "<p>We will now upload our planned <b>.Mission</b> file from your PC to the campaign server.</p>\n";
							
							echo "<p>Note that this will create a directory, \"uploads\" on the web server host if that directory does not already exist.</p>\n";

							echo "<p>Start by navigating to your <b>$abbrv-groups</b> directory.</p>\n";
							
							echo "<p>Choose the <b>.Mission</b> file that has returned from planning waypoints for columns or positions of static groups for the next mission.</p>\n";
							
							echo "<p>Then click \"Upload File\".</p>\n";
							
							$returnpage = 'CampaignMgmtImport3.php';
#							$returnpage = 'CampaignMgmtULTemplateConfirm.php?btn=campStp&sde=campSet';
							# go
							pickFile($returnpage);
						}
					}

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
