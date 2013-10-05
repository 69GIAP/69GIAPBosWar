<?php
// Get Master airfields information
// out of boswar_db
// 69giapmyata
// ver 1.0

				
	$sql = "SELECT model FROM rof_models";
	$i = 1;
	
	#echo $sql;
	echo "		<!-- Checkboxes for model selection -->\n";
	if(!$result = $dbc->query($sql)){
		die('There was an error running the query ' . mysqli_error($dbc));
	}
	
	echo "<h3>Campaign Plane Set</h3>\n";	
	echo "<div class=\"checkboxWrapper\">\n";

	# load results into variables 
	while ($obj = mysqli_fetch_object($result)) {
		$modelName		=($obj->model);
		echo "<div class=\"checkbox\">\n";		
		echo "		<input id=\"checkboxModel$i\" type=\"checkbox\" name =\"add$i\" value =\"$modelName\">\n";
		echo "		<label for=\"checkboxModel$i\"><b>$modelName</b></label><br \>\n";
		echo "</div>\n";		
		# COALITION RADIO BOX
		echo "<div class=\"radio\">\n";  
		echo "	<input id=\"ententeModel$i\" type=\"radio\" name=\"radiobox$i\" value=\"1\">  \n";
		echo "	<label for=\"ententeModel$i\">Entente</label>  \n";
		echo "	<input id=\"centerModel$i\" type=\"radio\" name=\"radiobox$i\" value=\"2\">  \n";
		echo "	<label for=\"centerModel$i\">Center</label> \n"; 
		echo "</div>\n";
	$i ++;
	}
	echo "</div>\n";

?>

