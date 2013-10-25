<?php
// test_getCountriesFromMissionFile.php
// =69.GIAP=TUSHKA
// Oct 25, 2013
// For a proper test, first edit the 1916.rof_countries table so that
// all countries are neutral.  Then run this test.
// This test should set 1916.rof_countries back to normal.

// define $camp_link as a global variable so functions can pick it up
global $camp_link; // link to campaign db

// included required functions
require ('functions/connect2Campaign.php');
require ('functions/getCountriesFromMissionFile.php');

// this is a stand-alone test, so define $camp_link
$camp_link = connect2Campaign('localhost','rofwar','rofwar','1916');

$mission_file_path = 'group_files';
$mission_file = 'test.Mission';

// call the function (it works silently if there are no errors)
get_countries_from_mission_file($mission_file_path,$mission_file);
?>
