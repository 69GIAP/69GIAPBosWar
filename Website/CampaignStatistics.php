<?php 

# Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
	
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

#  include connect2Campaign.php (defines connect2campaign())
	include ( 'functions/connect2Campaign.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
				<?php
					// If selected, $existing contains host, user, and passwd
					$camp_db_mission = $_POST['camp_db_mission'];
					// check to see if 'existing' was the selected option
					if ($camp_db_mission) { // camp_db_mission if not empty
						// split 'existing' into 2 parts at the '+'
						$Part = explode('+',$camp_db_mission,2);
						$camp_db		= $Part[0];
						$MissionID		= $Part[1];
					}

                    # get campaign database name from previous POST.
                    # if no radio button was selected
                    if (empty($camp_db)) {
                        header ("Location: IndexBosWarRofWar.php?btn=home");
                    	}

                    # use it to get remaining variables
                    $query = "SELECT * from campaign_settings where camp_db = '$camp_db'";   
                    if(!$result = $dbc->query($query)) {
                        die('There was an error running the query [' . $dbc->error . ']');
                        }
                    
                    if ($result = $dbc->query($query)) {
                            /* fetch associative array */
                            while ($obj = $result->fetch_object()) {
                            $camp_host		=($obj->camp_host);
                            $camp_user		=($obj->camp_user);
                            $camp_passwd	=($obj->camp_passwd);
                            $campaign		=($obj->campaign);
                        }
                    } 
                
                    # use this information to connect to campaign 
                    $camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$camp_db");
                    # print header
                    print "<h2>Statistics for the '$campaign' campaign.</h2>";
                    # do whatever is needed from the campaign database

					include ( 'includes/statisticsLoad.php' );
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
	include ( 'includes/footer.php' );
?>
