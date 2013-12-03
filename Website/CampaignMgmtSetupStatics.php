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
				// require connect2CampaignFunction.php
				require ( 'functions/connect2Campaign.php' );

				// include getCampaignVariables.php
				include ( 'includes/getCampaignVariables.php' );
		
				// use this information to connect to campaign 
				$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

				// First step - choose a country for the group
				if (!isset($_POST['ckey'])) {
					echo "<h1>Create a Static Group</h1>\n";
					
					echo "<p>A static group is a group of dissimilar objects, vehicles, trains etc. which are in a compact geographic location. This allows us to track their status in the statistics and to activate and deactivate vehicles during a mission via complex triggers, thus reducing performance problems in mission.</p>\n"; 
					if ($sim == 'RoF') {
						echo "<p>In Rise of Flight the ground forces are French or German by default.  You can, of course, edit the campaign's object_properties table to give other assignments.<p>\n"; 
					} else {
						echo "<p>In Battle of Stalingrad the ground forces are Russian or German by default, of course.<p>\n"; 
					}

					// start form
					echo "<form id=\"campaignMgmtSetupStatucs\" name=\"campaignSetupStatics\" action=\"CampaignMgmtSetupStatics.php?btn=campStp&sde=campCol\" method=\"post\">\n";
					// include setupColumns.php
					include ('includes/setupColumns.php');

					# SELECT COUNTRY BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Select Country</button>\n";
					echo "	</fieldset>\n";
					
					echo "</form>\n";

				//Second step - name the group
				} elseif(!isset($_POST['newStaticGroupName'])) {
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

					echo "<h1>Create a Static Group</h1>\n";
					echo "<h2>Name This $countryadj ($Coalition) Static Group</h1>\n";

					echo "<p>Each static group must have a unique name (30 characters or less).</p>\n";

					$query1 = "SELECT * FROM static_groups;";
					if(!$result = $camp_link->query($query1)){
						die('CampaignMgmtSetupStatics.php query1 error [' . $camp_link->error . ']');
					} elseif(!$result->num_rows) {
	 					echo "<p>There are no groups defined yet, so you can use any reasonable name.</p>\n";
					} else {				
						echo "<p>Here are the existing group names so you can avoid duplicating them.</p>\n";

						while ($obj = $result->fetch_object()) {
							$name=($obj->name);
							echo "<b>$name</b><br />\n";
						}
					}
					
					echo "<p>After you choose the name you will select the objects that belong to that group</po>.
					<p>Once you have defined a group we will allow you to clone it with a different name.  So, for example, if you have defined one airfield group (windsock, defenses, etc.), you can make copies for each active airfield.</p> 
					<p>Later you will add the appropriate groups to the starting template for each side.</p>\n";

					echo "<form id=\"campaignMgmtSetupStatics\" name=\"campaignMgmtSetupStatics\" action=\"CampaignMgmtSetupStatics.php?btn=campStp&sde=campCol\" method=\"post\">\n";
					echo "	<fieldset id=\"inputs\">\n";	

					echo "<h3>New Static Group Name</h3>\n";
					echo "		<input type=\"text\" name=\"newStaticGroupName\" id=\"database\" placeholder=\"Please enter a name for this static group\" value='' size=\"24\" maxlength=\"30\" />\n";
					echo "<h3>Static Group Description</h3>\n";
					echo "		<input type=\"text\" name=\"description\" id=\"database\" placeholder=\"Please enter a description of this static group\" value='' size=\"24\" maxlength=\"80\" />\n";
					echo "<input type=\"hidden\" name=\"ckey\" value = \"$ckey\">\n";						
					// NAME STATIC GROUP BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" id=\"registerSubmit\" value ='' >Name Static Group</button>\n";
					echo "	</fieldset>\n";

				// Third step - insert info into static_groups table
				} elseif(!isset($_POST['action'])) {
					// get post variables
					$ckey = $_POST["ckey"];
//					echo "\$ckey: $ckey<br />\n";
					$newStaticGroupName = $_POST["newStaticGroupName"];
//					echo "\$newStaticGroupName: $newStaticGroupName<br />\n";
					$description = $_POST["description"];
//					echo "\$description: $description<br />\n";

					// require getCoalition.php
					require ('functions/getCoalition.php');
					$CoalID = get_coalition($ckey);
//					echo "\$CoalID: $CoalID<br />\n";
					
	
					// make sure new name is mysql-safe
					$newStaticGroupName = $camp_link->real_escape_string($newStaticGroupName);
					
					// record new name
					$query2 = "INSERT INTO static_groups (name, description, ckey, CoalID) VALUES ('$newStaticGroupName', '$description', '$ckey', '$CoalID');";
					if(!$result = $camp_link->query($query2)){
						echo "$query2<br />\n";
						die('CampaignMgmtSetupStatics.php query2 error [' . $camp_link->error . ']');
					} else {
						echo "$query2<br />\n";
						$action = 'populate';
					}
					// NEXT BUTTON
					echo "<form id=\"campaignMgmtSetupStatics\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtPopulateStatics.php?btn=campStp&sde=campCol\" method=\"post\">\n";
					echo "<fieldset id=\"actions\">\n";	
					if(isset($_POST['ckey'])) {
						echo "<input type=\"hidden\" name=\"ckey\" value = \"$ckey\">\n";						
					}
					if(isset($_POST['newStaticGroupName'])) {
						echo "<input type=\"hidden\" name=\"newStaticGroupName\" value = \"$newStaticGroupName\">\n";						
					}
					echo "<input type=\"hidden\" name=\"action\" value = \"$action\">\n";						
					echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Next</button>\n";
					echo "	</fieldset>\n";
				}
					
					echo "</form>\n";
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
