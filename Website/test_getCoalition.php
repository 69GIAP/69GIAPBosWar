<?php
// define $camp_link as a global variable so functions can pick it up
global $camp_link; // link to campaign db

// included required functions
require ('functions/connect2Campaign.php');
require ('functions/getCoalition.php');

// this is a stand-alone test, so define $camp_link
$camp_link = connect2Campaign('localhost','rofwar','rofwar','1916');

// define the country
// ckey = country
// 0 = neutral
// 101 = France
// 102 = Great Britain
// 103 = USA
// 104 = Italy
// 105 = Russia
// 501 = Germany
// 502 = Austro-Hungary
$country = 502;

// call the function
$CoalID = get_coalition($country);

// display the result
echo "Result: country $country is in coalition $CoalID<br>\n";
?>
