<?php
// doit.php
// =69.GIAP=TUSHKA
// Nov 9, 2013
// process simple $dbc query and if error, display query and error
// use to aid debugging complex series of queries as in campaign creation
if(!$result = $dbc->query($query)) {
	$qx = "DROP DATABASE `$newCampaignDBName`;";
	$original_error = $dbc->error;
	if (!$dbc->query($qx)) {
		echo "Could not drop $newCampaignDBName<br />\n";
	} else {
		echo "DROP $newCampaignDBName<br />\n";
	}
	echo "$query<br />\n";
	die('Query error: [' . $original_error . ']');
}
?>
