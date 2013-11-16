<?php
// getandsetCampaignSettings
// reset variable in  case they are empty
# stenka 16/11/13 Cosmetic corrections
$query = "SELECT * from campaign_settings;";
if($result = $camp_link->query($query)) {
	while ($obj = $result->fetch_object()) {
		$status						=($obj->status);
		$logpath					=($obj->logpath);
		$log_prefix					=($obj->log_prefix);
		$show_airfield				=($obj->show_airfield);
		$finish_flight_only_landed	=($obj->finish_flight_only_landed);
		$kia_pilot					=($obj->kia_pilot);
		$mia_pilot					=($obj->mia_pilot);
		$cw_pilot					=($obj->critical_w_pilot);
		$sw_pilot					=($obj->serious_w_pilot);
		$lw_pilot					=($obj->light_w_pilot);
		$kia_gunner					=($obj->kia_gunner);
		$cw_gunner					=($obj->critical_w_gunner);
		$sw_gunner					=($obj->serious_w_gunner);
		$lw_gunner					=($obj->light_w_gunner);
		$dst_airActGrnd				=($obj->air_detect_distance);
		$dst_GndActGrnd				=($obj->ground_detect_distance);
		$lvl_AIAc					=($obj->air_ai_level);
		$lvl_AIGrnd					=($obj->ground_ai_level);
		$spd_maxGrnd				=($obj->ground_max_speed_kmh);
		$spd_maxTrnspt				=($obj->ground_transport_speed_kmh);
		$sprd_suplPnts				=($obj->ground_spacing);
		$time_lineup				=($obj->lineup_minutes);
		$time_msn					=($obj->mission_minutes);
		$time_actvtUnit				=($obj->detect_off_time);
	}
} else {
	die('getCoalition query error [' . $camp_link->error . ']');
}
// free result set
$result->close();

# create the input form
# Mission Log Settings
echo "	<fieldset id=\"inputs\">\n";
echo "		<h2>Mission Log Settings</h2>\n";
echo "		<h3>Log files location relative to boswar home directory</h3>\n";
echo "		<p class=\"indent\">(use / as directory separator)</p>\n";

echo "		<input id=\"database\" type=\"text\" name=\"logpath\" value='$logpath' autofocus ><br>\n";
if ($log_prefix == 'missionReport') {
	$log_prefix = $log_prefix.$abbrv;
}
echo "		<h3>Constant prefix for this campaign's log files</h3>\n";
echo "		<p class=\"indent\">(Recommend using default or default plus an underscore)</p>\n";

echo "		<input id=\"database\" type=\"text\" name=\"log_prefix\" value='$log_prefix' autofocus ><br>\n";
echo "	</fieldset>\n";
# BUTTON
echo "<fieldset id=\"actions\">\n";	
echo "		<button type=\"submit\" name =\"updateCampaignParameters\" id=\"loginSubmit\" value =\"1\" >Update Mission Log Settings</button>\n"; # the value defines the action after the button was pressed
echo "	</fieldset>\n";

# Log Parser Settings
echo "	<fieldset id=\"inputs\">\n";
echo "		<h2>Log Parser Settings</h2>\n";
echo "		<h3>Give airfield names in reports</h3>\n";
echo "		<p class=\"indent\">(else 'unidentified')</p>\n";

echo "		<select name=\"show_airfield\" id=\"database\">\n";
if ($show_airfield == 'true') {
   echo "			<option value=\"true\" selected=\"selected\">true</option>\n";
   echo "			<option value=\"false\">false</option>\n";
} else {
   echo "			<option value=\"true\">true</option>\n";
   echo "			<option value=\"false\" selected=\"selected\">false</option>\n";
}
echo "		</select><br>\n";
echo "		<h3>'Finish flight only landed' selected on server</h3>\n";
echo "		<select name=\"finish_flight_only_landed\" id=\"database\">\n";
if ($finish_flight_only_landed == 'true') {
   echo "			<option value=\"true\" selected=\"selected\">true</option>\n";
   echo "			<option value=\"false\">false</option>\n";
} else {
   echo "			<option value=\"true\">true</option>\n";
   echo "			<option value=\"false\" selected=\"selected\">false</option>\n";
}
echo "		</select><br>\n";
echo "	</fieldset>\n";
# BUTTON
echo "<fieldset id=\"actions\">\n";	
echo "		<button type=\"submit\" name =\"updateCampaignParameters\" id=\"loginSubmit\" value =\"2\" >Update Log Parser Settings</button>\n"; # the value defines the action after the button was pressed
echo "	</fieldset>\n";

# Player Score Settings
echo "	<fieldset id=\"inputs\">\n";
echo "		<h2>Player Score Settings</h2>\n";
echo "		<h3>Pilot killed</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"kia_pilot\" value='$kia_pilot' autofocus ><br>\n";
echo "		<h3>Pilot captured</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"mia_pilot\" value='$mia_pilot' autofocus ><br>\n"; 
echo "		<h3>Pilot critically wounded</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"cw_pilot\" value='$cw_pilot' autofocus ><br>\n"; 
echo "		<h3>Pilot seriously wounded</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"sw_pilot\" value='$sw_pilot' autofocus ><br>\n";
echo "		<h3>Pilot lightly wounded</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"lw_pilot\" value='$lw_pilot ' autofocus ><br>\n";
echo "		<h3>Gunner killed</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"kia_gunner\" value='$kia_gunner' autofocus ><br>\n";
echo "		<h3>Gunner critically wounded</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"cw_gunner\" value='$cw_gunner' autofocus ><br>\n";
echo "		<h3>Gunner seriously wounded</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"sw_gunner\" value='$sw_gunner' autofocus ><br>\n";
echo "		<h3>Gunner lightly wounded</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"lw_gunner\" value='$lw_gunner' autofocus ><br>\n";
# BUTTON
echo "<fieldset id=\"actions\">\n";	
echo "		<button type=\"submit\" name =\"updateCampaignParameters\" id=\"loginSubmit\" value =\"3\" >Update Player Scores</button>\n"; # the value defines the action after the button was pressed
echo "	</fieldset>\n";

# Mission Tuning Settings
echo "	<fieldset id=\"inputs\">\n";
echo "		<h2>Mission Tuning Settings</h2>\n";
echo "		<h3>Aircraft detection distance (m)</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"dst_airActGrnd\" value='$dst_airActGrnd' autofocus ><br>\n";
echo "		<h3>Ground unit detection distance (m)</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"dst_GndActGrnd\" value='$dst_GndActGrnd' autofocus ><br>\n";
echo "		<h3>Skill level for AI aircraft and gunners(1=Low, 2=Medium, 3=High)</h3>\n";
echo "		<select name=\"lvl_AIAc\" id=\"database\">\n";
//echo "			<option value=\"$lvl_AIAc\" disabled selected>Select Air AI level</option>\n";
echo "\$lvl_AIAc: $lvl_AIAc<br />\n";
if ($lvl_AIAc == "1") {
	echo "			<option value=\"1\" selected=\"selected\">1</option>\n";
	echo "			<option value=\"2\">2</option>\n";
	echo "			<option value=\"3\">3</option>\n";
} elseif($lvl_AIAc == '2') {
	echo "			<option value=\"1\">1</option>\n";
	echo "			<option value=\"2\" selected=\"selected\">2</option>\n";
	echo "			<option value=\"3\">3</option>\n";
} else {
	echo "			<option value=\"1\">1</option>\n";
	echo "			<option value=\"2\">2</option>\n";
	echo "			<option value=\"3\" selected=\"selected\">3</option>\n";
}
echo "		</select><br>\n";
echo "		<h3>Skill level for AI ground units (1=Low, 2=Medium, 3=High)</h3>\n";
echo "		<select name=\"lvl_AIGrnd\" id=\"database\">\n";
//echo "			<option value=\"$lvl_AIGrnd\" disabled selected>Select Ground AI level</option>\n";
if ($lvl_AIGrnd == 1) {
	echo "			<option value=\"1\" selected>1</option>\n";
	echo "			<option value=\"2\">2</option>\n";
	echo "			<option value=\"3\">3</option>\n";
} elseif($lvl_AIGrnd == 2) {
	echo "			<option value=\"1\">1</option>\n";
	echo "			<option value=\"2\" selected>2</option>\n";
	echo "			<option value=\"3\">3</option>\n";
} else {
	echo "			<option value=\"1\">1</option>\n";
	echo "			<option value=\"2\">2</option>\n";
	echo "			<option value=\"3\" selected>3</option>\n";
}
echo "		</select><br>\n";

echo "		<h3>Maximum ground speed (km/h)</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"spd_maxGrnd\" value='$spd_maxGrnd' autofocus ><br>\n";
echo "		<h3>Average column speed (km/h)</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"spd_maxTrnspt\" value='$spd_maxTrnspt' autofocus ><br>\n";
echo "		<h3>Ground spacing (m) between vehicles</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"sprd_suplPnts\" value='$sprd_suplPnts' autofocus ><br>\n";
echo "		<h3>Lineup time (min)</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"time_lineup\" value='$time_lineup' autofocus ><br>\n";
echo "		<h3>Mission flying time (min)</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"time_msn\" value='$time_msn' autofocus ><br>\n";
echo "		<h3>Detect deactivation time (min)</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"time_actvtUnit\" value='$time_actvtUnit' autofocus ><br>\n";
echo "	</fieldset>\n"; 

# BUTTON
echo "<fieldset id=\"actions\">\n";	
echo "		<button type=\"submit\" name =\"updateCampaignParameters\" id=\"loginSubmit\" value =\"4\" >Update Tuning Settings</button>\n"; # the value defines the action after the button was pressed
echo "	</fieldset>\n";

# Are We Done?
echo "		<h3>Configuration Complete?</h3>\n";
echo "		<select name=\"config_done\" id=\"database\">\n";
if ($status > 1) {
   echo "			<option value=\"true\" selected=\"selected\">yes</option>\n";
   echo "			<option value=\"false\" >no</option>\n";
} else {
   echo "			<option value=\"true\">yes</option>\n";
   echo "			<option value=\"false\" selected=\"selected\">no</option>\n";

}
echo "		</select><br>\n";
echo "	</fieldset>\n";
# BUTTON
echo "<fieldset id=\"actions\">\n";	
echo "		<button type=\"submit\" name =\"updateCampaignParameters\" id=\"loginSubmit\" value =\"5\" >Done?</button>\n"; # the value defines the action after the button was pressed
echo "	</fieldset>\n";
?>
