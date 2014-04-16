<?php 
// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();

// Include the website header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );

					require ( 'functions/connect2Campaign.php' );

					// include getCampaignVariables.php
					include ( 'includes/getCampaignVariables.php' );

					// declare $camp_link to be a global variable
					global $camp_link;

					// connect to campaign db
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					// get post variables
					$templateImport	= $_POST["templateImport"];
					$file			= 'uploads/'.$_POST["file"];
					$SaveToDir		= $_POST["SaveToDir"];
//					$returnpage		= $_POST["returnpage"];
echo "Hello Peter im here in campaign management import confirm 2 about to start reading columns";
echo '<br>Starting update of static objects flag';
$q1="UPDATE static set static_updated = 0";
$r1= mysqli_query($dbc,$q1);
if ($r1)
	{echo '<br> update flag updated';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
?>
