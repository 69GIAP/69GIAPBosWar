<?php 
# creates a new session for tracking the user is logged on 
	session_start(); 

# Incorporate the MySQL debug script.
	require ( 'includes/debug.php' );

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
	
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

#  include connect2CampaignFunction.php (defines connect2campaign())
	include ( 'includes/connect2CampaignFunction.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
<?php
    # get campaign database name from previous POST.
       $camp_db = $_POST["db"];

    # use it to get remaining variables
	$query = "SELECT * from campaign_settings where camp_db = '$camp_db'";   
	if(!$result = $dbc->query($query)) {
		die('There was an error running the query [' . $dbc->error . ']');
       	}
	
	if ($result = mysqli_query($dbc, $query)) {
        	/* fetch associative array */
       		while ($obj = mysqli_fetch_object($result)) {
			$camp_host	=($obj->camp_host);
			$camp_user	=($obj->camp_user);
			$camp_passwd	=($obj->camp_passwd);
			$campaign	=($obj->campaign);
		}
	} 

	# use this information to connect to campaign 
	$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$camp_db");
	# print header
        print "<h1>$campaign Statistics</h1><br>";
	# do whatever is needed from the campaign database

	# Close the camp_link connection
	mysqli_close($camp_link);
?>

                <?php
					include ( 'includes/test_stat_load.php' );			  
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
	include ( 'includes/footer.php' );
?>
