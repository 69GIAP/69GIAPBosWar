<?php
// downloadFile.php
// force download of a group or mission file
// =69.GIAP=TUSHKA
// Nov 20, 2013
// BOSWAR ver 0.2

function download_file($file) {
	global $camp_link; 

	// restrict downloaded files to .Group and .Mission files
	$allowedExts = array("Group", "group", "Mission", "mission");

	// make sure $DownloadDir exists
	$DownloadDir = "downloads/";
	if (!is_dir($DownloadDir)) {
		if (mkdir($DownloadDir)) {
			echo "$DownloadDir created.<br />\n"; 
		} else {
			echo "$DownloadDir WAS NOT created.<br />\n"; 
			return(false);
		}
	}

	$path = "$DownloadDir"."$file";
//	echo "\$path: $path<br />\n";

	if (file_exists($path)) {

		$tmp = explode(".", $path);
		$extension = end($tmp);
//		echo "\$extension: $extension<br />\n";

		if (in_array($extension, $allowedExts)) {
    		header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename='.basename($path));
		    header('Content-Transfer-Encoding: binary');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($path));
		    ob_clean();
		    flush();
		    readfile($path);
			return(true); 
		} else {
			echo ".$extension is not an allowed extension<br />\n";
			return(false); 
		}
	} else {
		echo "$path does not exist or is unreadable<br />\n"; 
		return(false); 
	}
}
?>
