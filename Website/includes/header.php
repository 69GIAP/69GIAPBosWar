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
</head>
<?php

	# check if game variable is already set
	if (empty($_SESSION['game']))
		{
			# check if the variable was already set
			# get the variable from the first pages button
			$game = $_POST['selection'];
			
			if(!isset($game)) {
				# redirect to index if user made no choice
				header("Location: index.php");
			}
				
			# register value of $_POST["selection"] - chosen game - to Session "game"
			# syntax: $_SESSION['name'] = "value";
			$_SESSION['game'] = $game;}
	else {
			#get the variable stored into $game
			$game = $_SESSION['game'];
		}
		
	# check if a navigation button was pressed and introduce SESSION variable for naviagtion button presses
	
	if (empty($_GET['btn'])) {
		$btn = "";}
	else {
		$_SESSION['btn'] = $_GET['btn'];
		$btn 			 = $_SESSION['btn'];}
		  
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
	if ($game == "RoF")
		{
			echo "<!--  Link external CSS Master file containing all other CSS files -->\n";
			echo "<link href=\"css/RofWar_styles.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
		}
	if ($game == "BoS")
		{
			echo "<!--  Link external CSS Master file containing all other CSS files -->\n";
			echo "<link href=\"css/BosWar_styles.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
		}
	##### DEBUGGING #####
	include ('includes/debugging/debuggingSessionVariables.php');	
	include ( 'includes/debugging/debuggingPostVariables.php' ); #testing the Post variables for my objects enabling this creates an error so I turned it off temporarily.
	include ( 'includes/debugging/debuggingMySqlError.php' );	
			
?>


<!-- Include jQuery Library -->
<script src="js/jquery-1.2.2.pack.js" type="text/javascript"></script>

<!-- Let's do the animation -->
<script type="text/javascript" src="js/animation.js"></script>

<body>

<div id="header">
    
	<?php 

    
     	# create dynamic title based on variable $gameselector
		if ($game == "RoF")
			{
				echo "<div id=\"titleRofWar\"></div>\n";
				echo "<div id=\"version\">Beta Phase: Version 0.1.0</div>\n";
			}
		if ($game == "BoS")
			{
				echo "<div id=\"titleBosWar\"></div>\n";
				echo "<div id=\"version\">Beta Phase: Version 0.1.0</div>\n";
			}	
	?>
        
