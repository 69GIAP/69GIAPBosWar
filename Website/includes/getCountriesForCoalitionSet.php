<?php
// Get Countries and their coalitions
// out of boswar_db
// 69giapmyata and =69.GIAP=TUSHKA
// Oct 24, 2013
// ver 1.1

// use $camp_link rather than $dbc
// get coalition names from coalition table rather than hard-wiring them
// coalitions 1 and 2 are all we will offer
$query = "SELECT * FROM rof_coalitions";
	if(!$result = $camp_link->query($query)){
		die('There was an error running the query ' . mysqli_error($dbc));
	}
	while ($obj = mysqli_fetch_object($result)) {
		if (($obj->CoalID) == 1 ) {
			$coal_name1=($obj->Coalitionname);
		} elseif (($obj->CoalID) == 2) {
			$coal_name2 =($obj->Coalitionname);
		}
	}

	$sql = "SELECT * FROM rof_countries WHERE ckey > 1 AND ckey < 600";
	$i = 1;
	
	#echo $sql;
	echo "		<!-- Checkboxes for country and coalition selection -->\n";
	if(!$result = $camp_link->query($sql)){
		die('There was an error running the query ' . mysqli_error($dbc));
	}
	
	echo "<h3>Countrys and Coalitions</h3>\n";	
	echo "<div class=\"checkboxWrapper\">\n";

	# load results into variables 
	while ($obj = mysqli_fetch_object($result)) {
		$countryName		=($obj->countryname);
		$CoalID			=($obj->CoalID);
		echo "<div class=\"checkbox\">\n";		
		echo "		<input id=\"checkboxCountry$i\" type=\"checkbox\" name =\"add$i\" value =\"$countryName\">\n";
		echo "		<label for=\"checkboxCountry$i\"><b>$countryName</b></label><br \>\n";
		echo "</div>\n";		
		# COALITION RADIO BOX
		echo "<div class=\"radio\">\n";  
		if ($CoalID == 1){
		echo "	<input id=\"ententeCountry$i\" type=\"radio\" name=\"radiobox$i\" value=\"1\" checked=\"checked\">  \n";
		echo "	<label for=\"ententeCountry$i\">$coal_name1</label>  \n";
		echo "	<input id=\"centerCountry$i\" type=\"radio\" name=\"radiobox$i\" value=\"2\">  \n";
		echo "	<label for=\"centerCountry$i\">$coal_name2</label> \n"; 
		} else {
		echo "	<input id=\"ententeCountry$i\" type=\"radio\" name=\"radiobox$i\" value=\"1\">  \n";
		echo "	<label for=\"ententeCountry$i\">$coal_name1</label>  \n";
		echo "	<input id=\"centerCountry$i\" type=\"radio\" name=\"radiobox$i\" value=\"2\" checked=\"checked\">  \n";
		echo "	<label for=\"centerCountry$i\">$coal_name2</label> \n"; 
		}

		echo "</div>\n";
	$i ++;
	}
	echo "</div>\n";
	// free result set
	mysqli_free_result($result);
?>

