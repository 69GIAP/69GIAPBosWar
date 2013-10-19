<?php
	# include connect2CampaignFunction.php (defines connect2campaign($host,$user,$password,$db))
	 include ( 'functions/connect2Campaign.php' );
	unset($_SESSION['airfieldName']);
	
	# get camp db connection information
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
	$camp_link = connect2Campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
?>
			<!-- form for changing information in the users table -->
                <h3>Please select the airfield you want to modify:</h3>
				<form id="loginForm" name="delete" action="includes/airfieldSelect.php" method="post">
                    <fieldset id="inputs">
                        <select id="airfield" type="text" name="airfieldName" autofocus required>
	                        <?php include 'includes/getAirfieldCampaignInformation.php' ?>
                        </select>   
                    </fieldset>
                    
                    <fieldset id="actions">
                        <input type="submit" id="loginSubmit" value="Load Airfield Data">
                    </fieldset>
                </form>