<?php
// BOTGUNNER
// translate BotGunner into more natural description
// 2011-2013
// BOSWAR version 1.5
// Oct 28, 2013
function BOTGUNNER($type) {
	global $camp_link; // link to campaign db
	global $object_desc; // object description

	$query = "SELECT object_desc FROM rof_object_properties WHERE object_type = '$type'";
	if ($result = $camp_link->query($query)) {
		// get results
		while ($obj = $result->fetch_object()) {
			$object_desc = ($obj->object_desc);
		}
	// free result, object oriented style
	$result->close();
	} else { 
		die('BOTGUNNER query error [' . $camp_link->error . ']');
	}
}
?>