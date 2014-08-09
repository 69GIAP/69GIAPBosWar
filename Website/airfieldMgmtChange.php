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
					# get campaign database name from airfieldMgmtForm.php or out of session
					if ( empty ($_POST["airfieldName"]) ) {
						$airfieldName = $_GET['airfieldName'];
					}
					else {
						$_SESSION['airfieldName']	= $_POST["airfieldName"];
						$airfieldName					= $_SESSION['airfieldName'];
					}
			
					# initialize $error variable
					$error = 0;

					# include connect2CampaignFunction.php
					include ( 'functions/connect2Campaign.php' );
					# include getCoalitionname.php
					include ( 'functions/getCoalitionname.php' );
					
					# include getCampaignVariables.php
					include ('includes/getCampaignVariables.php');
					
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
					
					# get airfield details for Status and Coalition
					include ('includes/getAirfieldDetails.php');
					
					# table consistency check Warning
					if ($error == 1) {
						echo "<p>Warning! There are multiple entries having the same airfield name in the table airfields!<br>
								Check database table consistency.<p>\n";
					}

					# if the airfield is enabled
					if ($airfieldEnabled == 1) {
						
						# get data from airfield_models table
						$sql = "SELECT model_Name, model_Quantity, model_Altitude, model_Flight, model_SpawnPosition FROM airfields_models WHERE airfield_Name = '$airfieldName'";
		
						if(!$result = $camp_link->query($sql)){
							echo "$query<br />\n";
							die('airfieldMgmtChange query error:' . $camp_link->error);
						}
						
					  echo "<form id=\"airfieldForm\" name=\"login\" action=\"airfieldMgmtModify.php?btn=preMsn&sde=campAf&form=1\" method=\"post\">\n";
					  echo "    <h1 id=\"h1Form\">$airfieldName</h1>\n";
	
						# load results into variables and build form
						$i = 1;
						while ($obj = $result->fetch_object()) {
							$modelName				=($obj->model_Name);
							$modelQuantity			=($obj->model_Quantity);
							$modelAltitude			=($obj->model_Altitude);
							$modelFlight			=($obj->model_Flight);
							$modelSpawnPosition	=($obj->model_SpawnPosition);

#MODIFY ASSIGNED AIRCRAFT
							# MODEL
							if ($modelName == '') {
								echo "<fieldset id=\"none\"> \n";							
								# MODEL
								echo "	<input readonly=\"readonly\" type=\"text\" name='' id=\"none\" placeholder=\"No Aircraft Assigned To Airfield\" value='' size=\"24\" maxlength=\"50\" />\n";
								echo "</fieldset>";						
							}
							else {
								# START FORM FOR ASSIGNED MODEL
								echo "<fieldset id=\"inputs\">\n";						
								echo "	<h4>Aircraft $i</h4><br>\n";
								
								# MODEL
								$modelNameLoaded = "modelNameLoaded".$i;						
								echo "	<input readonly=\"readonly\" type=\"text\" name='$modelNameLoaded' id=\"aircraft\" value='$modelName' size=\"24\" maxlength=\"50\" />\n";
								
								echo "	<div class='descr'>Replace the old value with a new one and hit 'change'.</div>\n";
								#echo "	<div class='old'>OLD</div>\n";
								#echo "	<div class='new'>NEW</div>\n";								

		
						# QUANTITY
								$modelNameQuantity = "modelNameQuantity".$i;
#								echo "	<input readonly=\"readonly\" type=\"text\" name ='$modelNameQuantity' id=\"number\" class=\"number\" value='$modelQuantity' size=\"24\" maxlength=\"50\" />\n";
						# NEW QUANTITY
								// dynamically create name variable for automatically created fields
								$modelNameQuantityNew = "modelNameQuantityNew".$i;
								
								# hidden field to hand the modelNameQuantity variable over
								echo "	<input readonly=\"readonly\" type=\"hidden\" name='$modelNameQuantity' id=\"number\" class=\"number\" value='$modelNameQuantity' size=\"24\" maxlength=\"50\" />\n";
								
								echo "	<input type=\"text\" name='$modelNameQuantityNew' id=\"number\" class=\"number\" placeholder=\"$modelQuantity\" value='$modelQuantity' size=\"24\" maxlength=\"50\" />\n";
						# BUTTON UPDATE QUANTITY
						#		echo "	<button type=\"submit\" name =\"updateAirfield\" id=\"acModelForm\" class=\"acModelFormHalfsize\" value =\"$i\" >change</button>\n";	
#								echo "</fieldset>\n";


#								echo "<fieldset id=\"inputs\">\n";
						# ALTITUDE
								$modelNameAltitude = "modelNameAltitude".$i;
#								echo "	<input readonly=\"readonly\" type=\"text\" name ='$modelNameAltitude' id=\"altitude\" class=\"altitude\" value='$modelAltitude' size=\"24\" maxlength=\"50\" />\n";
						# NEW ALTITUDE
								// dynamically create name variable for automatically created fields
								
								$modelNameAltitudeNew = "modelNameAltitudeNew".$i;

								# hidden field to hand the modelNameAltitude variable over
								echo "	<input readonly=\"readonly\" type=\"hidden\" name='$modelNameAltitude' id=\"altitude\" class=\"altitude\" value='$modelAltitude' size=\"24\" maxlength=\"50\" />\n";
																
								echo "	<input type=\"text\" name='$modelNameAltitudeNew' id=\"altitude\" class=\"altitude\" placeholder=\"$modelAltitude\" value='$modelAltitude' size=\"24\" maxlength=\"50\" />\n";
						# BUTTON UPDATE ALTITUDE
						#		echo "	<button type=\"submit\" name =\"updateAirfield\" id=\"acModelForm\" class=\"acModelFormHalfsize\" value =\"$i\" >change</button>\n";	
#								echo "</fieldset>\n";


#								echo "<fieldset id=\"inputs\">\n";								
						# SPAWNPOSITION
								$modelNameSpawnPosition = "modelNameSpawnPosition".$i;
#								echo "	<input readonly=\"readonly\" type=\"text\" name ='$modelNameSpawnPosition' id=\"airstart\" class=\"airstart\" value='$modelSpawnPosition' size=\"24\" maxlength=\"50\" />\n";
						# NEW SPAWNPOSITION
								// dynamically create name variable for automatically created fields
								$modelNameSpawnPositionNew = "modelNameSpawnPositionNew".$i;
								
								# hidden field to hand the modelNameSpawnPosition variable over
								echo "	<input readonly=\"readonly\" type=\"hidden\" name='$modelNameSpawnPosition' id=\"airstart\" class=\"airstart\" value='$modelSpawnPosition' size=\"24\" maxlength=\"50\" />\n";
								
								#echo "	<input type=\"text\" name='$modelNameSpawnPositionNew' id=\"airstart\" class=\"airstart\" placeholder=\"starttype\" value='$modelSpawnPosition' size=\"24\" maxlength=\"50\" />\n";
								echo "	<select name='$modelNameSpawnPositionNew' id=\"airstart\" class=\"airstart\">\n";
								echo "<option value=\"$modelSpawnPosition\" >$modelSpawnPosition</option>\n";			
								
								# include the drop down list
								include 'includes/getAirstartPool.php'; 
								echo "	</select>\n";
						# BUTTON UPDATE SPAWNPOSITION
						#		echo "	<button type=\"submit\" name =\"updateAirfield\" id=\"acModelForm\" class=\"acModelFormHalfsize\" value =\"$i\" >change</button>\n";	


						# FLIGHT CALLSIGN
								$modelNameFlight = "modelNameFlight".$i;
#								echo "	<input readonly=\"readonly\" type=\"text\" name ='$modelNameFlight' id=\"callsign\" class=\"callsign\" value='$modelFlight' size=\"30\" maxlength=\"30\" />\n";
						# NEW FLIGHT CALLSIGN
								// dynamically create name variable for automatically created fields
								$modelNameFlightNew = "modelNameFlightNew".$i;
								
								# hidden field to hand the modelNameFlight variable over
								echo "	<input readonly=\"readonly\" type=\"hidden\" name='$modelNameFlight' id=\"callsign\" class=\"callsign\" value='$modelFlight' size=\"30\" maxlength=\"30\" />\n";
								
								if (empty($modelFlight)) {
									$modelFlight = '';
									echo "	<input type=\"text\" name='$modelNameFlightNew' id=\"callsign\" class=\"callsign\" placeholder=\"add callsign\" value='$modelFlight' size=\"30\" maxlength=\"30\" />\n";
								} else {
									echo "	<input type=\"text\" name='$modelNameFlightNew' id=\"callsign\" class=\"callsign\" placeholder=\"$modelFlight\" value='$modelFlight' size=\"30\" maxlength=\"30\" />\n";
								}
						# BUTTON UPDATE FLIGHT CALLSIGN
								echo "	<button type=\"submit\" name =\"updateAirfield\" id=\"acModelForm\" class=\"acModelFormNarrow\" value =\"$i\" >change</button>\n";	

								echo "	<br>\n";
								echo "	<br>\n";
								echo "</fieldset>\n";
								
								$i ++;	
							}
						}
						
						# Navigation helper in case of redirect from error page
						echo '<div id="addRemove"></div>';
						
						echo "<fieldset id=\"inputs\">\n";
						
						echo "<p>To assign a new model to the airfield select the corresponding entry from the dropdown list below and insert the quantity into the form field.</p>\n";
												
						// hidden field to hand airfieldName over through POST
						echo "	<input readonly=\"readonly\" type=\"hidden\" name='airfieldName' value='$airfieldName' size=\"24\" maxlength=\"50\" />\n";
						
# ADD ANOTHER AIRCRAFT						
						# NEW MODEL SELECT
						echo "	<select name=\"modelNameAdd\" id=\"aircraft\">\n";
						# include the drop down list
						include 'includes/getUnusedAirfieldCampaignModels.php'; 
						echo "	</select>\n";
						
						# NEW MODEL QUANTITY
						echo "	<input type=\"text\" name=\"modelNameAddQuantity\" id=\"number\" placeholder=\"Desired Quantitiy of selected model\" value='' size=\"24\" maxlength=\"2\" />\n";
						# NEW MODEL ALTITUDE
						echo "	<input type=\"text\" name=\"modelNameAddAltitude\" id=\"altitude\" placeholder=\"Desired Airstart Altitude\" value='' size=\"24\" maxlength=\"4\" />\n";
						# NEW MODEL AIRSTART
						echo "	<select name='modelNameAddSpawnPosition' id=\"airstart\" >\n";
						# reset spawn position due to sim to populate dropdown with default value
						if ($sim == 'RoF') {
								$modelNameAddSpawnPosition = 0;
							};
						if ($sim == 'BoS') {
								$modelNameAddSpawnPosition = 2;
							}
						echo "	<option value=\"$modelNameAddSpawnPosition\" >Desired Start Position</option>\n";						
						# include the drop down list
						include 'includes/getAirstartPool.php'; 
						echo "	</select>\n";
						
						# NEW MODEL FLIGHT CALLSIGN
						echo "	<input type=\"text\" name=\"modelNameAddFlight\" id=\"callsign\" placeholder=\"Desired Callsign\" value='' size=\"24\" maxlength=\"30\" />\n";											
						
						// hidden field to hand airfieldCoalitionId over through POST
						echo "	<input readonly=\"readonly\" type=\"hidden\" name='airfieldCoalitionId' value='$airfieldCoalitionId'/>\n";	
						
						echo "</fieldset>";
						echo "<fieldset id=\"actions\">";
						
						# BUTTON ADD
						echo "	<button type=\"submit\" name =\"updateAirfield\" id=\"loginSubmit\" value =\"7\" >Add</button>\n";

						echo "</fieldset>\n";
						echo "<fieldset id=\"inputs\">\n";										
					
						# use this information to get the coalition name
						$airfieldCoalitionName = get_coalitionname("$airfieldCoalitionId");
					
						echo "<h3>Modify $airfieldName airfield</h3>\n";
						
						echo "<p>Use this section to activate/deactivate this airfield or to change its coalition.</p>\n";
						
						# get the airfields details regarding status and coalition
						include ('includes\getAirfieldStatus.php');
						
						# BUTTON
						echo "	<fieldset id=\"actions\">";
						echo "	<button type=\"changeCoalition\" name=\"updateAirfield\" value =\"10\" id=\"loginSubmit\">Change Status</button>\n";
						echo "	</fieldset>\n";

						echo "</form>\n";
					}
					
					if ($airfieldEnabled == 0) {
						
						# use function to get the coalition name
						$airfieldCoalitionName = get_coalitionname("$airfieldCoalitionId");
						
						# build the small form to change coaltition and status only/we need the if because this page is used from 2 main menu loactions and the look of the side menu would change
                    if ($btn == 'campStp') {
							 echo "<form id=\"airfieldForm\" name=\"login\" action=\"irfieldMgmtModify.php?btn=campStp&sde=campAf&form=0\" method=\"post\">\n";
						  }
						  if ($btn == 'preMsn') {
							  echo "<form id=\"airfieldForm\" name=\"login\" action=\"airfieldMgmtModify.php?btn=preMsn&sde=campAf&form=0\" method=\"post\">\n";
						  }

						// hidden field to hand airfieldName over through POST
						echo "	<input readonly=\"readonly\" type=\"hidden\" name='airfieldName' value='$airfieldName' size=\"24\" maxlength=\"50\" />\n";
						
						echo "<h3>Modify $airfieldCoalitionName $airfieldName airfield.<br></h3>\n";
						
						echo "<p>Use this section to activate/deactivate this airfield or to change its coalition.</p>\n";						
						
						# get the airfields details regarding status and coalition
						include ('includes\getAirfieldStatus.php');
						
						# BUTTON
						echo "	<fieldset id=\"actions\">";
						echo "		<button type=\"changeCoalition\" name=\"updateAirfield\" value =\"10\" id=\"loginSubmit\">Change Status</button>\n";
						echo "	</fieldset>\n";

						echo "</form>\n";
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
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
