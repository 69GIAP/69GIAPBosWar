<?php
// getStaticObjectsList.php
// get objects list for a static group
// =69.GIAP=TUSHKA
// BOSWAR ver 1.0
// Dec 3, 2013

// NOTE: the calling page must require getCoalitionname, getCoalition,
// getCountriesInCoalition, and getCountryadj

	// require function getClassRoleDescription.php
	require ( 'functions/getClassRoleDescription.php' );

	$coalitionname = get_coalitionname($CoalID);

	$CoalID = get_coalition($ckey);

	$countries = get_countries_in_coalition($CoalID);

	$query = "SELECT id, object_class, object_desc, Model, cruise_speed_kmh, default_country
		FROM object_properties
		WHERE ( modelpath2 = 'artillery'
       		OR modelpath2 = 'balloons'
       		OR modelpath2 = 'battlefield'
       		OR modelpath2 = 'firingpoint'
       		OR modelpath2 = 'trains'
			OR modelpath2 = 'vehicles'
       		OR Model = 'windsock'
			OR object_class LIKE 'S%'
		) ORDER BY object_class;";
	
	$i = 1;
	
	if(!$result = $camp_link->query($query)){
		echo "$query<br />\n";
		die('getVehicle query error:' . $camp_link->error);
	}

	$countryadj = get_countryadj($ckey);

	echo "<h3>$coalitionname (or Neutral) Static Objects</h3>\n";

	# load results into variables 
	while ($obj = $result->fetch_object()) {
		$object_class	=	$obj->object_class;
		$objectDesc		=	$obj->object_desc;
		$Model			=	$obj->Model;
		$default_country=	$obj->default_country;

		$classRoleDesc = get_class_role_description($object_class);

        if (in_array($default_country, $countries) || $default_country == '0') {	

			echo "<div class=\"checkbox\">\n";

			echo "<input id=\"$i\" type=\"checkbox\" name=\"Model[]\" value=\"$Model\">";
			echo "<label for=\"$i\"><b>$objectDesc &nbsp; $classRoleDesc<br />\n";

			echo "</div>\n";

			print "<hr noshade width=\"auto\" size=\"1\" >\n";

			$i ++;
		}
	}

	$result->free();

?>

