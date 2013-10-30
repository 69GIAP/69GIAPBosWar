<?php 

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
	
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
<?php
# include connect2CampaignFunction.php
include ( 'functions/connect2Campaign.php' );

# include getCampaignVariables.php
include ( 'includes/getCampaignVariables.php' );
		
# use this information to connect to campaign 
$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

//$bottomLeftX = $_POST["bottomLeftX"];
//$bottomLeftZ = $_POST["bottomLeftZ"];
//$topRightX = $_POST["topRightX"];
//$topRightZ = $_POST["topRightZ"];
					
$updateCampaignParameters = $_POST["updateCampaignParameters"];
					
// prepare sql based on selected parameters
// Section 1
if ($_POST["updateCampaignParameters"] == 1) {
	$logpath = $_POST["logpath"];
	$log_prefix = $_POST["log_prefix"];
	$query = "UPDATE campaign_settings SET logpath = '$logpath', log_prefix = '$log_prefix';"; 
//	echo "$query<br />\n";
	if(!$result = $camp_link->query($query)) {
		die('CampaignMgmtConfirm #1 query error [' . $dbc->error . ']');
	}
	$result = $camp_link->query($query);
//	echo "$result<br />\n";
//	echo "Updated section 1";
}

// Section 2
if ($_POST["updateCampaignParameters"] == 2) {
	$show_airfield = $_POST["show_airfield"];
	$finish_flight_only_landed = $_POST["finish_flight_only_landed"];
	$query = "UPDATE campaign_settings SET 
			show_airfield = '$show_airfield', 
			finish_flight_only_landed = '$finish_flight_only_landed';"; 
//	echo "$query<br />\n";
	if(!$result = $camp_link->query($query)) {
		die('CampaignMgmtConfirm #2 query error [' . $dbc->error . ']');
	}
	$result = $camp_link->query($query);
//	echo "$result<br />\n";
//	echo "Updated section 2";
}						

// Section 3
if ($_POST["updateCampaignParameters"] == 3) {
	$kia_pilot = $_POST["kia_pilot"];
	$mia_pilot = $_POST["mia_pilot"];
	$cw_pilot = $_POST["cw_pilot"];
	$sw_pilot = $_POST["sw_pilot"];
	$lw_pilot = $_POST["lw_pilot"];
	$kia_gunner = $_POST["kia_gunner"];
	$cw_gunner = $_POST["cw_gunner"];
	$sw_gunner = $_POST["sw_gunner"];
	$lw_gunner = $_POST["lw_gunner"];
	$query = "UPDATE campaign_settings SET 
		kia_pilot = '$kia_pilot', 
		mia_pilot = '$mia_pilot', 
		critical_w_pilot = '$cw_pilot', 
		serious_w_pilot = '$sw_pilot', 
		light_w_pilot = '$lw_pilot', 
		kia_gunner = '$kia_gunner', 
		critical_w_gunner = '$cw_gunner', 
		serious_w_gunner = '$sw_gunner', 
		light_w_gunner = '$lw_gunner';";
//	echo "$query<br />\n";
	if(!$result = $camp_link->query($query)) {
		die('CampaignMgmtConfirm #3 query error [' . $dbc->error . ']');
	}
	$result = $camp_link->query($query);
//	echo "$result<br />\n";
//	echo "Updated section 3";
}						

// Section 4
if ($_POST["updateCampaignParameters"] == 4) {
	$dst_airActGrnd = $_POST["dst_airActGrnd"];
	$dst_GndActGrnd = $_POST["dst_GndActGrnd"];
	$lvl_AIAc = $_POST["lvl_AIAc"];
	$lvl_AIGrnd = $_POST["lvl_AIGrnd"];
	$spd_maxGrnd = $_POST["spd_maxGrnd"];
	$spd_maxTrnspt = $_POST["spd_maxTrnspt"];
	$sprd_suplPnts = $_POST["sprd_suplPnts"];
	$time_lineup = $_POST["time_lineup"];
	$time_msn = $_POST["time_msn"];
	$time_actvtUnit = $_POST["time_actvtUnit"];
	$query = "UPDATE campaign_settings SET 
			air_detect_distance = '$dst_airActGrnd', 
			ground_detect_distance = '$dst_GndActGrnd',
			air_ai_level = '$lvl_AIAc',
			ground_ai_level = '$lvl_AIGrnd',
			ground_max_speed_kmh = '$spd_maxGrnd',
			ground_transport_speed_kmh = '$spd_maxTrnspt',
			ground_spacing = '$sprd_suplPnts',
			lineup_minutes = '$time_lineup',
			mission_minutes = '$time_msn',
			detect_off_time = '$time_actvtUnit';"; 
//	echo "$query<br />\n";
	if(!$result = $camp_link->query($query)) {
		die('CampaignMgmtConfirm #4 query error [' . $dbc->error . ']');
	}
	$result = $camp_link->query($query);
//	echo "$result<br />\n";
//	echo "Updated section 4";
}						

// Section 5
if ($_POST["updateCampaignParameters"] == 5) {
	$config_done = $_POST["config_done"];
	if ($config_done == "true") {
		$query = "UPDATE campaign_settings SET status = 2 ;"; 
//		echo "$query<br />\n";
		if(!$result = $camp_link->query($query)) {
			die('CampaignMgmtConfirm #5 query error [' . $dbc->error . ']');
		}
//		$result = $camp_link->query($query);
//		echo "$result<br />\n";
		echo "Updated section 5";
		header("Location: CampaignMgmtSetup.php?btn=campMgmt");
	} else {
		$query = "UPDATE campaign_settings SET status = 1 ;"; 
//		echo "$query<br />\n";
		if(!$result = $camp_link->query($query)) {
			die('CampaignMgmtConfirm #5 query error [' . $dbc->error . ']');
		}
//		$result = $camp_link->query($query);
//		echo "$result<br />\n";
		echo "Updated section 5";
		header("Location: CampaignMgmtConfigure.php?btn=campMgmt");
	}
} 
?>					
            </div>
    
        </div>

<?php
	# Include the general sidebar
	include ( 'includes/sidebar.php' );
?>	

		<div id="clearing"></div>
	</div>

<?php
	# Include the footer
	include ( 'includes/footer.php' );
?>
