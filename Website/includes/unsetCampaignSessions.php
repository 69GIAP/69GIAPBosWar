<?php
	session_start();
	# reset campaign specific SESSION variables
	unset($loadedCampaign);
	unset($_SESSION['camp_db']);
	unset($_SESSION['airfieldName']);

	header("Location:../LoggedOn.php?btn=home");

?>