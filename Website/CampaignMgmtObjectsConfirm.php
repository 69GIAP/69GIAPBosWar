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
				# include connect2CampaignFunction.php
				include ( 'functions/connect2Campaign.php' );
				
				# include getMinCountry.php
				include ( 'functions/getMinCountry.php' );
				
				# include getCampaignVariables.php
				include ('includes/getCampaignVariables.php');
				
				# use this information to connect to campaign 
				$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
												
				$query		= "";
				$active		= 1;
				
				# get POST variables and bind into idList variable
				foreach ($_POST as $param_name => $param_val) {
					
					// display POST information each by each for debugging purposes
					#echo "parameter Name: "	.$param_name."<br>parameter lenght: ".strlen($param_name)."<br>";
					#echo "parameter Value: ".$param_val."<br><br>";

					# distinguish between id variable and object_type variable to determine if object was activated by checkbox
					if (strlen($param_name)>3) {
						
						# I used this to prevent harcoded Country ids in case there are changes in future
						if ($param_val == 0) {
							$param_val	= 7; // Future
							$active		= 0; // used as handover to next query - otherwise coalition would overwrite inactive state
						}
						elseif ($param_val == 1) {
							$param_val	= 0; // Neutral
							$active		= 1; // used as handover to next query - otherwise coalition would not be applied
						}
						
						# use function to get CoalID	
						$objectCntryKey = get_mincountry("$param_val");
						# activate and deactivate object
						$query .= "UPDATE object_properties SET default_country = '$objectCntryKey' WHERE object_type like '$param_name' ;";
						
						// debugging
						#echo "activate/deactivate<br>";

					}
					else {
						if ($active	== 0) {
							$objectCntryKey = 600; // Future
							# change coalition for object
							$query .= "UPDATE object_properties SET default_country = '$objectCntryKey' WHERE id = '$param_name' ;";
						}
						else {
							# use function to get CoalID
							$objectCntryKey = get_mincountry("$param_val");
							# change coalition for object
							$query .= "UPDATE object_properties SET default_country = '$objectCntryKey' WHERE id = '$param_name' ;";
						}
						// debugging
						#echo "change coalition<br>";
					}
				}
#echo $query."<br>";				
#exit;			
				/* execute multi query */
				if ($camp_link->multi_query($query)) {
					do {
						/* store first result set */
						if ($result = $camp_link->store_result()) {
							// do nothing as we don't expect feedback
							$result->free();
						}
					// need to include more_results to avoid strict checking warning
					} while ($camp_link->more_results() && $camp_link->next_result());
				}
				if ($camp_link->errno) { 
					echo "CampaignMgmtCreateConfirm multi_query execution ended prematurely.<br>\n";
					var_dump($camp_link->error); 
				}
				
				// close $camp_link
				$camp_link->close();
				
				$objectClass = $_SESSION['objectClass'];
				# start form
				echo "<form id=\"campaignMgmtForm\" name=\"objectSetup\" action=\"CampaignMgmtObjects.php?btn=campStp&sde=camp$objectClass\" method=\"post\">\n";
				echo "<fieldset id=\"actions\">\n";	
				echo "		<button type=\"submit\" id=\"back\" value ='$objectClass' >Next</button>\n";
				echo "	</fieldset>\n";		


#echo $query;				
#exit;	
//				header ("Location: CampaignMgmtObjects.php?btn=campStp&objectClass=$objectClass");

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
