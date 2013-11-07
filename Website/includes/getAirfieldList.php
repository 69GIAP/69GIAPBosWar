// Get airfields information
// case user is admin display full list
// case user is commander display filtered list
// 69giapmyata
// ver 1.3
<?php
					
	# use this information to connect to campaign 
	$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

	# queries filtered due to role
	if ($userRole == 'administrator') {
		# get only airfields having the right coalition and all neutral airfields
		$sql = "SELECT airfield_Name, airfield_Enabled
				FROM airfields
				GROUP BY airfield_Name
				ORDER BY airfield_Enabled DESC, airfield_Name ";
		}
				
	elseif ($userRole == 'commander') {
		# get only airfields having the right coalition
		$sql = "SELECT airfield_Name, airfield_Enabled
				FROM airfields 
				WHERE airfield_Coalition like $userCoalId
				GROUP BY airfield_Name 
				ORDER BY airfield_Name";
		}

	# check connection to database
	if(!$result = $camp_link->query($sql)){
		die('There was an error running the query ' . mysqli_error($camp_link));
		}

	# check content of variabel $state
	if ($state == 'Active') {

		# build OptGroup header 
		echo "<optgroup label=\"$state Fields\">\n";
		
		# build active fileds group
		while ($obj = mysqli_fetch_object($result)) {
			$airfieldName 		=($obj->airfield_Name);
			$airfieldEnabled	=($obj->airfield_Enabled);
		
			if ($airfieldEnabled == 1) {
				echo "<option value=\"". $airfieldName."\">". $airfieldName. "</option>\n";
			}
		}
	echo "</optgroup>\n";
	}
		
	# check content of variabel $state
	if ($state == 'Inactive') {

		# build OptGroup header 
		echo "<optgroup label=\"$state Fields\">\n";
		
		# build active fileds group
		while ($obj = mysqli_fetch_object($result)) {
			$airfieldName 		=($obj->airfield_Name);
			$airfieldEnabled	=($obj->airfield_Enabled);
		
			if ($airfieldEnabled == 0) {
				echo "<option value=\"". $airfieldName."\">". $airfieldName. "</option>\n";
			}
		}
	echo "</optgroup>\n";
	}

?>
