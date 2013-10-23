<?php
// Get Countries and their coalitions
// out of boswar_db
// 69giapmyata
// ver 1.0

				
	$sql = "SELECT countryname FROM rof_countries";
	$i = 1;
	
	#echo $sql;
	echo "		<!-- Checkboxes for country and coalition selection -->\n";
	if(!$result = $dbc->query($sql)){
		die('There was an error running the query ' . mysqli_error($dbc));
	}
	
	echo "<h3>Countrys and Coalitions</h3>\n";	
	echo "<div class=\"checkboxWrapper\">\n";

	# load results into variables 
	while ($obj = mysqli_fetch_object($result)) {
		$countryName		=($obj->countryname);
		echo "<div class=\"checkbox\">\n";		
		echo "		<input id=\"checkboxCountry$i\" type=\"checkbox\" name =\"add$i\" value =\"$countryName\">\n";
		echo "		<label for=\"checkboxCountry$i\"><b>$countryName</b></label><br \>\n";
		echo "</div>\n";		
		# COALITION RADIO BOX
		echo "<div class=\"radio\">\n";  
		echo "	<input id=\"ententeCountry$i\" type=\"radio\" name=\"radiobox$i\" value=\"1\">  \n";
		echo "	<label for=\"ententeCountry$i\">Entente</label>  \n";
		echo "	<input id=\"centerCountry$i\" type=\"radio\" name=\"radiobox$i\" value=\"2\">  \n";
		echo "	<label for=\"centerCountry$i\">Center</label> \n"; 
		echo "</div>\n";
	$i ++;
	}
	echo "</div>\n";

?>

