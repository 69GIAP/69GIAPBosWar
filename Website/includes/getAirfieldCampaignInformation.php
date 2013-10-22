// Get airfields information
// case user is neutral (coalId 0) display full list
// case use is assigned to a coalition (any other coaId) display filtered list
// 69giapmyata
// ver 1.2
<?php
					
	# use this information to connect to campaign 
	$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
	
	# get data from test_airfield table dependent on selection
	if ($userCoalId == "0")
		{$sql = "SELECT * FROM airfields group by af_Name";}
	else
	# get only airfields having the right coalition and all neutral airfields
		{$sql = "SELECT * FROM airfields WHERE af_Country = $userCoalId OR af_Country = \"0\" group by af_Name";}
	#echo $sql;

	if(!$result = $camp_link->query($sql)){
		die('There was an error running the query ' . mysqli_error($camp_link));
	}
	
	echo "<option value=\"\" disabled selected>Select Airfield</option>\n";
	# load results into variables 
	while ($obj = mysqli_fetch_object($result)) {
		$airfieldName		=($obj->af_Name);
		$airfieldCoalition	=($obj->af_Country);
		#$airfieldModel		=($obj->model);
		#$airfieldNumber		=($obj->number);
		echo "<option value=\"". $airfieldName. "\">". $airfieldName. "</option>\n";		
	}	
?>
