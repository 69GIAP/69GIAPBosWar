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
						$airfieldName 				= $_SESSION['airfieldName'];
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
						$sql = "SELECT model_Name, model_Quantity FROM airfields_models WHERE airfield_Name = '$airfieldName'";
		
						if(!$result = $camp_link->query($sql)){
							echo "$query<br />\n";
							die('airfieldMgmtChange query error:' . $camp_link->error);
						}
						
						# get the rowcount
						#$num = $result->num_rows;
	
						# start form
						echo "<form id=\"airfieldForm\" name=\"login\" action=\"airfieldMgmtModify.php?btn=preMsn&sde=campAf&form=1\" method=\"post\">\n";
						echo "    <h1 id=\"h1Form\">$airfieldName</h1>\n";
	
						# load results into variables and build form
						$i = 1;
						while ($obj = $result->fetch_object()) {
							$modelName			=($obj->model_Name);
							$modelQuantity	=($obj->model_Quantity);

							# MODEL
							if ($modelName == '') {
								echo "<fieldset id=\"none\">\n";							
								# MODEL
								echo "	<input readonly=\"readonly\" type=\"text\" name='' id=\"none\" placeholder=\"No Aircraft Assigned To Airfield\" value='' size=\"24\" maxlength=\"50\" />\n";
								echo "</fieldset>";						
							}
							else {
								echo "<fieldset id=\"inputs\">\n";						
								echo "	<p>Aircraft $i</p><br>\n";
								
								# MODEL
								$modelNameLoaded = "modelNameLoaded".$i;						
								echo "	<input readonly=\"readonly\" type=\"text\" name='$modelNameLoaded' id=\"aircraft\" value='$modelName' size=\"24\" maxlength=\"50\" />\n";
		
								# QUANTITY
								$modelNameQuantity = "modelNameQuantity".$i;
								echo "	<input readonly=\"readonly\" type=\"text\" name ='$modelNameQuantity' id=\"number\" value='$modelQuantity' size=\"24\" maxlength=\"50\" />\n";
								
								# NEW QUANTITY
								// dynamically create name variable for automatically created fields
								$modelNameQuantityNew = "modelNameQuantityNew".$i;
								echo "	<input type=\"text\" name='$modelNameQuantityNew' id=\"number\" placeholder=\"New Quantitiy\" value='' size=\"24\" maxlength=\"50\" />\n";
								echo "</fieldset>";
								echo "<fieldset id=\"actions\">";
								
								# BUTTON
								echo "	<button type=\"submit\" name =\"updateAirfield\" id=\"loginSubmit\" value =\"$i\" >Update Aircraft $i</button>\n";	
								echo "</fieldset>\n";				
								$i ++;	
							}
						}
						
						echo "<fieldset id=\"inputs\">\n";
						
						echo "<p>To assign a new model to the aifield select the corresponding entry from the dropdown list below and insert the quantity into the form field. The quantity of already listed models cannot be changed with this form. Please use the above listed ones to do so.</p>\n";
												
						// hidden field to hand airfieldName over through POST
						echo "	<input readonly=\"readonly\" type=\"hidden\" name='airfieldName' value='$airfieldName' size=\"24\" maxlength=\"50\" />\n";
						
						# NEW MODEL SELECT
						echo "	<select name=\"modelNameAdd\" id=\"aircraft\">\n";
						# include the drop down list
						include 'includes/getAirfieldCampaignModels.php'; 
						echo "	</select>\n";
						
						# NEW MODEL QUANTITY
						echo "	<input type=\"text\" name=\"modelNameAddQuantity\" id=\"number\" placeholder=\"Quantitiy To Add\" value='' size=\"24\" maxlength=\"50\" />\n";
						
						// hidden field to hand airfieldCoalitionId over through POST
						echo "	<input readonly=\"readonly\" type=\"hidden\" name='airfieldCoalitionId' value='$airfieldCoalitionId'/>\n";	
						
						echo "</fieldset>";
						echo "<fieldset id=\"actions\">";
						
						# BUTTON ADD
						echo "	<button type=\"submit\" name =\"updateAirfield\" id=\"submitHalfsize1\" value =\"7\" >Add</button>\n";
						
						# BUTTON REMOVE
						echo "	<button type=\"submit\" name =\"updateAirfield\" id=\"submitHalfsize2\" value =\"8\" >Remove</button>\n";
						
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
						
						# build the small form to change coaltition and status only
						echo "<form id=\"airfieldForm\" name=\"login\" action=\"airfieldMgmtModify.php?btn=preMsn&sde=campAf&form=0\" method=\"post\">\n";
						
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
