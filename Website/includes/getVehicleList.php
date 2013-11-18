<?php
// get Vehicle list for a column
// =69.GIAP=TUSHKA
// BOSWAR ver 1.0
// Nov 16, 2013

	// require function getClassRoleDescription.php
	require ( 'functions/getClassRoleDescription.php' );

	$query = "SELECT id, object_type, object_class, object_desc, moving_becomes, cruise_speed_kmh, default_country
		FROM object_properties
		WHERE ( default_country = '$ckey' OR default_country = '0') AND ( modelpath2 = 'artillery' OR modelpath2 = 'vehicles' ) ORDER BY object_class;";
	
	$i = 1;
	
	if(!$result = $camp_link->query($query)){
		echo "$query<br />\n";
		die('getVehicle query error:' . $camp_link->error);
	}

	$countryadj = get_countryadj($ckey);

	echo "<h3>$countryadj Vehicles, Artillery & Infantry</h3>\n";

	# load results into variables 
	while ($obj = $result->fetch_object()) {
		$objectType		=	$obj->object_type;
		$object_class	=	$obj->object_class;
		$objectDesc		=	$obj->object_desc;
		$moving_becomes	=	$obj->moving_becomes;

		$classRoleDesc = get_class_role_description($object_class);

		echo "<div class=\"radio\">\n";

		echo "<input id=\"$i\" type=\"radio\" name=\"objectType\" value=\"$objectType\">";
		echo "<label for=\"$i\"><b>$objectDesc &nbsp; $classRoleDesc<br />
				[ $moving_becomes ]</b></label><br />\n";

		echo "</div>\n";

		print "<hr noshade width=\"auto\" size=\"1\" >\n";

		$i ++;
	}
	echo "</div>\n";
	$result->free();

?>

