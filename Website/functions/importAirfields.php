<?php
// importAirfields
// V1.2
// Stenka 21/10/13
// Updated by =69.GIAP=TUSHKA
// Nov 13, 2013
// Php version of loading all airfields into our airfields table
// $SaveToDir is the path to where the user keeps the group files
// $file is the name of the imported file

function import_airfields($SaveToDir,$file) {

	global $camp_link;

	$q1="DELETE FROM airfields";
	$r1= $camp_link->query($q1);
	if ($r1) {
//		echo '<br>All existing airfields deleted';
	} else {
		echo'<p>'.$camp_link->error().'</p>';
	}
	$count = 0;
	$current_object = "Unknown";
	$current_Name = "Unknown";
	$current_airfield_Name = "Unknown";
	$Country = 0;
	$coalition = 0;
	$Hydrodrome = 0;
	$Enabled = 0;
	$filename = $SaveToDir.'/'.$file;
//	echo '<br>Filename is :'.$filename;
	$fp = fopen( $filename, "r" ) or die("Couldn't open $filename");
	while ( ! feof( $fp ) ) {
		$line = fgets( $fp, 1024 );
//		print "$line<br>";
		if (substr($line,0,8) == 'Airfield') {
			$current_object = 'Airfield';
//			echo '<br> Found a :'.$current_object;
			$count = 0;
		}

		if (substr($line,0,13) == 'MCU_TR_Entity') {
			$current_object = 'MCU_TR_Entity';
//			echo '<br> Found a :'.$current_object;
			$count = 0;
		}		

		if (substr($line,0,9)=="  Name = ") {
			$current_Name = substr($line,10,50);
			$current_Name = rtrim($current_Name);
			$current_Name = substr($current_Name,0,-2);
			if ($current_object == 'Airfield') {
				$current_airfield_Name = $current_Name;
			}
//			echo '<br> Name is :'.$current_Name;
		}

		if (substr($line,0,9)=="  XPos = ") {
			$XPos = substr($line,9,50);
			$XPos = rtrim($XPos);
			$XPos = substr($XPos,0,-1);
			$XPos = floatval($XPos);
//			echo '<br> Xpos is :'.$XPos;
		}

		if (substr($line,0,9)=="  ZPos = ") {
			$ZPos = substr($line,9,50);
			$ZPos = rtrim($ZPos);
			$ZPos = substr($ZPos,0,-1);
			$ZPos = floatval($ZPos);
//			echo '<br> ZPos is :'.$ZPos;
		}

		if (substr($line,0,9)=="  YOri = ") {
			$YOri = substr($line,9,50);
			$YOri = rtrim($YOri);
			$YOri = substr($YOri,0,-1);
			$YOri = floatval($YOri);
//			echo '<br> YOri is :'.$YOri;
		}

		if (substr($line,0,9)== "  Model =") {
			$Model = substr(strrchr($line, "\\"), 1);
			$Model = rtrim($Model);
			$Model = substr($Model,0,-6);
//			echo '<br>Model is :'.$Model;
		}

		if (substr($line,0,12)=="  Country = ") {
			$Country = substr($line,12,50);
			$Country = rtrim($Country);
			$Country = substr($Country,0,-1);
			$Country = floatval($Country);
//			echo '<br> Country is :'.$Country;
		}	

		if (substr($line,0,15)=="  Hydrodrome = ") {
			$Hydrodrome = substr($line,15,50);
			$Hydrodrome = rtrim($Hydrodrome);
			$Hydrodrome = substr($Hydrodrome,0,-1);
			$Hydrodrome = floatval($Hydrodrome);
//			echo '<br> Hydrodrome is :'.$Hydrodrome;
		}	

		if (substr($line,0,13)=="  Enabled = 0") {
			$Enabled = 0;
//			echo '<br> Enabled is 0';
		}	

		if (substr($line,0,13)=="  Enabled = 1") {
			$Enabled = 1;
//			echo '<br> Enabled is 1';
		}

		if (substr($line,0,1)=='}' AND ($current_object == 'Airfield')) {
//			echo '<br> Updating';
			// find coalition
			$coalition = 0;
			$q99 = 'SELECT * from countries where ckey = '.$Country.' LIMIT 1';
			$r99 = $camp_link->query($q99);
			$r99_data = $r99->fetch_row();
			if ($r99_data[0]) {
//				echo "<br> Country found is".$r99_data[3];
//				echo "<br> Coalition is".$r99_data[4];
				$coalition = $r99_data[4];
			}else {
//				echo'<p>'.mysqli_error($camp_link).'</p>';
			}
			$q2="INSERT INTO airfields (airfield_Name,airfield_Model,airfield_Country,airfield_Coalition,airfield_XPos,airfield_ZPos,airfield_YOri,airfield_Hydrodrome)
			VALUES ('$current_Name','$Model','$Country','$coalition',$XPos,$ZPos,$YOri,$Hydrodrome)";
//			echo '<br> My select is:'.$q2;
			$r2=$camp_link->query($q2);
			if ($r2) {
//				echo '<br> Airfield added:';
			} else {
//				echo'<p>'.$camp_link->error().'</p>';
			}	
			$current_object = '';
		}	

		if (substr($line,0,1)=='}' AND ($current_object == 'MCU_TR_Entity')) {
//			echo '<br> Updating';
			# update record
			$q2="UPDATE airfields SET airfield_enabled = ".$Enabled." WHERE airfield_Name = '".$current_airfield_Name."'";
//			echo '<br> My select is:'.$q2;
			$r2=$camp_link->query($q2);
			if ($r2) {
				echo '<br> active airfield updated:';
			} else {
				echo'<p>'.$camp_link->error().'</p>';
			}	
			$current_object = '';
		}
	}	
	// do not close $camp_link... needed later in process
}
