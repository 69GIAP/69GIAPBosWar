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
					$ckey = $_POST["ckey"];
//					echo "\$ckey: $ckey<br />\n";

					// require getCoalition.php
					require ('functions/getCoalition.php');
					$CoalID = get_coalition($ckey);
//					echo "\$CoalID: $CoalID<br />\n";
	
					// require getCountryadj.php
					require ('functions/getCountryadj.php');
					$countryadj = get_countryadj($ckey);

					// require getCoalitionname.php
					require ('functions/getCoalitionname.php');
					$Coalition = get_coalitionname($CoalID);
//					echo "\$Coalition: $Coalition<br />\n";
					
					// require getNextColumnID.php
					require ('functions/getNextColumnID.php');
					$columnID = get_nextcolumnid($CoalID);
//					echo "\$columnID: $columnID<br />\n";
//					echo "\$column_name: $column_name<br />\n";
					

					//
					echo "<h2>Create a Column</h2>\n";
					echo "<form id=\"createcolumn\" name=\"createcolumn\" action=\"CampaignMgmtRecordColumn.php?btn=campMgmt\" method=\"post\">\n";
					
					echo "<p>Now you need to define some columns so each side has ground forces.</p> 
						<p>You will assign each column to its starting position in a particular Supply Point.</p>
					<p>Each column has a unique identitity (in this case, $column_name) and consists of one to sixteen copies of a single type of \"vehicle\" which will either be the unit itself or a transport vehicle to carry the ground unit (the <i>en route</i> unit type is shown in square brackets).</p>
					<p>Later you will add the appropriate columns to the starting template for each side.</p>\n";

					echo "<h3>$countryadj ($Coalition) Column: $column_name</h3>\n";

					echo "<h3>Supply Point for this Column</h3>\n";
					echo "<input type=\"hidden\" name=\"columnID\" value=\"$columnID\">\n";
					echo "<input type=\"hidden\" name=\"column_name\" value=\"$column_name\">\n";
					echo "<input type=\"hidden\" name=\"ckey\" value=\"$ckey\">\n";
					echo "<input type=\"hidden\" name=\"CoalID\" value=\"$CoalID\">\n";
					// select supply point
					// include getSupplyPoints.php
					include ('includes/getSupplyPoints.php');

					// select number of objects
					echo "<h3>Number of Vehicles in this Column</h3>\n";
					//$maxnum = 99;
					$maxnum = 16;
					echo "<select name=\"objnum\"><br />\n";
					for ($i = 1; $i < $maxnum+1; ++$i) {
						echo "<option value=\"$i\">$i</option><br />\n";
					}
					echo "</select><br />\n";

					// select vehicle
					echo "<h3>Choose Vehicle</h3>\n";

					// include getVehicleList.php
					include ('includes/getVehicleList.php');

?>
						<br />&nbsp;<br />
<!--
<a href="CampaignMgmtSetupColumns.php?btn=campMgmt&fi=country">Next</a>
-->
<?php
					# BUTTON	
					echo "<fieldset id=\"actions\">\n";
					echo "		<button type=\"submit\" name =\"createColumn\" id=\"loginSubmit\" value =\"init\" >Create Column</button>\n";	
					echo "	</fieldset>\n";
					echo "</form>\n";          
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
