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
					# include connect2CampaignFunction.php (defines connect2campaign($host,$user,$password,$db))
					include ( 'functions/connect2Campaign.php' );
		
					# use it to get remaining variables
					$query = "SELECT * from campaign_settings where camp_db = '$loadedCampaign'";  
		 
					if(!$result = $dbc->query($query)) {
						die('There was an error running the query [' . $dbc->error . ']');
					}
		
					if ($result = mysqli_query($dbc, $query)) {
						/* fetch associative array */
						while ($obj = mysqli_fetch_object($result)) {
							$campaign	=($obj->campaign);
							$camp_host	=($obj->camp_host);
							$camp_user	=($obj->camp_user);
							$camp_passwd=($obj->camp_passwd);
						}
					} 
									
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
					
					# get airfield name from selection form and use as header
					$airfieldName = $_SESSION["airfieldName"];	
		
					# get data from test_airfield table
					$sql = "SELECT * FROM test_airfields WHERE name = '$airfieldName'";
		
					if(!$result = $camp_link->query($sql)){
						die('There was an error running the query ' . mysqli_error($camp_link));
					}
					
					# get the rowcount
					$num = mysqli_num_rows($result);
	
					# start form
					echo "<form id=\"airfieldForm\" name=\"login\" action=\"airfieldManagementModify.php\" method=\"post\">\n";
					echo "    <h1 id=\"h1Form\">$airfieldName</h1>\n";


					# load results into variables and build form
					$i = 1;
					while ($obj = mysqli_fetch_object($result)) {
						$airfieldName		=($obj->name);
						$airfieldCoalitionId=($obj->coalId);
						$airfieldModel		=($obj->model);
						$airfieldNumber		=($obj->number);
			
					# MODEL
					if ($airfieldModel == '')
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
							$airfieldModelLoaded = "airfieldModelLoaded".$i;						
							echo "	<input readonly=\"readonly\" type=\"text\" name='$airfieldModelLoaded' id=\"aircraft\" value='$airfieldModel' size=\"24\" maxlength=\"50\" />\n";
	
							# QUANTITY
							$airfieldModelQuantity = "airfieldModelQuantity".$i;
							echo "	<input readonly=\"readonly\" type=\"text\" name ='$airfieldModelQuantity' id=\"number\" value='$airfieldNumber' size=\"24\" maxlength=\"50\" />\n";
							
							# NEW QUANTITY
							# dynamically create name variable for automatically created fields
							$airfieldModelQuantityNew = "airfieldModelQuantityNew".$i;
							echo "	<input type=\"text\" name='$airfieldModelQuantityNew' id=\"number\" placeholder=\"New Quantitiy\" value='' size=\"24\" maxlength=\"50\" />\n";
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
						echo "		<select name=\"airfieldModelAdd\" id=\"aircraft\">\n";
									# include the drop down list
									include 'includes/getAirfieldCampaignModels.php'; 
						echo "		</select>\n";
						
						# NEW MODEL QUANTITY
						echo "		<input type=\"text\" name=\"airfieldModelAddQuantity\" id=\"number\" placeholder=\"Quantitiy To Add\" value='' size=\"24\" maxlength=\"50\" />\n";
						
						# hidden field to hand airfieldCoalitionId over through POST
						echo "		<input readonly=\"readonly\" type=\"hidden\" name='airfieldCoalitionId' value='$airfieldCoalitionId'/>\n";	
					echo "	</fieldset>";
					echo "	<fieldset id=\"actions\">";
						# BUTTON ADD
						echo "		<button type=\"submit\" name =\"updateAirfield\" id=\"submitHalfsize\" value =\"7\" >Add</button>\n";
						# BUTTON REMOVE
						echo "		<button type=\"submit\" name =\"updateAirfield\" id=\"submitHalfsize\" value =\"8\" >Remove</button>\n";
					echo "</fieldset>\n";
					echo "<fieldset id=\"inputs\">\n";										
						# get coalition name and store to variable
						$getCoalName = "SELECT coalitionname FROM rof_coalitions WHERE coalID = '$airfieldCoalitionId'";
										
						if(!$coalName = $camp_link->query($getCoalName)){
							die('There was an error running the query ' . mysqli_error($camp_link));
						}
						# load results into variables 
						while ($coalObj = mysqli_fetch_object($coalName)) {
							$airfieldCoalitionName =($coalObj->coalitionname);
						}
						echo "	<p>Airfield Coalition:</p><br>\n";
						# COALITION
						echo "		<input readonly=\"readonly\" type=\"text\" id=\"world\" value='$airfieldCoalitionName' size=\"24\" maxlength=\"50\" />\n";
						# hidden field to hand airfieldCoalitionId over through POST
						echo "		<input readonly=\"readonly\" type=\"hidden\" name='airfieldCoalitionId' value='$airfieldCoalitionId'/>\n";
			
						# NEW COALITION
						echo "		<select name=\"airfieldCoalitionIdNew\" id=\"world\">\n";
						
						# include the drop down list
						include 'includes/getCampaignCoalitions.php'; 
						echo "		</select>\n";
					echo "	</fieldset>";
					
                    echo "	<fieldset id=\"actions\">";
						# BUTTON
						echo "		<label for=\"submit\"></label>\n";
						echo "		<button type=\"changeCoalition\" name=\"updateAirfield\" value =\"9\" id=\"loginSubmit\">Change Coalition</button>\n";
										
					echo "	</fieldset>\n";	
					?>
                </form>
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
