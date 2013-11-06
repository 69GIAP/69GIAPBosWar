<?php 

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
	
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            	<?php 
					# get campaign database name from previous POST
					if ( empty ($_POST["airfieldName"]) ) {
						$airfieldName = $_GET['airfieldName'];
					}
					else {
						$_SESSION['airfieldName']	= $_POST["airfieldName"];
						$airfieldName 				= $_SESSION['airfieldName'];
					}

					# include connect2CampaignFunction.php
					include ( 'functions/connect2Campaign.php' );
					
					# include getCampaignVariables.php
					include ('includes/getCampaignVariables.php');
					
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
					
					# get airfield details for Status and Coalition
					include ('includes/getAirfieldDetails.php');

					# if the airfield is not neutral build the same form a commander would see
					
					if ($airfieldEnabled == 1) {
						
						# get data from airfield_models table
						$sql = "SELECT * FROM airfields_models WHERE airfield_Name = '$airfieldName'";
		
						if(!$result = $camp_link->query($sql)){
							die('There was an error running the query ' . mysqli_error($camp_link));
						}
						
						# get the rowcount
						$num = mysqli_num_rows($result);
	
						# start form
						echo "<form id=\"airfieldForm\" name=\"login\" action=\"airfieldMgmtModify.php\" method=\"post\">\n";
						echo "    <h1 id=\"h1Form\">$airfieldName</h1>\n";
	
	
						# load results into variables and build form
						$i = 1;
						while ($obj = mysqli_fetch_object($result)) {
							$airfieldName		 =($obj->airfield_Name);
							$airfieldCoalitionId =($obj->airfield_Coalition);
							$modelName			 =($obj->model_Name);
							$modelQuantity		 =($obj->model_Quantity);
		
						# MODEL
						if ($modelName == '')
							{
								echo "<fieldset id=\"none\">\n";							
								# MODEL
								echo "	<input readonly=\"readonly\" type=\"text\" name='' id=\"none\" placeholder=\"No Aircraft Assigned To Airfield\" value='' size=\"24\" maxlength=\"50\" />\n";
								echo "</fieldset>";						
							}
						else
							{
								echo "<fieldset id=\"inputs\">\n";						
								echo "	<p>Aircraft $i</p><br>\n";
								# MODEL
								$modelNameLoaded = "modelNameLoaded".$i;						
								echo "	<input readonly=\"readonly\" type=\"text\" name='$modelNameLoaded' id=\"aircraft\" value='$modelName' size=\"24\" maxlength=\"50\" />\n";
		
								# QUANTITY
								$modelNameQuantity = "modelNameQuantity".$i;
								echo "	<input readonly=\"readonly\" type=\"text\" name ='$modelNameQuantity' id=\"number\" value='$modelQuantity' size=\"24\" maxlength=\"50\" />\n";
								
								# NEW QUANTITY
								# dynamically create name variable for automatically created fields
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
							# AIRFIELD NAME
							echo "	<input readonly=\"readonly\" type=\"hidden\" name='airfieldName' value='$airfieldName' size=\"24\" maxlength=\"50\" />\n";
									# NEW MODEL SELECT
							echo "	<select name=\"modelNameAdd\" id=\"aircraft\">\n";
									# include the drop down list
									include 'includes/getAirfieldCampaignModels.php'; 
							echo "	</select>\n";
									# NEW MODEL QUANTITY
							echo "	<input type=\"text\" name=\"modelNameAddQuantity\" id=\"number\" placeholder=\"Quantitiy To Add\" value='' size=\"24\" maxlength=\"50\" />\n";
							# hidden field to hand airfieldCoalitionId over through POST
							echo "	<input readonly=\"readonly\" type=\"hidden\" name='airfieldCoalitionId' value='$airfieldCoalitionId'/>\n";	
							echo "</fieldset>";
							
							echo "<fieldset id=\"actions\">";
									# BUTTON ADD
							echo "	<button type=\"submit\" name =\"updateAirfield\" id=\"submitHalfsize1\" value =\"7\" >Add</button>\n";
									# BUTTON REMOVE
							echo "	<button type=\"submit\" name =\"updateAirfield\" id=\"submitHalfsize2\" value =\"8\" >Remove</button>\n";
							echo "</fieldset>\n";
							
							echo "<fieldset id=\"inputs\">\n";										
							# get coalition name and store to variable
							$getCoalName = "SELECT coalitionname FROM rof_coalitions 
											WHERE coalID = '$airfieldCoalitionId' ";
											
							if(!$coalName = $camp_link->query($getCoalName)){
								die('There was an error running the query ' . mysqli_error($camp_link));
							}
							# load results into variables 
							while ($coalObj = mysqli_fetch_object($coalName)) {
								$airfieldCoalitionName =($coalObj->coalitionname);
							}
							echo "	<p>Airfield Coalition: <b>$airfieldCoalitionName</b></p><br>\n";
							# COALITION
							# hidden field to hand airfieldCoalitionId over through POST
							echo "		<input readonly=\"readonly\" type=\"hidden\" name='airfieldCoalitionId' value='$airfieldCoalitionId'/>\n";
							# NEW COALITION
							echo "	<select name=\"airfieldCoalitionIdNew\" id=\"world\">\n";
							
							# include the drop down list
							include 'includes/getCampaignCoalitions.php'; 
							echo "	</select>\n";
							echo "	</fieldset>";
							
							# BUTTON
							echo "	<fieldset id=\"actions\">";
							echo "	<button type=\"changeCoalition\" name=\"updateAirfield\" value =\"9\" id=\"loginSubmit\">Change Coalition</button>\n";
							echo "	</fieldset>\n";		
							echo "</form>\n";
							
							
							# build the small form to change coaltition and status only
							echo "<form id=\"airfieldForm\" name=\"login\" action=\"airfieldMgmtStatusModify.php\" method=\"post\">\n";
							echo "<h3>$airfieldName Status</h3>\n";
							
							# get the airfields details regarding status and coalition
							include ('includes\getAirfieldStatus.php');	

							# BUTTON
							echo "	<fieldset id=\"actions\">";
							echo "	<button type=\"changeCoalition\" id=\"loginSubmit\">Change Status</button>\n";
							echo "	</fieldset>\n";
							echo "</form>\n";
						}
					else {
						# build the small form to change coaltition and status only
						echo "<form id=\"airfieldForm\" name=\"login\" action=\"airfieldMgmtStatusModify.php\" method=\"post\">\n";
						
						echo "<h3>Modify $airfieldName airfield</h3>\n";
						# get the airfields details regarding status and coalition
						include ('includes\getAirfieldStatus.php');
						
						# BUTTON
						echo "	<fieldset id=\"actions\">";
						echo "	<button type=\"changeCoalition\" loginSubmit\">Change Status</button>\n";
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
	# Include the footer
	include ( 'includes/footer.php' );
?>
