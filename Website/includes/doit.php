<?php
// doit.php
// =69.GIAP=TUSHKA
// Nov 9, 2013
// process simple $dbc query and if error, display query and error
// use to aid debugging complex series of queries as in campaign creation
if(!$result = $dbc->query($query)) {
	echo "$query<br />\n";
	die('Query error: [' . $dbc->error . ']');
}
?>
