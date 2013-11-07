<?php
// Get objects information 
// out of campaign DB
// 69giapmyata
// ver 1.0

	# add percent to allow like query
	$_SESSION['objectClass'] = $objectClass;
	
	$sql = "SELECT id, object_type, object_desc, active, coalition
			FROM rof_object_properties
			WHERE object_class like '$objectClass%'";
		
	$i = 1;
	
	#echo $sql;
	echo "		<!-- Checkboxes for model selection -->\n";
	if(!$result = $camp_link->query($sql)){
		die('There was an error running the query ' . mysqli_error($camp_link));
	}
	
	echo "<h3>Campaign Object Set</h3>\n";	
	echo "<div class=\"checkboxWrapper\">\n";

	# load results into variables 
	while ($obj = mysqli_fetch_object($result)) {
		$objectId		=($obj->id);
		$objectName		=($obj->object_type);
		$objectStatus	=($obj->active);
		$objectCoalition=($obj->coalition);
		
		echo "<div class=\"checkbox\">\n";
		if	($objectStatus == 1) {
			echo "		<p><b>$objectName</b></p>\n";
			echo "		<input class =\"special\" id=\"objectIdActive_$i\" type=\"radio\" name ='$objectName' value =\"1\" checked>\n";
			echo "		<label class =\"special\" for=\"objectIdActive_$i\">active</label>\n";
			
			echo "		<input class =\"special\" id=\"objectIdInactive_$i\" type=\"radio\" name ='$objectName' value =\"0\" >\n";
			echo "		<label class =\"special\" for=\"objectIdInactive_$i\">inactive</label><br \>\n";			
		}
		else {
			echo "		<p><b>$objectName</b></p>\n";
			echo "		<input class =\"special\" id=\"objectIdActive_$i\" type=\"radio\" name ='$objectName' value =\"1\" >\n";
			echo "		<label class =\"special\" for=\"objectIdActive_$i\">active</label>\n";
			
			echo "		<input class =\"special\" id=\"objectIdInactive_$i\" type=\"radio\" name ='$objectName' value =\"0\" checked>\n";
			echo "		<label class =\"special\" for=\"objectIdInactive_$i\">inactive</label><br \>\n";
		}
		echo "</div>\n";
				
		# COALITION RADIO BOX
		echo "<div class=\"radio\">\n";  
			if ($objectCoalition == 0) {
				echo "	<input id=\"neutralModel$i\" type=\"radio\" name=\"$objectId\" value=\"0\" checked>  \n";
				echo "	<label for=\"neutralModel$i\">Neutral</label>  \n";
				
				echo "	<input id=\"ententeModel$i\" type=\"radio\" name=\"$objectId\" value=\"1\" >  \n";
				echo "	<label for=\"ententeModel$i\">Entente</label>  \n";
				
				echo "	<input id=\"centerModel$i\" type=\"radio\" name=\"$objectId\" value=\"2\">  \n";
				echo "	<label for=\"centerModel$i\">Center</label> \n";
			}
			elseif ($objectCoalition == 1) {
				echo "	<input id=\"neutralModel$i\" type=\"radio\" name=\"$objectId\" value=\"0\" >  \n";
				echo "	<label for=\"neutralModel$i\">Neutral</label>  \n";	
							
				echo "	<input id=\"ententeModel$i\" type=\"radio\" name=\"$objectId\" value=\"1\" checked>  \n";
				echo "	<label for=\"ententeModel$i\">Entente</label>  \n";
				
				echo "	<input id=\"centerModel$i\" type=\"radio\" name=\"$objectId\" value=\"2\" >  \n";
				echo "	<label for=\"centerModel$i\">Center</label> \n"; 
			}
			elseif ($objectCoalition == 2) {
				echo "	<input id=\"neutralModel$i\" type=\"radio\" name=\"$objectId\" value=\"0\">  \n";
				echo "	<label for=\"neutralModel$i\">Neutral</label>  \n";	
							
				echo "	<input id=\"ententeModel$i\" type=\"radio\" name=\"$objectId\" value=\"1\">  \n";
				echo "	<label for=\"ententeModel$i\">Entente</label>  \n";
				
				echo "	<input id=\"centerModel$i\" type=\"radio\" name=\"$objectId\" value=\"2\" checked>  \n";
				echo "	<label for=\"centerModel$i\">Center</label> \n";
			}
		
		echo "</div>\n";
		print "<hr noshade width=\"auto\" size=\"1\" >\n";
		$i ++;
	}
	echo "</div>\n";

?>
