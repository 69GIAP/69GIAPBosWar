<?php
// Get Master airfields information
// out of boswar_db
// 69giapmyata
// ver 1.0

				
	$sql = "SELECT af_Name FROM rof_airfields";
	$i = 1;
	
	#echo $sql;
	echo "		<!-- Checkboxes for airfield selection -->\n";
	if(!$result = $dbc->query($sql)){
		die('There was an error running the query ' . mysqli_error($dbc));
	}
	
	echo "<h3>Campaign Airfield Set</h3>\n";	
	echo "<div class=\"checkboxWrapper\">\n";

	# load results into variables 
	while ($obj = mysqli_fetch_object($result)) {
		$airfieldName		=($obj->af_Name);

		echo "<div class=\"checkbox\">\n";		
		echo "		<input id=\"checkboxAirfield$i\" type=\"checkbox\" name =\"add$i\" value =\"$airfieldName\">\n";
		echo "		<label for=\"checkboxAirfield$i\"><b>$airfieldName</b></label><br \>\n";
		echo "</div>\n";		
		# COALITION RADIO BOX
		echo "<div class=\"radio\">\n";  
		echo "	<input id=\"ententAirfielde$i\" type=\"radio\" name=\"radiobox$i\" value=\"1\">  \n";
		echo "	<label for=\"ententAirfielde$i\">Entente</label>  \n";
		echo "	<input id=\"centerAirfield$i\" type=\"radio\" name=\"radiobox$i\" value=\"2\">  \n";
		echo "	<label for=\"centerAirfield$i\">Center</label> \n"; 
		echo "</div>\n";
	$i ++;
	}
	echo "</div>\n";

?>

