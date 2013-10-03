# V1.0
# Stenka 29/9/13
# Php to preprocess a mission file
<?php
# require is connecting user peter to stalingrad1 database
# here
require('../connect_db.php');
$XPos = 10;
$ZPos = 20;
$dest_XPos = 31000;
$dest_ZPos = 31000;
$speed= 20;
$time_availiable= 90;
$distance_possible = 0;
$deltax = ($dest_XPos-$XPos);
$deltaz = ($dest_ZPos-$ZPos);
$tripdistance = sqrt(($deltax*$deltax) + ($deltaz*$deltaz));
echo '<br> tripdistance :'.$tripdistance;
$triptime_hr = ($tripdistance/1000)/$speed;
echo '<br> time in hours: '.$triptime_hr;
$triptime_min = $triptime_hr*60;
echo '<br> time in mins: '.$triptime_min; 
if ($time_availiable < $triptime_min)
{
$fractiontraveled = ($time_availiable/$triptime_min);
$dest_XPos = $XPos + ($deltax * $fractiontraveled);
$dest_ZPos = $ZPos + ($deltax * $fractiontraveled);
}
echo '<br> Final destination x:'.$dest_XPos;
echo '<br> Final destination Z:'.$dest_ZPos;