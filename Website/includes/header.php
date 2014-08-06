<?php

# creates a new session for tracking the user is logged on 
# This is the one and only seesion start on each page
session_start(); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>BosWar</title>

<?php

	# check if game variable is already set
	if (empty($_SESSION['sim']))
		{
			# check if the variable was already set
			# get the variable from the first pages button
			$sim = $_POST['selection'];
			
			if(!isset($sim)) {
				# redirect to index if user made no choice
				header("Location: index.php");
			}
				
			# register value of $_POST["selection"] - chosen game - to Session "game"
			# syntax: $_SESSION['name'] = "value";
			$_SESSION['sim'] = $sim;}
	else {
			#get the variable stored into $sim
			$sim = $_SESSION['sim'];
		}
		
	# check if a navigation button was pressed and introduce SESSION variable for naviagtion button presses
	if (empty($_GET['btn'])) {
		$btn = "";}
	else {
		$_SESSION['btn'] = $_GET['btn'];
		$btn 			 = $_SESSION['btn'];}
	
	if (empty($_GET['sde'])) {
		$sde = "";}
	else {
		$_SESSION['sde'] = $_GET['sde'];
		$sde 			 = $_SESSION['sde'];}
	  
	# check if a there is already a userRole defined
	if (empty($_SESSION['userRole'])) {
		$userRole = "";}
	else {
		$userRole = $_SESSION['userRole'];}
	if (empty($_SESSION['userRoleId'])) {
		$userRoleId = "";}
	else {
		$userRoleId = $_SESSION['userRoleId'];}		
	
	# check if a there is already a campaign defined
	if (empty($_SESSION['camp_db'])) {
		$loadedCampaign = "";}
	else {
		$loadedCampaign = $_SESSION['camp_db'];}

	# check if there is already a user_id assigned
	if (empty($_SESSION['userId'])) {
		$userId = "";}
	else {
		$userId = $_SESSION['userId'];}	
	
	# check if there is already a user_id assigned
	if (empty($_SESSION['userCoalId'])) {
			}
	else {
		$userCoalId = $_SESSION['userCoalId'];}	
	
	# Style management
	if ($sim == "RoF")
		{
			echo "<!--  Link external CSS Master file containing all other CSS files -->\n";
			echo "<link href=\"css/RofWar_styles.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
		}
	if ($sim == "BoS")
		{
			echo "<!--  Link external CSS Master file containing all other CSS files -->\n";
			echo "<link href=\"css/BosWar_styles.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
		}
	##### DEBUGGING #####
#	include ('includes/debugging/debuggingSessionVariables.php');	
# 	include ('includes/debugging/debuggingPostVariables.php' ); #testing the Post variables for my objects enabling this creates an error so I turned it off temporarily.
#	include ('includes/debugging/debuggingMySqlError.php' );	
			
?>

<!-- Include jQuery Library -->
<script src="js/jquery-1.2.2.pack.js" type="text/javascript"></script>

<!-- Let's do the animation -->
<script type="text/javascript" src="js/animation.js"></script>

</head>

<body>

<div id="header">
    
	<?php
		# get db version and build out of version table based on $sim
		require ( 'functions/getDbVersion.php' );
		get_dbversion($sim);

     	# create dynamic title based on variable $sim
		if ($sim == "RoF")
			{
				echo "<div id=\"titleRofWar\"></div>\n";
			}
		if ($sim == "BoS")
			{
				echo "<div id=\"titleBosWar\"></div>\n";
			}	
	?>
        
