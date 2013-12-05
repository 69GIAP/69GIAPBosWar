<?php
	$query = "SELECT * from campaign_settings where camp_db = '$loadedCampaign'";  
	
	if(!$result = $dbc->query($query)) {
		die('There was an error running the query [' . $dbc->error . ']');
	}
	
	if ($result = $dbc->query($query)) {
		/* fetch associative array */
		while ($obj = $result->fetch_object()) {
			$campaign		=($obj->campaign);
			$abbrv			=($obj->abbrv);
			$camp_host		=($obj->camp_host);
			$camp_user		=($obj->camp_user);
			$camp_passwd	=($obj->camp_passwd);
			$camp_status_id	=($obj->status);
			
			# get campaign status
			$sql="SELECT campaign_status FROM campaign_status where id = $camp_status_id";
			if ($result = $dbc->query($sql)) {
			/* fetch associative array */
			while ($obj = $result->fetch_object()) {
				$camp_status=($obj->campaign_status);
				}
			}
		}
	} 
	# free result set
	$result->close();
?>
