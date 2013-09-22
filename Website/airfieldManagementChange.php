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
					echo "<h3>Airfield $airfieldName</h3><br>\n";
		
					# get data from test_airfield table
					$sql = "SELECT * FROM test_airfields WHERE name = '$airfieldName'";
		
					if(!$result = $camp_link->query($sql)){
						die('There was an error running the query ' . mysqli_error($camp_link));
					}
					
					# start form
					echo "<fieldset class=\"boswar\">\n";
					echo "	<form  name=\"airfieldModify\"  action=\"airfieldManagementModify.php\" method=\"post\">\n";					
						echo "<fieldset class=\"airfield\">\n";					
					# load results into variables and build form
						$i = 1;
					while ($obj = mysqli_fetch_object($result)) {
						$airfieldName		=($obj->name);
						$airfieldCoalition	=($obj->coalition);
						$airfieldModel		=($obj->model);
						$airfieldNumber		=($obj->number);


	
						# MODEL
						echo "		<li> <label class=\"grey\" for=\"airfieldModel\">Aircraft $i:<br></label>\n";
						$airfieldModelLoaded = "airfieldModelLoaded".$i;						
						echo "		<input class=\"grey\" readonly=\"readonly\" type=\"text\" name='$airfieldModelLoaded' id=\"airfieldModelExample\" value='$airfieldModel' size=\"24\" maxlength=\"50\" />\n";
						echo "		</li>\n";
	
						# QUANTITY
						echo "		<li> <label class=\"grey\" for=\"airfieldNumber\">Current Quantity $i:<br></label>\n";
						$airfieldModelQuantity = "airfieldModelQuantity".$i;
						echo "		<input class=\"grey\" readonly=\"readonly\"  name ='$airfieldModelQuantity' type=\"text\" id=\"airfieldNumber\" value='$airfieldNumber' size=\"24\" maxlength=\"50\" />\n";
						echo "		</li>\n";
						
						# NEW QUANTITY
						echo "		<li> <label for=\"airfieldNumber\">New Quantity:<br></label>\n";
						# dynamically create name variable for automatically created fields
						$airfieldModelQuantityNew = "airfieldModelQuantityNew".$i;
						echo "		<input type=\"text\" name='$airfieldModelQuantityNew' id=\"airfieldModelQuantityNew\" value='$airfieldNumber' size=\"24\" maxlength=\"50\" />\n";
						echo "		</li>\n";
						
						# BUTTON
						echo "		<li><label for=\"submit\"></label>\n";
						echo "		<button type=\"submit\" name =\"updateAirfield\" id=\"submit\" value =\"$i\" >Update Aircraft $i</button>\n";
						echo "		</li>\n";						

						$i += 1;									
											
					}
						
					echo "</fieldset>\n";		

					echo "<fieldset class=\"airfield\">\n";		
						# AIRFIELD NAME
						echo "		<li>\n";
						echo "		<input readonly=\"readonly\" type=\"hidden\" name='airfieldName' id=\"airfieldName\" value='$airfieldName' size=\"24\" maxlength=\"50\" />\n";
						echo "		</li>\n";
						
						# ADD NEW MODEL
						echo "		<li> <label for=\"addModel\">Add Aircraft:</label>\n";
						echo "		<select name=\"airfieldModelAdd\">\n";
						# include the drop down list
						include 'includes/getAirfieldCampaignModels.php'; 
						echo "		</select></li>\n";
						
						# NEW MODEL QUANTITY
						echo "		<li> <label for=\"airfieldModelAddQuantity\">Quantity:<br></label>\n";
						echo "		<input type=\"text\" name=\"airfieldModelAddQuantity\" id=\"airfieldModelAddQuantity\" value='$airfieldNumber' size=\"24\" maxlength=\"50\" />\n";
						echo "		</li>\n";
	
						# BUTTON
						echo "		<li><label for=\"submit\"></label>\n";
						echo "		<button type=\"submit\" name =\"updateAirfield\" id=\"submit\" value =\"5\" >Add Aircraft</button>\n";
						echo "		</li>\n";					
					echo "</fieldset>\n";		

					echo "<fieldset class=\"airfield\">\n";										
						# get coalition name and store to variable
						$getCoalName = "SELECT coalitionname FROM rof_coalitions WHERE coalID = '$airfieldCoalition'";
										
						if(!$coalName = $camp_link->query($getCoalName)){
							die('There was an error running the query ' . mysqli_error($camp_link));
						}
						# load results into variables 
						while ($coalObj = mysqli_fetch_object($coalName)) {
							$airfieldCoalitionName =($coalObj->coalitionname);
						}		
						
						# COALITION
						echo "		<li> <label class=\"grey\" for=\"airfieldCoalition\">Coalition:<br></label>\n";
						echo "		<input class=\"grey\" readonly=\"readonly\" type=\"text\" id=\"airfieldCoalition\" value='$airfieldCoalitionName' size=\"24\" maxlength=\"50\" />\n";
						# hidden field to hand CoalitionId over through POST
						echo "		<input readonly=\"readonly\" type=\"hidden\" name='airfieldCoalition' id=\"airfieldCoalition\" value='$airfieldCoalition'/>\n";
						echo "		</li>\n";
			
						# NEW COALITION
						echo "		<li> <label for=\"airfieldCoalitionNew\">Change Coalition:</label>\n";
						echo "		<select name=\"airfieldCoalitionNew\">\n";
						
						# include the drop down list
						include 'includes/getCampaignCoalitions.php'; 
						echo "		</select></li>\n";
						
						# BUTTON
						echo "		<li><label for=\"submit\"></label>\n";
						echo "		<button type=\"changeCoalition\" name=\"updateAirfield\" value =\"6\" id=\"submit\">Change Coalition</button>\n";
						echo "		</li>\n";	
										
						echo "</fieldset>\n";					
					echo "	</form>\n";

					# Close the camp_link connection
					mysqli_close($camp_link);		
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
