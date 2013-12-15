<?php
// BOTGUNNER
// translate BotGunner into more natural description
// =69.GIAP=TUSHKA
// 2011-2013
// BOSWAR version 1.07
// Dec 14, 2013

function BOTGUNNER($type) {
	global $camp_link; // link to campaign db

	$query = "SELECT object_desc FROM object_properties WHERE object_type = '$type'";
	if ($result = $camp_link->query($query)) {
		// get results
		while ($obj = $result->fetch_object()) {
			$object_desc = ($obj->object_desc);
		}
		$result->close();
		return $object_desc;
	} else { 
		echo "$query<br />\n";
		die('BOTGUNNER query error [' . $camp_link->error . ']');
	}
}
?>
