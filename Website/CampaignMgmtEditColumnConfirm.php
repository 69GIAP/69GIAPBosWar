<?php 

// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();

// Include the website header
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

					// declare $camp_link to be a global variable
					global $camp_link;

					// connect to campaign db
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					// get post variables
					$action	= $_POST['action'];
//					echo "\$action: $action<br />\n";
					if ($action == "update") {
						$col_id				= $_POST['col_id'];
						$objnum			= $_POST['objnum'];
						$supplypoint	= $_POST['supplypoint'];
						$model	= $_POST['model'];
//						echo "\$col_id: $col_id<br />\n";
//						echo "\$objnum: $objnum<br />\n";
//						echo "\$supplypoint: $supplypoint<br />\n";

						// require getObjectdescription.php
						require ( 'functions/getObjectdescription.php' );

						$objectDesc = get_objectdescription($model);

						// create column description
						$Description = "$objnum"."x "."$objectDesc";

						// update this column
						$query = "UPDATE columns SET Description = '$Description', Quantity = '$objnum', Supplypoint = '$supplypoint' WHERE id = '$col_id';";
						if(!$result = $camp_link->query($query)){
							die('CampaignMgmtColumnConfirm query error<br>'.$query."<br>" . $camp_link->error);
						} else {				
							echo "$query<br />\n";
							echo "\$Description: $Description<br />\n";
//							echo "\$objnum: $objnum<br />\n";
							echo "\$supplypoint: $supplypoint<br />\n";
							echo "Updated\n";

							echo "<br />&nbsp;<br />\n";
							echo "<a href=\"CampaignMgmtDownloadColumns.php?btn=campStp\">Next</a><br />\n";
						}

					} else {
//						echo "Trying to drop a column<br />\n";
						$col_id = $_POST['col_id'];
//						echo "\$col_id: $col_id<br />\n";

						$query = "DELETE FROM columns WHERE id = '$col_id';";
						if(!$result = $camp_link->query($query)){
							die('CampaignMgmtColumnConfirm query error<br>'.$query."<br>" . $camp_link->error);
						} else {	
//							echo "Trying to drop a column<br />\n";
							echo "Column dropped<br />\n";
							echo "<br />&nbsp;<br />\n";
							echo "<a href=\"CampaignMgmtDownloadColumns.php?btn=campStp\">Next</a><br />\n";
						}
					}
?>
						<br />&nbsp;<br />

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
