<?php
	$UploadDone = $_POST["Upload"];
//	echo "\$UploadDone: $UploadDone<br />\n";
	if ($UploadDone == 'true') {
		header ("Location: CampaignMgmtImport.php?btn=campStp&fi=template");
	}
?>					
