<?php
// selectBOSWARfile.php
// select among campaign files that have been uploaded to BOSWAR
// restrict the displayed files to those for a particular campaign
// =69.GIAP=TUSHKA
// Nov 1,2013

function selectBOSWARfile($campaign,$SaveToDir) {
	// $campaign is a campaign name used as part of a filename
	// $SaveToDir is the upload directory

	$dhandle = opendir("$SaveToDir");
	// define an array to hold the files
	$files = array();

	if ($dhandle) {
		// loop through all of the files
		while (false !== ($fname = readdir($dhandle))) {
			// if the file is not this file, and does not start with a '.' or '..',
			// and it includes the campaign name
			// then store it for later display
			if (($fname != '.') && ($fname != '..') &&
				(preg_match("/$campaign/",$fname)) &&
				($fname != basename($_SERVER['PHP_SELF']))) {
				// store the filename
				$files[] = (is_dir( "./$fname" )) ? "(Dir) {$fname}" : $fname;
			}
		}
		// close the directory
		closedir($dhandle);
	}

	echo "<select name=\"file\">\n";
	// Now loop through the qualified files, echoing out a new select option for each one
	foreach( $files as $fname ) {
		echo "<option>{$fname}</option>\n";
	}
	echo "</select>\n";
}
?>

