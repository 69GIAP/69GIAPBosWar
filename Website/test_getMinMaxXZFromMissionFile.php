<?php
// test_getMinMaxXZFromMissionFile.php
// =69.GIAP=TUSHKA
// Oct 25, 2013
// This test should set these values in 1916.campaign_settings.
// It requires the updated test.Mission that contains Influence Areas

// define $camp_link as a global variable so functions can pick it up
global $camp_link; // link to campaign db

// included required functions
require ('functions/connect2Campaign.php');
require ('functions/getMinMaxXZFromMissionFile.php');

// this is a stand-alone test, so define $camp_link
$camp_link = connect2Campaign('localhost','rofwar','rofwar','1916');

$mission_file_path = 'group_files';
$mission_file = 'test.Mission';

// call the function (it works silently if there are no errors)
get_minmaxxz_from_mission_file($mission_file_path,$mission_file);
?>
