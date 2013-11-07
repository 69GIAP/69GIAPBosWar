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
				
				# include getCampaignVariables.php
				include ('includes/getCampaignVariables.php');
				
				# use this information to connect to campaign 
				$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
												
				$query	= "";
				
				# get POST variables and bind into idList variable
				foreach ($_POST as $param_name => $param_val) {
					#echo $param_name." lenght: ".strlen($param_name)."<br>";
					#echo $param_val."<br><br>";
					
					# distinguish between id variable and object_type variable to determine if object is activated by checkbox
					if (strlen($param_name)>3) {
						# activate and deactivate object
						$query .= "UPDATE rof_object_properties SET active = $param_val WHERE object_type like '$param_name' ;";
					}
					else {
						# change coalition for object
						$query .= "UPDATE rof_object_properties SET coalition = $param_val WHERE id = '$param_name' ;";
					}
				}
				
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

				header ("Location: CampaignMgmtObjects.php?btn=campMgmt&objectClass=$objectClass");

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
