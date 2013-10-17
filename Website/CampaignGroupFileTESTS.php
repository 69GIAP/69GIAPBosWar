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
				
                	# This redirects the user to the Login screen if he tries to press a button and is not logged on
					include ( 'includes/errorNotLoggedOn.php' );
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
					
					$state = $_GET['state'];
					# test 1
					if ($state == 1)
					{include ( 'missionplanningPackage/testdataintocol_10.php' );}
					if ($state == 2)
					{include ( 'missionplanningPackage/testdataintostatic.php' );}
					if ($state == 3)
					{include ( 'missionplanningPackage/col_10_to_template.php' );}
					if ($state == 4)
					{include ( 'missionplanningPackage/template_to_col_10.php' );}
					if ($state == 5)
					{include ( 'missionplanningPackage/Col_10_to_m1.php' );}
					if ($state == 6)
					{include ( 'missionplanningPackage/Mission_to_editor.php' );}
					if ($state == 7)
					{include ( 'missionplanningPackage/mission_back.php' );}
					if ($state == 8)
					{include ( 'missionplanningPackage/mission_write.php' );}
					# test 2
					if ($state == 9)
					{include ( 'missionplanningPackage/static_to_template.php' );}
					if ($state == 10)
					{include ( 'missionplanningPackage/template_to_static.php' );}
					if ($state == 11)
					{include ( 'missionplanningPackage/static_to_m1.php' );}
					if ($state == 12)
					{include ( 'missionplanningPackage/static_mission_to_editor.php ' );}
					if ($state == 13)
					{include ( 'missionplanningPackage/static_mission_back.php' );}
					if ($state == 14)
					{include ( 'missionplanningPackage/static_mission_write.php' );}
					# test 3
					if ($state == 15)
					{include ( 'missionplanningPackage/template_to_bridges.php' );}
					
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
