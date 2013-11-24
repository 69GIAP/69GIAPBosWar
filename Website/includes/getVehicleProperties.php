<?php
// getVehicleProperties
// given Model, get vehicle properties for column
// =69.GIAP=TUSHKA
// Nov 17, 2013
// BOSWAR ver 1.1
// Nov 24, 2013

$query = "SELECT object_desc, moving_becomes, cruise_speed_kmh from object_properties WHERE Model = '$Model' ";
if ($result = $camp_link->query($query)) {
	while ($obj			= $result->fetch_object()) {
		$cruiseSpeed	= $obj->cruise_speed_kmh;
		$moving_becomes	= $obj->moving_becomes;
		$objectDesc		= $obj->object_desc;
	}
} else {
		echo "$query<br />\n";
	die('getVehicleProperties.php query error [' . $dbc->error . ']');
}
$result->free();

?>
