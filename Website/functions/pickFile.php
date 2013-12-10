<?php
// pickFile.php
// basic browse to a file for uploading
// =69.GIAP=TUSHKA
// BOSWAR version 1.0
// Nov 1, 2013
//
// define function
function pickFile($returnpage) {
	// $returnpage is page to return to when done
	if (!isset($returnpage)) { $returnpage = '.'; }
	echo "<form id=\"campaignMgmtUploadForm\" action=\"uploadFile.php\" method=\"post\" enctype=\"multipart/form-data\" />\n";
	echo "	<div>\n";
//	echo "	Choose a file to upload: <br />\n";
	echo "	<fieldset id=\"inputs\">\n";
	echo "		<input type=\"hidden\" name=\"returnpage\" value=\"$returnpage\"/>\n";
	echo "		<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"10485760\"/>\n";
	echo "		<input type=\"file\" name=\"userfile\" id=\"userfile\" size=\"50\" />\n";
	echo "	</fieldset>\n";	

	echo "	<fieldset id=\"actions\">\n";	
	echo "  	<input id=\"SetupDone\" type=\"submit\" value=\"Upload File\" />\n";
	echo "	</fieldset>\n";	
	echo "	</div>\n";
	echo "</form>\n";
}
?>
