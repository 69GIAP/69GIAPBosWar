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
				# get the  object you want to list on this page
				$objectClass = $_GET['objectClass'];
				
				# include connect2CampaignFunction.php
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
						$camp_status_id=($obj->status);
						
						# get campaign status
						$sql="SELECT campaign_status FROM campaign_status where id = $camp_status_id";
						if ($result = mysqli_query($dbc, $sql)) {
						/* fetch associative array */
						while ($obj = mysqli_fetch_object($result)) {
							$camp_status=($obj->campaign_status);
							}
						}
					}
				} 
								
				# use this information to connect to campaign 
				$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

                echo "<p>For a new campaign we should be able to restrict the Objects like plane models availiable. <br>
				This screen will list all the availiable objects based on the selection in the side menu. <br>
				We will then be able to select those that are not availiable and adjust points values for those that are availiable.</p>
				<p>The update screen is not needed for Alpha or Beta test.</p>\n";
                
				# start form
				echo "<form id=\"campaignMgmtForm\" name=\"objectSetup\" action=\"CampaignMgmtObjectsConfirm.php\" method=\"post\">\n";
				
				# get the master aircraft model list
                include ('includes/getMasterObjectInformation.php');
				
				# BUTTON
				echo "<fieldset id=\"actions\">\n";	
				echo "		<button type=\"submit\" id=\"loginSubmit\" value ='$objectClass' >Apply</button>\n";
				echo "	</fieldset>\n";
				
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
	# Include the footer
	include ( 'includes/footer.php' );
?>
