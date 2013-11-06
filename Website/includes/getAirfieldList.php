// Get airfields information
// case user is neutral (coalId 0 = campaign admin) display full list
// case use is assigned to a coalition (any other coaId) display filtered list
// 69giapmyata
// ver 1.2
<?php
					
	# use this information to connect to campaign 
	$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
	$userCoalId = $_SESSION['userCoalId'];
	
	# get only airfields having the right coalition and all neutral airfields
	if ($userCoalId == "0")
		{$sql = "SELECT airfield_Name
				FROM airfields
				GROUP BY airfield_Name
				ORDER BY airfield_Name ";}
	else
	# get only airfields having the right coalition and all neutral airfields
		{$sql = "SELECT airfield_Name
				FROM airfields 
				WHERE airfield_Coalition = $userCoalId
				GROUP BY airfield_Name 
				ORDER BY airfield_Name";}
	#echo $sql;

	if(!$result = $camp_link->query($sql)){
		die('There was an error running the query ' . mysqli_error($camp_link));
	}
	
	echo "<option value=\"\" disabled selected>Select Airfield</option>\n";
	# load results into variables 
	while ($obj = mysqli_fetch_object($result)) {
		$airfieldName		=($obj->airfield_Name);
		# using TUSHKAS hack to provide multiple variables with one
		echo "<option value=\"". $airfieldName."\">". $airfieldName. "</option>\n";		
	}	
?>
