<?php 
// uploadFile.php
// upload .Group and .Mission files to server
// =69.GIAP=MYATA and =69.GIAP=TUSHKA
// Oct 11, 2013
// latest revision: Dec 8, 2013
// BOSWAR version1.03
// if old copy of file exists, delete it before moving upload

# Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
	
// Include the webside header
include ( 'includes/header.php' );
	
// Include the navigation on top
include ( 'includes/navigation.php' );

?>
<div id="wrapper">
	<div id="container">
		<div id="content">
			<?php           
			// configuration
			global $done; // result or not

			// make sure $SaveToDir exists
			$SaveToDir = "uploads/";
			if (!is_dir($SaveToDir)) {
				if (mkdir($SaveToDir)) {
					echo "$SaveToDir created.<br />\n"; 
				} else {
					echo "$SaveToDir WAS NOT created.<br />\n"; 
					return 0;
				}
			}
            
			// restrict uploaded files to .Group and .Mission files
			$allowedExts = array("Group", "group", "Mission", "mission");
			// get $returnpage
			$returnpage = $_POST["returnpage"];
			//echo "\$returnpage: $returnpage<br />\n";

			$temp = explode(".", $_FILES["userfile"]["name"]);
			$extension = end($temp);
			// limit size to 10 MB max (3 MB is a large .Mission file in RoF)
			// (can tune later if needed for BoS)
			// and require extension to be in allowed list
			if ( $_FILES["userfile"]["size"] < 10485760 && in_array($extension, $allowedExts)) {
				if ($_FILES["userfile"]["error"] > 0) {
					echo "Return Code: " . $_FILES["userfile"]["error"] . "<br>";
				} else {
					echo "Upload: " . $_FILES["userfile"]["name"] . "<br>";
					echo "Type: " . $_FILES["userfile"]["type"] . "<br>";
					echo "Size: " . (round ($_FILES["userfile"]["size"] / 1024 /1024, 2)) . " MB<br>";
//					echo "Temp file: " . $_FILES["userfile"]["tmp_name"] . "<br>";
					if (file_exists("$SaveToDir" . $_FILES["userfile"]["name"])) {
						unlink("$SaveToDir". $_FILES["userfile"]["name"]);	
						echo "An old copy of " . $_FILES["userfile"]["name"] . " existed, but was deleted.<br />\n";
					} 
					move_uploaded_file($_FILES["userfile"]["tmp_name"],
					"$SaveToDir" . $_FILES["userfile"]["name"]);
					echo "Saved to: " . "$SaveToDir" . $_FILES["userfile"]["name"];
					$done = 'true';
					
				}
			} else {
				$done = 'false';
				if ($_FILES["userfile"]["size"] > 10485760) {
					echo $_FILES["userfile"]["name"]." is > 10 MB<br />\n";
				} else {
					echo ".$extension is not an allowed extension";
				}
			}
echo "<br />Peter here \$returnpage: $returnpage<br />\n";
			if ($returnpage == 'CampaignMgmtUpload.php') {
				echo "			<br />&nbsp;<br />\n";
				echo "			<a href=\"CampaignMgmtUpload.php?btn=campStp&fi=template\">Next</a>\n";
			} elseif ($returnpage == 'CampaignMgmtSupplyControlPoints.php') {
				echo "			<br />&nbsp;<br />\n";
				echo"			<a href=\"CampaignMgmtSupplyControlPoints.php?btn=campStp&fi=points\">Next</a>\n";
			} elseif ($returnpage == 'CampaignMgmtSetupBridges.php') {
				echo "			<br />&nbsp;<br />\n";
				echo"			<a href=\"CampaignMgmtSetupBridges.php?btn=campStp&fi=bridges\">Next</a>\n";
			} elseif ($returnpage == 'CampaignMgmtUpload2.php') {
				echo "			<br />&nbsp;<br />\n";
				echo"			<a href=\"CampaignMgmtUpload2.php?btn=campStp&fi=bridges\">Next</a>\n";
			} elseif ($returnpage == 'CampaignMgmtImport.php') {
				echo "			<br />&nbsp;<br />\n";
				echo "<a href=\"CampaignMgmtImport.php?btn=campStp\">Next</a>\n";
			} elseif ($returnpage == 'CampaignMgmtImport2.php') {
				echo "			<br />&nbsp;<br />\n";
				echo "<a href=\"CampaignMgmtImport2.php?btn=campStp\">Next</a>\n";	
			} elseif ($returnpage == 'CampaignMgmtImport3.php') {
				echo "			<br />&nbsp;<br />\n";
				echo "<a href=\"CampaignMgmt.php?btn=campStp\">Next</a>\n";	
			}
			else {
				echo "none of the returnpages were valid<br>";
			}
			echo "		</div>\n";
			echo "	</div>\n";

// Include the general sidebar
include ( 'includes/sidebar.php' );

echo "	<div id=\"clearing\"></div>\n";

echo "</div>\n";

// close $dbc
$dbc->close();

// Include the footer
include ( 'includes/footer.php' );
?>
