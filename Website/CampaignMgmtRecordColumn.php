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

					// get required post variables
					if (isset($_POST["columnID"])) {
						$columnID		= $_POST["columnID"];
					} else {
							die ('columnID not set!');
					}

					if (isset($_POST["column_name"])) {
						$column_name	= $_POST["column_name"];
					} else {
							die ('column_name not set!');
					}

					if (isset($_POST["objectType"])) {
						$objectType		= $_POST["objectType"];
					} else {
							die ('objectType (vehicle) not set!');
					}

					if (isset($_POST["ckey"])) {
						$ckey			= $_POST["ckey"];
					} else {
							die ('ckey (country) not set!');
					}

					if (isset($_POST["CoalID"])) {
						$CoalID			= $_POST["CoalID"];
					} else {
							die ('CoalID (coalition) not set!');
					}

					if (isset($_POST["pointID"])) {
						$pointID		= $_POST["pointID"];
					} else {
							die ('pointID (supply point) not set!');
					}

					if (isset($_POST["objnum"])) {
						$objnum			= $_POST["objnum"];
					} else {
							die ('objnum (quantity) not set!');
					}

					// require getTransportSpeed.php
					require ('functions/getTransportSpeed.php');
					$transport_speed = get_transportspeed();
//					echo "\$transport_speed: $transport_speed<br />\n";
					
					// include getVehicleProperties.php
					include ('includes/getVehicleProperties.php');

					// calculate col_speed (slower of transport or cruise speed)
					if($transport_speed < $cruiseSpeed) {
						$col_speed = $transport_speed;
					} elseif($cruiseSpeed > 0) {
						$col_speed = $cruiseSpeed;
					} else {
						$col_speed = $transport_speed;
					}

					// create column description
					$Description = "$objnum"."x "."$objectDesc";

					// record this column in the columns table	
					
					$query = "INSERT INTO columns
						(columnID, Name, Model, moving_becomes,
						description, ckey, CoalID, Supplypoint,
						quantity, col_speed
						) 
						VALUES
						('$columnID', '$column_name', '$objectType', '$moving_becomes',
						'$Description', '$ckey', '$CoalID', '$pointID',
						'$objnum', '$col_speed'
						);";

						if(!$result = $camp_link->query($query)){
						die('CampaignMgmtRecordColumn query error<br>'.$query."<br>" . $camp_link->error);
						} else {				
							echo "\$columnID: $columnID<br />\n";
							echo "\$column_name: $column_name<br />\n";
							echo "\$objectType: $objectType<br />\n";
							echo "\$moving_becomes: $moving_becomes<br />\n";
							echo "\$objectDesc: $objectDesc<br />\n";
							echo "\$Description: $Description<br />\n";
							echo "\$ckey: $ckey<br />\n";
							echo "\$CoalID: $CoalID<br />\n";
							echo "\$pointID: $pointID<br />\n";
							echo "\$objnum: $objnum<br />\n";
							echo "\$col_speed: $col_speed<br />\n";
							echo "Created\n";

							echo "<br />&nbsp;<br />\n";
							
							# start form
							echo "<form id=\"campaignMgmtForm\" name=\"objectSetup\" action=\"CampaignMgmtSetupColumns.php?btn=campStp&sde=campCol\" method=\"post\">\n";
							echo "<fieldset id=\"actions\">\n";	
							echo "		<button type=\"submit\" id=\"back\" >Next</button>\n";
							echo "	</fieldset>\n";								

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
