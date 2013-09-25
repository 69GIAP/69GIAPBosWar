<?php
	session_start();
	# reset campaign specific SESSION variables
	unset($loadedCampaign);
	unset($_SESSION['camp_db']);
	header("Location:../CampaignManagment.php?btn=campmgmt");
?>