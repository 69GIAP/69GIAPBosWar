#Stenka 8/4/14 Creation<?php 
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
			echo "This session is used in the process of creating a Template.
The campaign template mission file(s) should now contain the Z X starting positions and angle of both static groups and columns at the start of the very first mission and we have to update the campaign database with that information.<br><br>
We need to update the campaign database with this information in what is at minimum a two step process of uploading the files from the administrators PC to the campaign server and then launching
the program which will read in .Mission files.<br><br>
An administrator may have planned the starting position for one or both sides or may have received files from the Allied or Central planners by E-mail.<br><br>
";
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
					echo "<h2>Upload $campaign Template File(s)</h2>";
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
					$FullPath ="$SaveToDir"."$abbrv-template.Mission";
//					echo "\$FullPath: $FullPath<br />\n";
					if ($fi == 'blank') { // skip if not
						if (file_exists("$FullPath")) {
							echo "<p>You have already uploaded $FullPath, so you should </p>\n"; 
							echo "<a href=\"CampaignMgmtImport2.php?btn=campStp&sde=MgmtUlClmsStcs\">SKIP Upload.</a><p>(Because this file must be imported, and deleted, before you can upload another copy.)</p><p>If, for any reason, the file can not be imported, delete $FullPath and try again.</p>\n";
							
						} else {
							echo "<p>We will now upload our template .Mission or .Group file(s) from your PC to the campaign server.</p>\n";
							echo "<p>Note that this will create a directory, \"uploads\" on the web server host if that directory does not already exist.</p>\n";

							echo "<p>Start by navigating to your <b>$abbrv-groups</b> directory.</p>\n";
							echo "<p>Choose the .Mission our .Group file(s) that have returned from planning start positions for columns or statics in the template.</p>";
							echo "<p>Then click \"Upload File\".</p>\n";
							$returnpage = 'CampaignMgmtImport2.php';
#							$returnpage = 'CampaignMgmtULTemplateConfirm.php?btn=campStp&sde=MgmtUlClmsStcs';
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
