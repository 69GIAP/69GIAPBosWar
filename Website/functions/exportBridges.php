<?php
// exportBridges.php
// export Bridges of a given coalition from Bridges table to a group file
// =69.GIAP=STENKA's poof-of-concept code
// 13/12/13
// BOSWAR version 1.03

function export_bridges($CoalID) {

	global $camp_link;

	$abbrv = get_abbrv();
	echo "<br />\$abbrv: $abbrv<br />\n";

	$col_coalition = $CoalID;
	echo "\$col_coalition: $col_coalition<br />\n";

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

	$filename = "$abbrv"."_$_coalitionname"."_bridges.Group";
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

	$query = "SELECT * from bridges where CoalID='$CoalID'";
	if(!$result = $camp_link->query($query)) {
		echo "$query<br />\n";
		die('exportBridges query error [' . $camp_link->error . ']');
	}

	$result = $camp_link->query($query);
	$num = $result->num_rows;
	if ($num > 0) {
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$current_rec = $row['id'];
			$current_Name = $row['Name'];
			$Model = $row['Model'];
			$Description = $row['Description'];
			$Country = $row['ckey'];
			$CoalID = $row['CoalID';
			$XPos = $row['XPos'];			
			$ZPos = $row['ZPos'];				
			$YOri = $row['YOri'];
			$damage_1 = $row['damage_1'];
			$damage_2 = $row['damage_2'];			
			$damage_3 = $row['damage_3'];			
			$damage_4 = $row['damage_4'];			
			$damage_5 = $row['damage_5'];
			$damage_6 = $row['damage_6'];
			$damage_7 = $row['damage_7'];
			$damage_8 = $row['damage_8'];			
			$damage_9 = $row['damage_9'];			
			$damage_10 = $row['damage_10'];	
			$damaged = $damage_1 + $damage_2 + $damage_3 + $damage_4 + $damage_5 + $damage_6 + $damage_7 + $damage_8 + $damage_8 + $damage_9 + $damage_10;
			// here is where we start writing a record
			$writestring="Bridge\r\n";
			fwrite($fh,$writestring);
			$writestring="{\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Name = "'.$current_Name.'";'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Index = '.$index_no.";\r\n";
			fwrite($fh,$writestring);
			$index_no=($index_no+1);
			$writestring = '  LinkTrId = 0;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  XPos = '.number_format($XPos, 3, '.', '').";\r\n";
			fwrite($fh,$writestring);
			$writestring = '  YPos = 0.000;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  ZPos = '.number_format($ZPos, 3, '.', '').";\r\n";
			fwrite($fh,$writestring);
			$writestring = '  XOri = 0.00;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  YOri = ' .number_format($YOri, 2, '.', '').";\r\n";
			fwrite($fh,$writestring);
			$writestring = '  ZOri = 0.00;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Model = "graphics'."\\".'bridges'."\\".rtrim($Model).'.mgm";'."\r\n";			
			fwrite($fh,$writestring);
			$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($Model).'.txt";'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Country = '.$Country.';'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Desc = "";'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Durability = 25000;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  DamageReport = 50;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  DamageThreshhold = 1;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  DeleteAfterDeath = 1'."$ground_ai_level".';'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  DamageReport = 50;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  DamageThreshold = 1;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  DeleteAfterDeath = 1;'."\r\n";
			fwrite($fh,$writestring);
			if ($damaged > 0) 
			{
			$writestring = '  Damaged'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  {'."\r\n";
			fwrite($fh,$writestring);
				if ($damaged_1 > 0)
				{
				$writestring = '    1 = '.$damaged_1.";\r\n";
				fwrite($fh,$writestring);
				}
				if ($damaged_2 > 0)
				{
				$writestring = '    2 = '.$damaged_2.";\r\n";
				fwrite($fh,$writestring);
				}			
			
			$writestring = '  }'."\r\n";
			fwrite($fh,$writestring);			
			}
			$writestring = '}'."\r\n";
			$index_no=($index_no+1);
		}
	}
	$result->free();
	fclose($fh);
	echo "$num Records processed<br />\n";
}
?>
