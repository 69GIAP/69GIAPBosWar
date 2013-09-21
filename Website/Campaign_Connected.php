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
        		
               <h2>Campaign Connected</h2>
				<?php
                
					# This redirects the user to the Login screen if he gets here and is not logged on
					include ( 'includes/errorNotLoggedOn.php' );
										
					# get campaign database name from previous POST.
					$_SESSION['camp_db'] = $_POST["db"];
					$camp_db = $_SESSION['camp_db'];
					# load display variable $loadedCampaign with new value to avoid display delay by one extra page change
					# the additional variable for teh visual feedback is required as $camp-db is also used to fill dropdows and this conflicts
					# on page change - display would be reset to lates loaded information in the dropdown!
					$loadedCampaign = $camp_db;
					
					echo "<p>The chosen campaign is stored to the SESSION variable \$_SESSION['camp_db'] and can be reused from now on to work with it.</p>\n";
					
					echo "<p>Currectly the variable is filled with <b>$camp_db</b>.</p>\n";
									
					# use it to get remaining variables
					$query = "SELECT * from campaign_settings where camp_db = '$camp_db'";   
					if(!$result = $dbc->query($query)) {
						die('There was an error running the query [' . $dbc->error . ']');
					}
										
					if ($result = mysqli_query($dbc, $query)) {
						/* fetch associative array */
						while ($obj = mysqli_fetch_object($result)) {
							$campaign		=($obj->campaign);
							$camp_host		=($obj->camp_host);
							$camp_user		=($obj->camp_user);
							$camp_passwd	=($obj->camp_passwd);
						}
					} 
									
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$camp_db");
									
					# do whatever is needed from the campaign database
					print "<h2>Processing statistics for $campaign</h2><br>\n";
					print "We won't actually do this in the release, but this provides a sandbox for integrating the parser with the campaign database.<br>\n";
					
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
