<?php 

# Incorporate the MySQL connection script.
require ( '../connect_db.php' );
	
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
					
					if ($result = mysqli_query($dbc, $query)) { /* fetch associative array */
					   while ($obj = mysqli_fetch_object($result)) {
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
					   die('There was an error running the query [' . $camp_link->error . ']');
					}
					
					if ($result = mysqli_query($camp_link, $query)) { /* fetch associative array */
					   while ($obj = mysqli_fetch_object($result)) {
						  $logpath	=($obj->logpath);
						  $log_prefix	=($obj->log_prefix);
					   }
					}
					
					# include rof_parse_log.php for development purposes
					include ( 'rof_parse_log.php' );
					
										
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
	# Close the dbc connection
	mysqli_close($dbc);

	# Include the footer
	include ( "includes/footer.php" );
?>
