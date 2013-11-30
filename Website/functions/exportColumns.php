<?php
// exportColumns.php
// export columns of a given coalition from columns table to a group file
// =69.GIAP=TUSHKA based on =69.GIAP=STENKA's poof-of-concept code
// Nov 21, 2013
// BOSWAR version 1.0
#stenka 23/11/13 correction to include the description field

function export_columns($CoalID) {

	global $camp_link;

	$abbrv = get_abbrv();
	echo "<br />\$abbrv: $abbrv<br />\n";

	$col_coalition = $CoalID;
	echo "\$col_coalition: $col_coalition<br />\n";

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

	$filename = "$abbrv"."_$_coalitionname"."_columns.Group";
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

	$query = "SELECT * from columns where CoalID='$CoalID'";
	if(!$result = $camp_link->query($query)) {
		echo "$query<br />\n";
		die('downloadColumns query error [' . $camp_link->error . ']');
	}

	$result = $camp_link->query($query);
	$num = $result->num_rows;
	if ($num > 0) {
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$current_rec = $row['id'];
			$current_columnID = $row['columnID'];
			$current_Name = $row['Name'];
			$col_moving = $row['Moving'];
			$col_Model = $row['Model'];
			$col_YOri = $row['YOri'];
			$col_qty = $row['Quantity'];
			$col_Country = $row['ckey'];
			$Supplypoint = $row['Supplypoint'];
			$Description = $row['Description'];			

			echo "\$current_rec: $current_rec<br />\n";
			echo "\$Supplypoint: $Supplypoint<br />\n";

			// here is where we start writing a record 
			$writestring="Vehicle\r\n";
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

			$supply_XPos = get_pointxpos($Supplypoint);
			echo "\$supply_XPos: $supply_XPos<br />\n";

			$supply_ZPos = get_pointzpos($Supplypoint);
			echo "\$supply_ZPos: $supply_ZPos<br />\n";
            
			// check if $index_no is odd or even and treat differently to give diagonal through origin
			if ($index_no & 1) {
				$col_XPos = $supply_XPos + (($index_no -1) * 5 * $ground_spacing);
				echo "\$col_XPos: $col_XPos<br />\n";
				$col_ZPos = $supply_ZPos - (($index_no -1) * 5 * $ground_spacing);
				echo "\$col_ZPos: $col_ZPos<br />\n";
			} else {
				$col_XPos = $supply_XPos - (($index_no -1) * 5 * $ground_spacing);
				echo "\$col_XPos: $col_XPos<br />\n";
				$col_ZPos = $supply_ZPos + (($index_no -1) * 5 * $ground_spacing);
				echo "\$col_ZPos: $col_ZPos<br />\n";
			}

			$writestring = '  XPos = '.number_format($col_XPos, 3, '.', '').";\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  YPos = 0.000;'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  ZPos = '.number_format($col_ZPos, 3, '.', '').";\r\n";	
			fwrite($fh,$writestring);
			
			// update position for this column in the columns table 	
			$query2 = "UPDATE columns SET XPos = '$col_XPos', ZPos = '$col_ZPos'
				WHERE id = '$current_rec';";
			if(!$result2 = $camp_link->query($query2)) {
				echo "$query2<br />\n";
				die('downloadColumns query2 error [' . $camp_link->error . ']');
			} else {
				echo "columns table XPos and ZPos updated for $current_Name<br />\n";
			}
			$writestring = '  XOri = 0.00;'."\r\n";	
			fwrite($fh,$writestring);
//			$writestring = '  YOri = '.$col_YOri.';'."\r\n";
			$writestring = '  YOri = 0.00;'."\r\n";
			fwrite($fh,$writestring);	
			$writestring = '  ZOri = 0.00;'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($col_Model).'.txt";'."\r\n";	
			fwrite($fh,$writestring);

			// get model path
			$col_Model = rtrim($col_Model);
			$query3 = "SELECT * from object_properties where Model = '$col_Model'LIMIT 1";
			if(!$result2 = $camp_link->query($query2)) {
				echo "$query3<br />\n";
				die('downloadColumns query2 error [' . $camp_link->error . ']');
			}
			$result3 = $camp_link->query($query3);
			$r3_data = $result3->fetch_row();
			if ($r3_data[0]) {
				echo "Model found is ".$r3_data[5]."<br />\n";
				echo "modelpath2 is ".$r3_data[7]."<br />\n";
				$modelpath2 = $r3_data[7];
				echo "modelpath3 is ".$r3_data[8]."<br />\n";
				$modelpath3 = $r3_data[8];		
			} else {
				echo'<p>'.mysqli_error($camp_link).'</p>';
			}
			$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\"."$modelpath3"."\\".rtrim($col_Model).'.mgm";'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  Desc = "'."$Description ";
						$writestring = $writestring.'";'."\r\n";
			fwrite($fh,$writestring);		
			$writestring = '  Country = '.$col_Country.';'."\r\n";
			fwrite($fh,$writestring);
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
			$writestring = '  XPos = '.number_format($col_XPos, 3, '.', '').';'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  YPos = 0.000;'."\r\n";	
			fwrite($fh,$writestring); 	
			$writestring = '  ZPos = '.number_format($col_ZPos, 3, '.', '').';'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  XOri = 0.00;'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  YOri = '.$col_YOri.';'."\r\n";	
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
