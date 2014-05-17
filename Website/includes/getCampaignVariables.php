
<?php
# Stenka 23/4/14
# added more campaign variables

	if (empty($loadedCampaign)) {
		return;
	}
	
	$query = "SELECT * from campaign_settings where camp_db = '$loadedCampaign'";  
	
	if(!$result = $dbc->query($query)) {
		die('There was an error running the query [' . $dbc->error . ']');
	}
	
	if ($result = $dbc->query($query)) {
		/* fetch associative array */
		while ($obj = $result->fetch_object()) {
			$simulation	=($obj->simulation);
			$campaign		=($obj->campaign);
			$abbrv			=($obj->abbrv);
			$camp_host		=($obj->camp_host);
			$camp_user		=($obj->camp_user);
			$camp_passwd	=($obj->camp_passwd);
			$camp_status_id	=($obj->status);

			$air_detect_distance		=($obj->air_detect_distance);
			$ground_detect_distance	=($obj->ground_detect_distance);
			$air_ai_level				=($obj->air_ai_level);
			$ground_ai_level			=($obj->ground_ai_level);
			$ground_max_speed_kmh	=($obj->ground_max_speed_kmh);
			$ground_transport_speed_kmh	=($obj->ground_transport_speed_kmh);
			$ground_spacing			=($obj->ground_spacing);
			$lineup_minutes			=($obj->lineup_minutes);
			$mission_minutes			=($obj->mission_minutes);
			$detect_off_time			=($obj->detect_off_time);
			
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
