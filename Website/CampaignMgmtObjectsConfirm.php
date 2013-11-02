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
				
				$query	= '';
				
				# get POST variables and bind into idList variable
				foreach ($_POST as $param_name => $param_val) {

					$query .= "UPDATE rof_object_properties SET active = 1, coalition = $param_val WHERE id = $param_name ;<br>\n";

				}

				#echo $query;
                
				/* execute multi query */
				if ($camp_link->multi_query($query)) {
					do {
						/* store first result set */
						if ($result = $camp_link->store_result()) {
							// do nothing as we don't expect feedback
							$result->free();
						}
					// need to include more_results to avoid strict checking warning
					} while ($dbc->more_results() && $camp_link->next_result());
				}
				if ($camp_link->errno) { 
					echo "CampaignMgmtCreateConfirm multi_query execution ended prematurely.\n";
					var_dump($camp_link->error); 
				}

				header("Location: CampaignMgmtObjects.php?btn=campMgmt&objectClass=PFI");
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
