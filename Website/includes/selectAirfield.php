
<?php
	# Need to put this in here as er have no header included in this page
	session_start(); 			
	# get campaign database name from previous POST.
	$_SESSION['airfieldName'] = $_POST["airfieldName"];
	$airfieldName = $_SESSION['airfieldName'];

	# redirect to previous screen with selected $loadedCampaign variable
	header("Location: ../airfieldManagementChange.php");
?>
