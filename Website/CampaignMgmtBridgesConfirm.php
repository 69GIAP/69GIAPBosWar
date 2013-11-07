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
					if ($param_val == 1) {
						# activate bridge
						$query .= "UPDATE bridges SET bridge_damage_1 = 0, bridge_damage_2 = 0, bridge_damage_3 = 0, bridge_damage_4 = 0, bridge_damage_5 = 0, 
						bridge_damage_6 = 0, bridge_damage_7 = 0, bridge_damage_8 = 0, bridge_damage_9 = 0, bridge_damage_10 = 0 WHERE bridge_name like '$param_name' ;";
					}
					else {
						# change bridge status to inoperatable
						$query .= "UPDATE bridges SET bridge_damage_1 = 1, bridge_damage_2 = 1, bridge_damage_3 = 1, bridge_damage_4 = 1, bridge_damage_5 = 1, 
						bridge_damage_6 = 1, bridge_damage_7 = 1, bridge_damage_8 = 1, bridge_damage_9 = 1, bridge_damage_10 = 1 WHERE bridge_name like '$param_name' ;";
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
				
				header ("Location: CampaignMgmtBridges.php?btn=campMgmt");

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