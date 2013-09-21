// Get airfields information and create pulldown
// 69giapmyata
// ver 1.1
<?php
					
	# use this information to connect to campaign 
	$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
	
	# get data from test_airfield table dependent on selection
	$sql = "SELECT * FROM test_airfields";
	#echo $sql;

	if(!$result = $camp_link->query($sql)){
		die('There was an error running the query ' . mysqli_error($dbc));
	}
	# load results into variables 
	while ($obj = mysqli_fetch_object($result)) {
		$airfieldName		=($obj->name);
		$airfieldCoalition	=($obj->coalition);
		$airfieldModel		=($obj->model);
		$airfieldNumber		=($obj->number);
		echo "<option value=\"". $airfieldName. "\">". $airfieldName. "</option>\n";		
	}	
?>
