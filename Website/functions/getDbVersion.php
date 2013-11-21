<?php
// getDbVersion
// given $sim
// =69.GIAP=MYATA
// Nov 21, 2013
// version 1.0 
function get_dbversion($sim) {
global $dbc; // link to campaign db

	$query = "SELECT dbVersion, description, buildDate
				FROM version 
				WHERE simulation like '$sim'
				AND buildDate = (SELECT max(buildDate) from version WHERE simulation like '$sim')";
	
	if($result = $dbc->query($query)) {
		while ($obj = $result->fetch_object()) {
			$dbVersion = ($obj->dbVersion);
			$versionDsc= ($obj->description);
			$buildDate = ($obj->buildDate);
			
			echo "<div id=\"version\">$versionDsc $dbVersion<br>\n";
			echo "Build: $buildDate</div>\n";
		}
	} else {
		echo "$query<br />\n";
		die('get_dbversion query error [' . $dbc->error . ']');
	}
	$result->free();
}
?>
