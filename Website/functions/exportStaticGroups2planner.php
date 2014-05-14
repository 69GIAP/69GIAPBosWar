<?php
// exportStaticGroups2planner.php
// export static groups of a given coalition from columns table to a group file
// =69.GIAP=TUSHKA based on =69.GIAP=STENKA's poof-of-concept code
// Dec 5, 2013
// BOSWAR version 1.0
// Note: calling page needs to require getAbbrv.php, getGroundspacing.php,
// getGroundAILevel.php, getCoalitionname.php, getPointXPos.php and
// getPointZPos.php
# Stenka conversion from exportStaticGroups

function export_staticgroups2planner($CoalID) {
	global $sim;
	global $camp_link,$loadedCampaign;

	$abbrv = get_abbrv();
	echo "<br />\$abbrv: $abbrv<br />\n";

	$static_coalition = $CoalID;
	echo "\$static_coalition: $static_coalition<br />\n";

	$ground_spacing = get_groundspacing();
	echo "\$ground_spacing: $ground_spacing<br />\n";

	$ground_ai_level = get_ground_ai_level();
	echo "\$ground_ai_level: $ground_ai_level<br />\n";

	$coalitionname = get_coalitionname($CoalID);
	echo "\$coalitionname: $coalitionname<br />\n";

    // replace any spaces in $coalitionname with underscores
	$_coalitionname = preg_replace('/ /','_',"$coalitionname");

	// define $DownloadDir
	$DownloadDir = 'downloads/';

	// make sure $DownloadDir exists
	if (!is_dir($DownloadDir)) {
		if (mkdir($DownloadDir)) {
			echo "$DownloadDir created.<br />\n";
		} else {
			echo "$DownloadDir WAS NOT created.<br />\n";
			return(false);
		}
	}

	$filename = "$abbrv"."_$_coalitionname"."_statics2planner.Group";
	$filename = "$DownloadDir"."$filename";
	echo "\$filename: $filename<br />\n";

	// remove any earlier version of this file
	if (file_exists($filename))
	{
		unlink($filename);
		echo "Old version of $filename has been deleted.<br />";
	}

	// index number 
	$index_no = 1;

	// open file for business
	$fh = fopen("$filename",'w') or die("Can not open $filename");

	$query = "SELECT * from statics where static_coalition = '$CoalID'";
	if(!$result = $camp_link->query($query)) {
		echo "$query<br />\n";
		die('exportStaticGroups query error [' . $camp_link->error . ']');
	}

	$result = $camp_link->query($query);
	$num = $result->num_rows;
	if ($num > 0) {
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$current_rec = $row['id'];
			$current_Name = $row['static_Name'];
			$static_Model = $row['static_Model'];
			$static_Type = $row['static_Type'];
			$static_Desc = $row['static_Desc'];
			$static_Country = $row['static_Country'];
			$static_supplypoint = $row['static_supplypoint'];
			$static_XPos = $row['static_XPos'];
			$static_ZPos = $row['static_ZPos'];
			$static_YOri = $row['static_YOri'];

			echo "\$current_rec: $current_rec<br />\n";
			echo "\$static_supplypoint: $static_supplypoint<br />\n";

			// here is where we start writing a record
			$writestring="$static_Type\r\n";
			fwrite($fh,$writestring);
			$writestring="{\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Name = "'.$current_Name.'";'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Index = '.$index_no.";\r\n";
			fwrite($fh,$writestring);
			$index_no=($index_no+1);
			$writestring = '  LinkTrId = '.($index_no).";\r\n";
			fwrite($fh,$writestring);

			$supply_XPos = get_pointxpos($static_supplypoint);
			echo "\$supply_XPos: $supply_XPos<br />\n";

			$supply_ZPos = get_pointzpos($static_supplypoint);
			echo "\$supply_ZPos: $supply_ZPos<br />\n";
            if ($static_XPos == 0)
			{
				// check if $index_no is odd or even and treat differently to give diagonal through origin
				if ($index_no & 1) {
					$static_XPos = $supply_XPos - (($index_no -1) * 5 * $ground_spacing);
					echo "\$static_XPos: $static_XPos<br />\n";
//					$static_ZPos = $supply_ZPos + (($index_no -1) * 5 * $ground_spacing);
					$static_ZPos = $supply_ZPos + ($current_rec * 5 * $ground_spacing);
					echo "\$static_ZPos: $static_ZPos<br />\n";
				} else {
					$static_XPos = $supply_XPos + (($index_no -1) * 5 * $ground_spacing);
					echo "\$static_XPos: $static_XPos<br />\n";
//					$static_ZPos = $supply_ZPos - (($index_no -1) * 5 * $ground_spacing);
					$static_ZPos = $supply_ZPos - ($current_rec * 5 * $ground_spacing);
					echo "\$static_ZPos: $static_ZPos<br />\n";
				}
			}
			$writestring = '  XPos = '.number_format($static_XPos, 3, '.', '').";\r\n";
			fwrite($fh,$writestring);
			$writestring = '  YPos = 0.000;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  ZPos = '.number_format($static_ZPos, 3, '.', '').";\r\n";
			fwrite($fh,$writestring);
			
			// update position for this object in the statics table
			$query2 = "UPDATE $loadedCampaign.statics SET
				static_XPos = '$static_XPos', static_ZPos = '$static_ZPos'
				WHERE id = '$current_rec';";
			if(!$result2 = $camp_link->query($query2)) {
				echo "$query2<br />\n";
				die('exportStaticGroups query2 error [' . $camp_link->error . ']');
			} else {
				echo "static table XPos and ZPos updated for $current_Name<br />\n";
			}
			$writestring = '  XOri = 0.00;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  YOri = 0.00;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  ZOri = 0.00;'."\r\n";
			fwrite($fh,$writestring);
			if ($sim == "RoF")
			{
				$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($static_Model).'.txt";'."\r\n";
			}
			else
			{
				if ($static_Type == "Aerostat")
				{
				$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Aerostats\\".rtrim($static_Model).'.txt";'."\r\n";			
				}
				if ($static_Type == "Block")
				{
				$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Blocks\\".rtrim($static_Model).'.txt";'."\r\n";			
				}				
				if ($static_Type == "Flag")
				{
				$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Flags\\".rtrim($static_Model).'.txt";'."\r\n";			
				}								
				if ($static_Type == "Ship")
				{
				$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Ships\\".rtrim($static_Model).'.txt";'."\r\n";			
				}												
				if ($static_Type == "Train")
				{
				$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Trains\\".rtrim($static_Model).'.txt";'."\r\n";			
				}				
				if ($static_Type == "Vehicles")
				{
				$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Vehicles\\".rtrim($static_Model).'.txt";'."\r\n";			
				}
			}
			fwrite($fh,$writestring);

			// get model path
			$static_Model = rtrim($static_Model);
			$query3 = "SELECT * from object_properties where Model = '$static_Model'LIMIT 1";
			if(!$result3 = $camp_link->query($query3)) {
				echo "$query3<br />\n";
				die('exportStaticGroups query2 error [' . $camp_link->error . ']');
			}
			$result3 = $camp_link->query($query3);
			$r3_data = $result3->fetch_row();
			if ($r3_data[0]) {
				echo "Model found is ".$r3_data[6]."<br />\n";
				echo "modelpath2 is ".$r3_data[8]."<br />\n";
				$modelpath2 = $r3_data[8];
				echo "modelpath3 is ".$r3_data[9]."<br />\n";
				$modelpath3 = $r3_data[9];
			} else {
				echo'<p>'.mysqli_error($camp_link).'</p>';
			}
			// Block and Flag do not have modelpath3
			if ($static_Type == 'Block' || $static_Type == 'Flag') {
				$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\".rtrim($static_Model).'.mgm";'."\r\n";
			} else {
				$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\"."$modelpath3"."\\".rtrim($static_Model).'.mgm";'."\r\n";
			}
			fwrite($fh,$writestring);
			$writestring = '  Desc = "'."$static_Desc ";
						$writestring = $writestring.$coalitionname.' static";'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Country = '.$static_Country.';'."\r\n";
			fwrite($fh,$writestring);
			if ($static_Type == "Train")
			{
				$writestring = '  Vulnerable = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Engageable = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  LimitAmmo = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  AILevel = '."$ground_ai_level".';'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DamageReport = 50;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DamageThreshold = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DeleteAfterDeath = 1;'."\r\n";
				fwrite($fh,$writestring);
				if ($sim = "BoS")
				{
				$writestring = '  CoopStart = 0;'."\r\n";				
				fwrite($fh,$writestring);	
				$writestring = '  Spotter = -1;'."\r\n";				
				fwrite($fh,$writestring);
				$writestring = '  BeaconChannel = 0;'."\r\n";				
				fwrite($fh,$writestring);		
				$writestring = '  Callsign = 0;'."\r\n";				
				fwrite($fh,$writestring);
				}
			} 
			elseif ($static_Type == "Block")
			{
				$writestring = '  Durability = 25000;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DamageReport = 50;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DamageThreshold = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DeleteAfterDeath = 1;'."\r\n";
				fwrite($fh,$writestring);
			}
			elseif ($static_Type == "Flag")
			{
				$writestring = '  StartHeight = 0;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  SpeedFactor = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  BlockThreshold = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Radius = 1000;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Type = 0;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  CountPlanes = 0;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  CountVehicles = 0;'."\r\n";
				fwrite($fh,$writestring);
			}
			elseif ($static_Type == 'Vehicle')
			{
				$writestring = '  NumberInFormation = 0;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Vulnerable = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Engageable = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  LimitAmmo = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  AILevel = '."$ground_ai_level".';'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DamageReport = 50;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DamageThreshold = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DeleteAfterDeath = 1;'."\r\n";
				fwrite($fh,$writestring);				
				if ($sim = "BoS")
				{
				$writestring = '  CoopStart = 0;'."\r\n";				
				fwrite($fh,$writestring);	
				$writestring = '  Spotter = -1;'."\r\n";				
				fwrite($fh,$writestring);
				$writestring = '  BeaconChannel = 0;'."\r\n";				
				fwrite($fh,$writestring);		
				$writestring = '  Callsign = 0;'."\r\n";				
				fwrite($fh,$writestring);
				}
			}
			elseif ($static_Type == 'Aerostat') 
			{
				$writestring = '  Vulnerable = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Engageable = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  LimitAmmo = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  AILevel = '."$ground_ai_level".';'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DamageReport = 50;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DamageThreshold = 1;'."\r\n";	
				fwrite($fh,$writestring);
				$writestring = '  DeleteAfterDeath = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Radius = 1000;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Fuel = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  PayloadId = 0;'."\r\n";
				fwrite($fh,$writestring);	
			}
			elseif ($static_Type == 'Ship') 
			{
				$writestring = '  Vulnerable = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Engageable = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  LimitAmmo = 1;'."\r\n";
				$writestring = '  AILevel = '."$ground_ai_level".';'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DamageReport = 50;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  DamageThreshold = 1;'."\r\n";
				fwrite($fh,$writestring);			
				$writestring = '  DeleteAfterDeath = 1;'."\r\n";
			}
			fwrite($fh,$writestring);
			$writestring = '}'."\r\n";
			fwrite($fh,$writestring);
			$writestring = ''."\r\n";
			fwrite($fh,$writestring);
			$writestring = 'MCU_TR_Entity'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '{'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Index = '.$index_no.';'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Name = "'.$current_Name.' entity'.'"'.';'."\r\n";		
			fwrite($fh,$writestring);
			$writestring = '  Desc = "";'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Targets = [];'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Objects = [];'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  XPos = '.number_format($static_XPos, 3, '.', '').';'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  YPos = 0.000;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  ZPos = '.number_format($static_ZPos, 3, '.', '').';'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  XOri = 0.00;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  YOri = 0.00;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  ZOri = 0.00;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Enabled = 1;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  MisObjID = '.($index_no-1).';'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '}'."\r\n";
			fwrite($fh,$writestring);
			$writestring = ''."\r\n";
			fwrite($fh,$writestring);
			$index_no=($index_no+1);
		}
	}
	$result->free();
	fclose($fh);
	echo "$num Records processed<br />\n";
}
?>
