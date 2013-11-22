<?php
// turn this into a function  with $CoalID as argument.

// require getCoalitionname.php
require ('functions/getCoalitionname.php');
// require getCountryname.php
require ('functions/getCountryname.php');

$coalition1 = get_coalitionname(1);
$coalition2 = get_coalitionname(2);
//echo "\$coalition1: $coalition1<br />\n";
//echo "\$coalition2: $coalition2<br />\n";

$query1 = "SELECT Name, Description, ckey, Supplypoint from columns WHERE CoalID = '1';";

if(!$result = $camp_link->query($query1)){
	echo "$query1<br />\n";
	die('displayColumns query error:' . $camp_link->error);
}

echo "<h3>$coalition1 Columns:</h3><br />\n";

while ($obj = $result->fetch_object()) {
	$Name		=	$obj->Name;
	$Description	=	$obj->Description;
	$ckey		=	$obj->ckey;
	$Supplypoint	=	$obj->Supplypoint;

	$country_name = get_countryname($ckey);

	echo "$Name: $Description ($country_name) in Supply Point $Supplypoint<br />\n";
}
?>
