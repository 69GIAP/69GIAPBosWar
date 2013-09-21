<?php
	# include connect2CampaignFunction.php (defines connect2campaign($host,$user,$password,$db))
	 include ( 'functions/connect2Campaign.php' );
	
	# get camp db connection information
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
?>
			<!-- form for changing information in the users table -->
                <h3>Please select the airfield you want to modify:</h3>
                <fieldset class="UserMgmt">
                    <form name="delete" action="airfieldManagementChange.php" method="post">
                        <ul>
                            <li><label for="airfieldName">Airfield Name</label>
                                <select name="airfieldName">
                                    <?php include 'includes/getAirfieldCampaignInformation.php' ?>
                                </select>
                            </li>
                                                                          
                            <li><label for="modify"></label>
                                <button type="modify" >Load Airfield Data</button></li>
                                                      
                        </ul>
                    </form>
                </fieldset>