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
        		
				<h1>Campaign Reports Administration</h1>
				<?php
					# This redirects the user to the Login screen if he gets here and is not logged on
					include ( 'includes/errorNotLoggedOn.php' );
					
					$camp_db = $_SESSION['camp_db'];
					$loadedCampaign = $camp_db;
					
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
					   die('There was an error running the query [' . $camp_link->error . ']');
					}
					
					if ($result = $camp_link->query($query)) { /* fetch associative array */
					   while ($obj = $result->fetch_object()) {
						  $logpath	=($obj->logpath);
						  $log_prefix	=($obj->log_prefix);
					   }
					}
					
					print "<form action = \"CampaignReportsAdmin2.php?btn=postMsn&sde=lgPrsr\", method=post>\n";
					echo "<h2>Managing reports and statistics for $campaign</h2><br>\n";
                ?>

                <p>Run report AND</p>
                <div class="radio">
                <p>
                      <input id="checked" type="radio" name="StatsCommand" value = "ignore" checked="checked"> 
                      <label for="checked">Do NOT do mission stats</label>
                </p><p>
                      <input id="do" type="radio" name="StatsCommand" value = "do">
                      <label for="do">DO mission stats</label> 
                </p><p>
                      <input id="undo" type="radio" name="StatsCommand" value = "undo">
                      <label for="undo">UNDO mission stats</label>  
                </p>
                </div>

				<?php // and back to php!
					print "<select name=\"LOGFILE\">\n";
					
					// get list of files as array, removing '.' and '..' from the list
					$files=array_diff(scandir($logpath), array('.','..'));
					
					// sort the array in natural fashion
					natsort($files);
					
					// print the list of files that begins with $log_prefix
					// make each an element of a pulldown list
					echo "<option value=\"\">Select logfile to work on</option>\n";
					while (list ($key, $value) = each ($files)) {
					   if (preg_match("/^$log_prefix/","$value")) {
						  echo "<option value=\"$value\">$value</option>\n";
					   }
					}
					
					echo "</p><input type=\"submit\" value=\"Go\"><br>\n";
					
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
	$dbc->close();

	# Include the footer
	include ( "includes/footer.php" );
?>
