<?php
// Get Master objects information
// out of boswar_db for initial selection
// 69giapmyata
// ver 1.0

				
	$sql = "SELECT id FROM rof_object_properties
			WHERE object_class ='$objectClass'";
	$i = 1;
	
	#echo $sql;
	echo "		<!-- Checkboxes for model selection -->\n";
	if(!$result = $dbc->query($sql)){
		die('There was an error running the query ' . mysqli_error($dbc));
	}
	
	echo "<h3>Campaign Object Set</h3>\n";	
	echo "<div class=\"checkboxWrapper\">\n";

	# load results into variables 
	while ($obj = mysqli_fetch_object($result)) {
		$objectId		=($obj->id);
		
		echo "<div class=\"checkbox\">\n";		
		echo "		<input id=\"objectId_$i\" type=\"checkbox\" name ='$objectId' value =\"$objectId\">\n";
		echo "		<label for=\"objectId_$i\"><b>$objectName</b></label><br \>\n";
		echo "</div>\n";
				
		# COALITION RADIO BOX
		echo "<div class=\"radio\">\n";  
		
		echo "	<input id=\"ententeModel$i\" type=\"radio\" name=\"$objectId\" value=\"1\">  \n";
		echo "	<label for=\"ententeModel$i\">Entente</label>  \n";
		
		echo "	<input id=\"centerModel$i\" type=\"radio\" name=\"$objectId\" value=\"2\">  \n";
		echo "	<label for=\"centerModel$i\">Center</label> \n"; 
		
		echo "</div>\n";
		
		$i ++;
	}
	echo "</div>\n";

?>

