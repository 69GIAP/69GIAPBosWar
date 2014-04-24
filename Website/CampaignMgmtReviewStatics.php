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
                
				// require displayStaticGroups.php
				require ('functions/displayStaticGroups.php');	

				// require getCoalitionname.php
				require ('functions/getCoalitionname.php');

				// require getCountryadj.php
				require ('functions/getCountryadj.php');

				// require getPointname.php
				require ('functions/getPointname.php');

				// action determines what we do next
				if (!isset($_POST['action'])) {
					echo "<h1>Review Static Groups</h1>\n";
					echo "<p>You have defined static groups in the BOSWAR campaign manager.  Now you will review these groups.</p>\n"; 
					echo "<p>If you need to edit a static group, select it and then choose \"Edit Group\".  Similarly if you want to clone a group, select it and choose \"Clone Group\"otherwise select \"Export Static Groups\"</p>\n";

					echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";

					// display columns for each coalition
					display_staticgroups(1);
					display_staticgroups(2);

					// include prepareColumnsForDownload.php
					// include ('includes/prepareColumnsForDownload.php');
				
					echo "<br />&nbsp<br />\n";
					
					// EDIT GROUP BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" id=\"submitHalfsize1\" value =\"edit\" name=\"action\">Edit Group</button>\n";
					echo "	</fieldset>\n";
					echo "</form>\n";

					// CLONE GROUP BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" id=\"submitHalfsize1\" value =\"clone\" name = \"action\">Clone Group</button>\n";
					echo "	</fieldset>\n";
					echo "</form>\n";

					echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
#					// EXPORT GROUP BUTTON
#					echo "<fieldset id=\"actions\">\n";	
#					echo "<input type=\"hidden\" name=\"action\" value = \"export\">\n";	
#					echo "		<button type=\"submit\" id=\"registerSubmit\" value ='' >Export Static Groups</button>\n";
#					echo "	</fieldset>\n";
#					echo "</form>\n";
				} else {
					$action = $_POST['action'];
					if ($action == 'edit') { 
						if (!isset($_POST['columnID'])) {
							echo "The Edit Static Group pages are under development.<br />\n";
							echo "<p><b><font color = \"red\">You did not select a group to edit.</font></b></p>\n";
							
							echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
							echo "<fieldset id=\"actions\">\n";	
							echo "		<button type=\"submit\" id=\"submitHalfsize1\" >Continue</button>\n";
							echo "	</fieldset>\n";	

						} else {
								$columnID = $_POST['columnID'];
							// require editColumn.php 
							require ('functions/editStatic.php');
							edit_static($columnID);
						}

					} elseif ($action == 'clone') {
//						echo "The Clone Static Group pages are a work in progress.<br />\n";
						if (!isset($_POST['columnID'])) {
							echo "<p><b><font color = \"red\">You did not select a group to clone.</font></b></p>\n";
						} else {
					        $columnID = $_POST['columnID'];
							$query1 = "SELECT * FROM static_groups WHERE id = '$columnID';";
							if(!$result = $camp_link->query($query1)){
								die('CampaignMgmtReviewStatics.php query1 error [' . $camp_link->error . ']');
							} else {
								while ($obj = $result->fetch_object()) {
									$name			= $obj->name;
									$Supplypoint	= $obj->Supplypoint;
									$pointname		= get_pointname($Supplypoint);
									$description	= $obj->description;
									$ckey			= $obj->ckey;
									$CoalID			= $obj->CoalID;
								}
								echo "You have chosen to clone:<br /><b>$name - $description</b><br />\n";
								echo "<form id=\"campaignMgmtReviewStatics\" name=\"campaignMgmtReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
								echo "	<fieldset id=\"inputs\">\n";	
								echo "<h3>Cloned Group Name</h3>\n";
								echo "		<input type=\"text\" name=\"ClonedGroupName\" id=\"database\" placeholder=\"Please enter a name for this cloned group\" value='' size=\"24\" maxlength=\"30\" />\n";
								echo "<h3>Cloned Group Description</h3>\n";
								echo "		<input type=\"text\" name=\"description\" id=\"database\"  value=\"$description\" size=\"24\" maxlength=\"80\" />\n";
								echo "<input type=\"hidden\" name=\"oldname\" value = \"$name\">\n";						
								echo "<input type=\"hidden\" name=\"ckey\" value = \"$ckey\">\n";						
								echo "<input type=\"hidden\" name=\"CoalID\" value = \"$CoalID\">\n";						
								echo "	</fieldset>\n";

								//SELECT SUPPLY POINT 
								echo "<h3>Supply Point for this Static Group</h3>\n";
								echo "	<fieldset id=\"inputs\">\n";	
								echo "	<div class=\"createColumnCheckboxWrapper\">\n";
								// include getSupplyPoints.php
								include ('includes/getSupplyPoints.php');
								echo "	</div>\n";
								echo "</fieldset>\n";

								// CLONE STATIC GROUP BUTTON
								echo "<fieldset id=\"actions\">\n";	
								echo "		<button type=\"submit\" id=\"registerSubmit\" name = \"action\" value =\"writeclone\" >Clone Static Group</button>\n";
								echo "	</fieldset>\n";

							}
						} 
					} elseif ($action == 'writeclone') {
					    echo "Now write the clone to static and static_groups.<br/>\n";
					    $oldname = $_POST['oldname'];
//					    echo "\$oldname: $oldname<br />\n";
					    $clonename = $_POST['ClonedGroupName'];
//					    echo "\$clonename: $clonename<br />\n";
					    $description = $_POST['description'];
//					    echo "\$description: $description<br />\n";
					    $ckey = $_POST['ckey'];
//					    echo "\$ckey: $ckey<br />\n";
					    $CoalID = $_POST['CoalID'];
//					    echo "\$CoalID: $CoalID<br />\n";
					    $pointID = $_POST['pointID'];
//					    echo "\$pointID: $pointID<br />\n";

					    // clone objects in static
					    $query2= "SELECT * FROM statics where static_Name = '$oldname';";
//					    echo "$query2<br />\n";

						if(!$result = $camp_link->query($query2)){
							die('CampaignMgmtReviewStatics.php query2 error [' . $camp_link->error . ']');
						} else {
							while ($obj = $result->fetch_object()) {
								$static_Model	= $obj->static_Model;
								$static_Type	= $obj->static_Type;
								$static_Desc	= $obj->static_Desc;
								$query3 = "INSERT INTO statics 
								    (static_Name, static_Model, static_Type, static_Desc,
								    static_Country, static_coalition, static_supplypoint)
								    VALUES
								    ('$clonename', '$static_Model', '$static_Type', '$static_Desc',
								    '$ckey', '$CoalID', '$pointID');";
								if(!$result3 = $camp_link->query($query3)){
									die('CampaignMgmtReviewStatics.php query3 error [' . $camp_link->error . ']');
								} else {
								    echo "$query3<br />\n";
								}
							}
						}
					    
					    // record clone in static_groups
					    $query4 = "INSERT INTO static_groups
					       	(name, description, ckey, CoalID, Supplypoint)
						VALUES
						('$clonename', '$description', '$ckey', '$CoalID', '$pointID');";

						if(!$result = $camp_link->query($query4)){
							die('CampaignMgmtReviewStatics.php query4 error [' . $camp_link->error . ']');
						} else {
						    echo "$query4<br />\n";
						}
						// done with cloning
						echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
						echo "<br />&nbsp<br />\n";
						// NEXT BUTTON
						echo "<fieldset id=\"actions\">\n";	
						echo "		<button type=\"submit\" id=\"submitHalfsize1\" value =\"\" name=\"next\">Next</button>\n";
						echo "	</fieldset>\n";
						echo "</form>\n";
					} elseif ($action == 'addunit') {
						if (!isset($_POST['objectID'])) {
							echo "<p><b><font color = \"red\">You did not select a unit to add.</font></b></p>\n";
						} else {
							echo "Add unit.<br />\n";
							$objectID = $_POST['objectID'];
							echo "\$objectID: $objectID<br />\n";
						    $query5 = "SELECT * from static where id = '$objectID';";
							if(!$result = $camp_link->query($query5)){
								die('CampaignMgmtReviewStatics.php query5 error [' . $camp_link->error . ']');
							} else {
								while ($obj = $result->fetch_object()) {
									$static_Name	= $obj->static_Name;
									$static_Model	= $obj->static_Model;
									$static_Type	= $obj->static_Type;
									$static_Desc	= $obj->static_Desc;
									$static_Country	= $obj->static_Country;
									$static_coalition	= $obj->static_coalition;
									$static_supplypoint	= $obj->static_supplypoint;

									$query6 = "INSERT INTO statics 
									    (static_Name, static_Model, static_Type, static_Desc,
									    static_Country, static_coalition, static_supplypoint)
									    VALUES
									    ('$static_Name', '$static_Model', '$static_Type', '$static_Desc',
									    '$static_Country', '$static_coalition', '$static_supplypoint');";
									if(!$result6 = $camp_link->query($query6)){
										die('CampaignMgmtReviewStatics.php query6 error [' . $camp_link->error . ']');
									} else {
									    echo "$query6<br />\n";
										$result6->free();
									}
								}
							}
						}
						echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
						echo "<br />&nbsp<br />\n";
						// NEXT BUTTON
						echo "<fieldset id=\"actions\">\n";	
						echo "		<button type=\"submit\" id=\"submitHalfsize1\" value =\"\" name=\"next\">Next</button>\n";
						echo "	</fieldset>\n";
						echo "</form>\n";
					} elseif ($action == 'removeunit') {
						if (!isset($_POST['objectID'])) {
							echo "<p><b><font color = \"red\">You did not select a unit to remove.</font></b></p>\n";
						} else {
							echo "Remove unit.<br />\n";
							$objectID = $_POST['objectID'];
							$query7 = "DELETE FROM static WHERE id = '$objectID';";
							if(!$result7 = $camp_link->query($query7)){
								die('CampaignMgmtReviewStatics.php query7 error [' . $camp_link->error . ']');
							} else {
							    echo "$query7<br />\n";
							}
						}
						echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
						echo "<br />&nbsp<br />\n";
						// NEXT BUTTON
						echo "<fieldset id=\"actions\">\n";	
						echo "		<button type=\"submit\" id=\"submitHalfsize1\" value =\"\" name=\"next\">Next</button>\n";
						echo "	</fieldset>\n";
						echo "</form>\n";

					} elseif ($action == 'updatelocation') {
//						echo "The update location function is a work in progress.<br />\n";
						$supplypoint = $_POST['supplypoint'];
						$groupID = $_POST['groupID'];
//						echo "\$supplypoint: $supplypoint<br />\n";
//						echo "\$groupID: $groupID<br />\n";
						$query8 = "SELECT name from static_groups WHERE id = '$groupID';";
						if(!$result = $camp_link->query($query8)){
							die('CampaignMgmtReviewStatics.php query8 error [' . $camp_link->error . ']');
						} else {
							echo "$query8<br />\n";
							while ($obj = $result->fetch_object()) {
								$name = $obj->name;
								echo "\$name: $name<br />\n";
							}
						}
						$query9 = "UPDATE statics SET static_supplypoint = '$supplypoint' WHERE static_Name = '$name';";
						if(!$result = $camp_link->query($query9)){
							die('CampaignMgmtReviewStatics.php query9 error [' . $camp_link->error . ']');
						} else {
							echo "$query9<br />\n";
						}

						$query10 = "UPDATE static_groups SET Supplypoint = '$supplypoint' WHERE name = '$name';";
						if(!$result = $camp_link->query($query10)){
							die('CampaignMgmtReviewStatics.php query10 error [' . $camp_link->error . ']');
						} else {
							echo "$query10<br />\n";
						}

						echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
						echo "<br />&nbsp<br />\n";
						// NEXT BUTTON
						echo "<fieldset id=\"actions\">\n";	
						echo "		<button type=\"submit\" id=\"submitHalfsize1\" value =\"\" name=\"next\">Next</button>\n";
						echo "	</fieldset>\n";
						echo "</form>\n";
					} elseif ($action == 'delete') {
//						echo "The delete static group function is a work in progress.<br />\n";
						echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
						$groupID = $_POST['groupID'];
						$query11 = "SELECT name from static_groups WHERE id = '$groupID';";
						if(!$result = $camp_link->query($query11)){
							die('CampaignMgmtReviewStatics.php query11 error [' . $camp_link->error . ']');
						} else {
							echo "$query11<br />\n";
							while ($obj = $result->fetch_object()) {
								$name = $obj->name;
								echo "\$name: $name<br />\n";
							}
						}

						$query12 = "DELETE FROM statics WHERE static_Name = '$name';";
						if(!$result = $camp_link->query($query12)){
							die('CampaignMgmtReviewStatics.php query12 error [' . $camp_link->error . ']');
						} else {
							echo "$query12<br />\n";
						}

						$query13 = "DELETE FROM static_groups WHERE name = '$name';";
						if(!$result = $camp_link->query($query13)){
							die('CampaignMgmtReviewStatics.php query13 error [' . $camp_link->error . ']');
						} else {
							echo "$query13<br />\n";
						}

						echo "<br />&nbsp<br />\n";
						// NEXT BUTTON
						echo "<fieldset id=\"actions\">\n";	
						echo "		<button type=\"submit\" id=\"submitHalfsize1\" value =\"\" name=\"next\">Next</button>\n";
						echo "	</fieldset>\n";
						echo "</form>\n";
					} elseif ($action == 'export') {

						// require getAbbrv.php
						require ('functions/getAbbrv.php');

						// require getPointXPos.php
						require ('functions/getPointXPos.php');

						// require getPointZPos.php
						require ('functions/getPointZPos.php');

						// require getGroundAILevel.php
						require ('functions/getGroundAILevel.php');

						// require getGroundspacing.php
						require ('functions/getGroundspacing.php');

               					// require exportStaticGroups.php                
						require ('functions/exportStaticGroups.php');

						// export static groups seperately for each coalition
						export_staticgroups(1);
						export_staticgroups(2);


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
