
<?php

	# Need to put this in here as er have no header included in this page
	session_start(); 			
	# get campaign database name from previous POST.
	$_SESSION['camp_db'] = $_POST["db"];
	$camp_db = $_SESSION['camp_db'];
	
	if (empty($_SESSION['camp_db']))
	{
		header("Location: ../loggedOn.php?btn=home");
		exit;
	}
	
	# redirect to previous screen with selected $loadedCampaign variable
	header("Location: ../CampaignManagment_Admin.php?btn=campmgmt");
?>
