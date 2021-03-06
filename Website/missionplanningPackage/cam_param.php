<?php
# V1.0<br />
# Stenka 21/9/13<br />
# loading campaign variables into memory<br />
# Tushka updated to use campaign_settings and supply_points
# rather than cam_param
# Oct 18, 2013

$query = "SELECT * from campaign_settings";
// there is only one row in a campaign's version of campaign_settings
if ($result = mysqli_query($camp_link, $query)) {
   // get results
   while ($obj = mysqli_fetch_object($result)) {
      define('CAM_SIM', "$obj->simulation");
      define('CAM_MAP', "$obj->map");
      define('CAM_BOT_LEFT_Z', "$obj->min_z");
      define('CAM_BOT_LEFT_X', "$obj->min_x");
      define('CAM_TOP_RIGHT_X', "$obj->max_x");
      define('CAM_TOP_RIGHT_Z', "$obj->max_z");
      define('CAM_DETECT_DIST', "$obj->air_detect_distance");
      define('CAM_DETECT_AIR', "$obj->air_detect_distance");
      define('CAM_DETECT_GROUND', "$obj->ground_detect_distance");
      define('CAM_GROUND_AI_LEVEL', "$obj->ground_ai_level");
      define('CAM_AIR_AI_LEVEL', "$obj->air_ai_level");
      define('CAM_GROUND_MAX_SPEED', "$obj->ground_max_speed_kmh");
      define('CAM_GROUND_TRANSPORT_SPEED', "$obj->ground_transport_speed_kmh");
      define('CAM_GROUND_SPACING', "$obj->ground_spacing");
      define('CAM_LINEUP_TIME', "$obj->lineup_minutes");
      define('CAM_MISSION_TIME', "$obj->mission_minutes");
      define('CAM_DETECT_OFF_TIME', "$obj->detect_off_time");
//      echo CAM_DETECT_OFF_TIME;

   }
   // free result set
   mysqli_free_result($result); 
} else { 
   die('There was an error running the query [' . $camp_link->error . ']');
}

// get results for 'red' supply points
$query = "SELECT * from supply_points WHERE CoalID ='1'";
if ($result = $camp_link->query($query)){
   $i = 0; 
   while ($obj = mysqli_fetch_object($result)) {
      // this time there are likely to be several rows.  Count them.
      ++$i;
      // this is ugly, but forced by Stenka's rigid definitions
      if ($i == 1) {
         define("CAM_RED_SUPPLY_1_X","$obj->xPos");	
         define("CAM_RED_SUPPLY_1_Z","$obj->zPos");	
//         echo "red<br>\n";
//         echo CAM_RED_SUPPLY_1_X."<br>\n";
//         echo CAM_RED_SUPPLY_1_Z."<br>\n";
      } elseif ($i == 2) {
         define("CAM_RED_SUPPLY_2_X","$obj->xPos");	
         define("CAM_RED_SUPPLY_2_Z","$obj->zPos");	
//         echo CAM_RED_SUPPLY_2_X."<br>\n";
//         echo CAM_RED_SUPPLY_2_Z."<br>\n";
      } elseif ($i == 3) {
         define("CAM_RED_SUPPLY_3_X","$obj->xPos");	
         define("CAM_RED_SUPPLY_3_Z","$obj->zPos");	
//         echo CAM_RED_SUPPLY_3_X."<br>\n";
//         echo CAM_RED_SUPPLY_3_Z."<br>\n";
      }
   }
   // free result set
   mysqli_free_result($result); 
} else { 
   die('There was an error running the query [' . $camp_link->error . ']');
}
// get results for 'blue' supply points
$query = "SELECT * from supply_points WHERE CoalID ='2'";
if ($result = $camp_link->query($query)){
   $i = 0; 
   while ($obj = mysqli_fetch_object($result)) {
      ++$i;
      if ($i == 1) {
         define("CAM_BLUE_SUPPLY_1_X","$obj->xPos");	
         define("CAM_BLUE_SUPPLY_1_Z","$obj->zPos");	
//         echo "blue<br>\n";
//         echo CAM_BLUE_SUPPLY_1_X."<br>\n";
//         echo CAM_BLUE_SUPPLY_1_Z."<br>\n";
      } elseif ($i == 2) {
         define("CAM_BLUE_SUPPLY_2_X","$obj->xPos");	
         define("CAM_BLUE_SUPPLY_2_Z","$obj->zPos");	
//         echo CAM_BLUE_SUPPLY_2_X."<br>\n";
//         echo CAM_BLUE_SUPPLY_2_Z."<br>\n";
      } elseif ($i == 3) {
         define("CAM_BLUE_SUPPLY_3_X","$obj->xPos");	
         define("CAM_BLUE_SUPPLY_3_Z","$obj->zPos");	
//         echo CAM_BLUE_SUPPLY_3_X."<br>\n";
//         echo CAM_BLUE_SUPPLY_3_Z."<br>\n";
      }
   }
   // free result set
   mysqli_free_result($result); 
} else { 
   die('There was an error running the query [' . $camp_link->error . ']');
}
?>
