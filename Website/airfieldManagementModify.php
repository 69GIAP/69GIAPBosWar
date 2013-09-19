<?php 

# Incorporate the MySQL debug script.
	require ( 'includes/debug.php' );

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
					include ( 'includes/connect2CampaignFunction.php' );
					
					# use it to get remaining variables
					$query = "SELECT * from campaign_settings where camp_db = '$loadedCampaign'";   
					if(!$result = $camp_link->query($query)) {
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

					# airield name from selection form
						$airfieldName = $_POST["airfieldName"];			

					# get data from test_airfield table dependent on selection
						$sql = "SELECT * FROM test_airfields WHERE name = $airfieldName";
						
						if(!$result = $camp_link->query($sql)){
						die('There was an error running the query ' . mysqli_error($dbc));
						}
						# load results into variables 
						while ($obj = mysqli_fetch_object($result)) 
							{
								$airfieldName		=($obj->name);
								$airfieldCoalition	=($obj->coalition);
								$airfieldModel		=($obj->model);
								$airfieldNumber		=($obj->number);
								# print results				
								echo $airfieldName;
								echo $airfieldCoalition;
								echo $airfieldModel;
								echo $airfieldNumber;
							}
							
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