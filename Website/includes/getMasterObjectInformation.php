<?php
// Get objects information 
// out of campaign DB
// 69giapmyata
// ver 1.0
// ver 1.1 changed filter to avoid active and coalition column in table

	# require function getCoalition.php
	require ( 'functions/getCoalition.php' );

	# require function getCoalitionname.php
	require ( 'functions/getCoalitionname.php' );

	# require function getClassRoleDescription.php
	require ( 'functions/getClassRoleDescription.php' );
	
	# add percent to allow like query
	$_SESSION['objectClass'] = $objectClass;
	
	if ($objectClass == "V") {
		$sql = "SELECT id, object_type, object_class, object_value, object_desc, default_country
			FROM object_properties
			WHERE modelpath2 = 'artillery' OR modelpath2 = 'vehicles' ORDER BY object_class, default_country";
			echo "<h3>Vehicles, Artillery & Infantry</h3>\n";	
	} else {
		$sql = "SELECT id, object_type, object_class, object_value, object_desc, default_country
			FROM object_properties
			WHERE object_class like '$objectClass%' ORDER BY default_country";
			echo "<h3>Available Aircraft</h3>\n";	
	}
		
	$i = 1;
	
	#echo $sql;
	echo "		<!-- Checkboxes for model selection -->\n";
	if(!$result = $camp_link->query($sql)){
		echo "$query<br />\n";
		die('getMasterObjectInformation query error:' . $camp_link->error);
	}
	

	echo "<div class=\"checkboxWrapper\">\n";

	# load results into variables 
	while ($obj = $result->fetch_object()) {
		$objectId		=($obj->id);
		$objectName		=($obj->object_type);
		$object_class	=($obj->object_class);
		$object_value	=($obj->object_value);
		$objectDesc		= $obj->object_desc;
		$objectCountry	=($obj->default_country);
		
		$classRoleDesc = get_class_role_description($object_class);
		echo "<div class=\"checkbox\">\n";
		if	($objectCountry < 599) { // all countries below countryId 599 are similar to Active
			echo "		<p><b>$objectDesc<br />$classRoleDesc [ $object_value ]</b></p>\n";
			echo "		<input class =\"special\" id=\"objectIdActive_$i\" type=\"radio\" name ='$objectName' value =\"1\" checked>\n";
			echo "		<label class =\"special\" for=\"objectIdActive_$i\">active</label>\n";
			
			echo "		<input class =\"special\" id=\"objectIdInactive_$i\" type=\"radio\" name ='$objectName' value =\"0\" >\n";
			echo "		<label class =\"special\" for=\"objectIdInactive_$i\">inactive</label><br \>\n";			
		}
		else {						// all countries greater than countryId 599 are similar to Inactive
			echo "		<p><b>$objectDesc</b></p>\n";
			echo "		<input class =\"special\" id=\"objectIdActive_$i\" type=\"radio\" name ='$objectName' value =\"1\" >\n";
			echo "		<label class =\"special\" for=\"objectIdActive_$i\">active</label>\n";
			
			echo "		<input class =\"special\" id=\"objectIdInactive_$i\" type=\"radio\" name ='$objectName' value =\"0\" checked>\n";
			echo "		<label class =\"special\" for=\"objectIdInactive_$i\">inactive</label><br \>\n";
		}
		echo "</div>\n";

		# use function to get CoalID
		$objectCoalition = get_coalition("$objectCountry");

		# get coalition names
		$coalition0 = get_coalitionname(0);
		$coalition1 = get_coalitionname(1);
		$coalition2 = get_coalitionname(2);
		
# debug
# echo $objectCountry."<br>";
# echo $objectCoalition; // due to assignment of Future Coalitions which has coalition 3 No radiobuttons are visible for Inactive objects. We can change this later

		# COALITION RADIO BOX
		echo "<div class=\"radio\">\n";  
		if ($objectCoalition == 0  /* or $objectCoalition > 2 */ ) {
			echo "	<input id=\"neutralModel$i\" type=\"radio\" name=\"$objectId\" value=\"0\" checked>  \n";
			echo "	<label for=\"neutralModel$i\">$coalition0</label>  \n";

			echo "	<input id=\"ententeModel$i\" type=\"radio\" name=\"$objectId\" value=\"1\" >  \n";
			echo "	<label for=\"ententeModel$i\">$coalition1</label>  \n";

			echo "	<input id=\"centerModel$i\" type=\"radio\" name=\"$objectId\" value=\"2\">  \n";
			echo "	<label for=\"centerModel$i\">Central Powers</label> \n";
		}
		elseif ($objectCoalition == 1) {
			echo "	<input id=\"neutralModel$i\" type=\"radio\" name=\"$objectId\" value=\"0\" >  \n";
			echo "	<label for=\"neutralModel$i\">$coalition0</label>  \n";	

			echo "	<input id=\"ententeModel$i\" type=\"radio\" name=\"$objectId\" value=\"1\" checked>  \n";
			echo "	<label for=\"ententeModel$i\">$coalition1</label>  \n";

			echo "	<input id=\"centerModel$i\" type=\"radio\" name=\"$objectId\" value=\"2\" >  \n";
			echo "	<label for=\"centerModel$i\">$coalition2</label> \n"; 
		}
		elseif ($objectCoalition == 2) {
			echo "	<input id=\"neutralModel$i\" type=\"radio\" name=\"$objectId\" value=\"0\">  \n";
			echo "	<label for=\"neutralModel$i\">$coalition0</label>  \n";	
							
			echo "	<input id=\"ententeModel$i\" type=\"radio\" name=\"$objectId\" value=\"1\">  \n";
			echo "	<label for=\"ententeModel$i\">$coalition1</label>  \n";
				
			echo "	<input id=\"centerModel$i\" type=\"radio\" name=\"$objectId\" value=\"2\" checked>  \n";
			echo "	<label for=\"centerModel$i\">$coalition2</label> \n";
		}
		
		echo "</div>\n";
		print "<hr noshade width=\"auto\" size=\"1\" >\n";
		$i ++;
	}
	echo "</div>\n";
	$result->free();

?>

