<?php
// test_getMapFromMissionFile.php
// =69.GIAP=TUSHKA
// Oct 31, 2013
// This test should set ...

// define $camp_link as a global variable so functions can pick it up
global $camp_link; // link to campaign db

// included required functions
require ('functions/connect2Campaign.php');
require ('functions/getMapFromMissionFile.php');

// this is a stand-alone test, so define $camp_link
$camp_link = connect2Campaign('localhost','rofwar','rofwar','1916');

$mission_file_path = 'group_files';
$mission_file = 'test.Mission';

// call the function (it works silently if there are no errors)
get_map_from_mission_file($mission_file_path,$mission_file);

// close $camp_link
$camp_link->close();
?>
