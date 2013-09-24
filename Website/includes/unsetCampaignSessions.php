<?php
	session_start();
	# reset campaign specific SESSION variables
	unset($loadedCampaign);
	unset($_SESSION['camp_db']);
	unset($_SESSION['airfieldName']);
	unset($_SESSION['userCoalId']);

	header("Location:../LoggedOn.php?btn=home");

?>