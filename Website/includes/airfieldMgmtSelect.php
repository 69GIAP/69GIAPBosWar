
<?php
	# Need to put session_start() in here as I have no header included in this page
	session_start();
			
	# get campaign database name from previous POST.
	$_SESSION['airfieldName']	= $_POST["airfieldName"];
	$airfieldName 				= $_SESSION['airfieldName'];

	# Incorporate the MySQL connection script.
	require ( '../../connect_db.php' );
	
	# include connect2CampaignFunction.php
	include ( '../functions/connect2Campaign.php' );
	
	$loadedCampaign = $_SESSION['camp_db'];
	# include getCampaignVariables.php
	include ( 'getCampaignVariables.php' );
	
	# use this information to connect to campaign 
	$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
	
	# get the airfields details
	$sql = "SELECT id, airfield_Name, airfield_Coalition ,airfield_Enabled FROM airfields 
			WHERE airfield_Name = $airfieldName;}";

	if(!$result = $camp_link->query($sql)){
		die('There was an error running the query ' . mysqli_error($camp_link));
	}
	
	# load results into variables 
	while ($obj = mysqli_fetch_object($result)) {
		$airfieldName		=($obj->airfield_Name);
		$airfieldCoalition	=($obj->airfield_Coalition);
		$airfieldEnabled	=($obj->airfield_Enabled);
		$airfieldId			=($obj->id);
		# using TUSHKAS hack to provide multiple variables with one
		$_SESSION['airfieldName'] = $airfieldName."+".$airfieldCoalition."+".$airfieldEnabled."+".$airfieldId;
		echo $_SESSION['airfieldName'];
		exit;
	}	

	# redirect to previous screen with selected $loadedCampaign variable
	#header("Location: ../airfieldMgmtChange.php?btn=campMgmt");
?>
