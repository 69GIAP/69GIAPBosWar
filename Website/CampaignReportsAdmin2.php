<?php 

# Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
	
# Include the webside header
include ( 'includes/header.php' );
	
# Include the navigation on top
include ( 'includes/navigation.php' );

#  include connect2CampaignFunction.php (defines connect2campaign())
include ( 'functions/connect2Campaign.php' );

?>

	<div id="wrapper">

        <div id="container">
        
	    	<div id="content">
        		
               <h2>Campaign Reports Administration 2</h2>
				<?php
					# This redirects the user to the Login screen if he gets here and is not logged on
					include ( 'includes/errorNotLoggedOn.php' );
					
					$camp_db = $_SESSION['camp_db'];
					$loadedCampaign = $camp_db;
					
					$StatsCommand = $_POST['StatsCommand'];
					$LOGFILE = $_POST['LOGFILE'];
					
					# use $camp_db to get remaining variables
					$query = "SELECT * from campaign_settings where camp_db = '$camp_db'";   
					if(!$result = $dbc->query($query)) {
					   die('There was an error running the query [' . $dbc->error . ']');
					}
					
					if ($result = $dbc->query($query)) { /* fetch associative array */
					   while ($obj = $result->fetch_object()) {
						  $campaign	=($obj->campaign);
						  $camp_host	=($obj->camp_host);
						  $camp_user	=($obj->camp_user);
						  $camp_passwd	=($obj->camp_passwd);
					   }
					} 
														
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$camp_db");
					
					# reuse query, but with camp_db
					if(!$result = $camp_link->query($query)) {
						echo "$query<br />\n";
					   die('CampaignReportsAdmin2 query error: [' . $camp_link->error . ']');
					}
					
					if ($result = $camp_link->query($query)) { /* fetch associative array */
					   while ($obj = $result->fetch_object()) {
						  $logpath	=($obj->logpath);
						  $log_prefix	=($obj->log_prefix);
					   }
					}
					
					# include parse_log.php
					include ( 'parse_log.php' );
					
										
					# Close the camp_link connection
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
	# Close the dbc connection
	mysqli_close($dbc);

	# Include the footer
	include ( "includes/footer.php" );
?>
