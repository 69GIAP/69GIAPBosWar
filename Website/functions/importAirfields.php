<?php
// importAirfields
// V1.03
// Stenka 21/10/13
// Updated by =69.GIAP=TUSHKA
// Nov 13, 2013
// Php version of loading all airfields into our airfields table
// $SaveToDir is the path to where the user keeps the group files
// $file is the name of the imported file
# 22/11/13 stenka rework in order to hit .mission files and handle groups
# 17/5/14 Stenka adding airfield points to make it compatible to BoS
// June 7, 2014 - Tushka made airfield_points apply only to BoS

function import_airfields($SaveToDir,$file) {

	global $camp_link;
	global $sim;

	$q1="DELETE FROM airfields";
	$r1= $camp_link->query($q1);
	if ($r1) {
		echo '<br>All existing airfields deleted';
	} else {
		echo '<p>'.$camp_link->error.'</p>';
	}

	if ($sim == 'BoS') {
		$q2="DELETE FROM airfields_points";
		$r2= $camp_link->query($q2);
		if ($r2) {
			echo '<br>All existing airfield points deleted';
		} else {
			echo '<p>'.$camp_link->error.'</p>';
		}
	}

	$count = 0;
	$current_object = "Unknown";
	$current_Name = "Unknown";
	$current_airfield_Name = "Unknown";
	$Country = 0;
	$coalition = 0;
	$Hydrodrome = 0;
	$Enabled = 0;
	$points = 0;
	$Type = 0;
	$X = 0;
	$Y = 0;
	$filename = $SaveToDir.'/'.$file;
//	echo '<br>Filename is :'.$filename;
	$fp = fopen( $filename, "r" ) or die("Couldn't open $filename");
	while ( ! feof( $fp ) ) {
		$line = fgets( $fp, 1024 );
//		print "$line<br>";
		if (substr($line,0,8) == 'Airfield' or substr($line,2,8) == 'Airfield') {
			$current_object = 'Airfield';
//			echo '<br> Found a :'.$current_object;

			$count = 0;
		}
// sequence to save airfield runways
if ($points == 1)
{
		if (substr($line,0,13)=="      Type = ") {
			$current_Type = substr($line,14,1);
			$Type = floatval($current_Type);
			echo '<br> Type is :'.$Type;
		}
		if (substr($line,2,13)=="      Type = ") {
			$current_Type = substr($line,16,1);
			$Type = floatval($current_Type);
			echo '<br> Type is :'.$Type;
		}		
		if (substr($line,0,10)=="      X = ") {
			$current_X = substr($line,11,30);
			$current_X = rtrim($current_X);
			$current_X = substr($current_X,0,-1);
			$X = floatval($current_X);
			echo '<br> X is :'.$X;
		}
		if (substr($line,2,10)=="      X = ") {
			$current_X = substr($line,13,30);
			$current_X = rtrim($current_X);
			$current_X = substr($current_X,0,-1);
			$X = floatval($current_X);
			echo '<br> X is :'.$X;
		}
		if (substr($line,0,10)=="      Y = ") {
			$current_Y = substr($line,11,30);
			$current_Y = rtrim($current_Y);
			$current_Y = substr($current_Y,0,-1);
			$Y = floatval($current_Y);
			echo '<br> Y is :'.$Y;
		}
		if (substr($line,2,10)=="      Y = ") {
			$current_Y = substr($line,13,30);
			$current_Y = rtrim($current_Y);
			$current_Y = substr($current_Y,0,-1);
			$Y = floatval($current_Y);
			echo '<br> Y is :'.$Y;
		}
		if ((substr($line,0,10)=="      Y = ") or (substr($line,2,10)=="      Y = "))
		{
		// here we save to airfields_points
				$q7="INSERT INTO airfields_points (airfield_Name,Type,X,Y)
				VALUES ('$current_Name','$current_Type','$current_X','$current_Y')";
				echo '<br> My select is:'.$q7;
				$r7=$camp_link->query($q7);
				if ($r7) 
				{
					echo '<br> Airfield Points added:';
				} 
				else 
				{
					echo'<p>'.$camp_link->error.'</p>';
				}	
		}
}
// end of sequence to save airfield runways
		if (substr($line,0,9)=="  Name = ") {
			$current_Name = substr($line,10,50);
			$current_Name = rtrim($current_Name);
			$current_Name = substr($current_Name,0,-2);
			$points = 0;
			if ($current_object == 'Airfield') {
				$current_airfield_Name = $current_Name;
			}
//			echo '<br> Name is :'.$current_Name;
		}
		if (substr($line,2,9)=="  Name = ") {
			$current_Name = substr($line,12,50);
			$current_Name = rtrim($current_Name);
			$current_Name = substr($current_Name,0,-2);
			$points = 0;
			if ($current_object == 'Airfield') {
				$current_airfield_Name = $current_Name;
			}
//			echo '<br> Name is :'.$current_Name;
		}
		if ($current_airfield_Name == "Airfield")
		{
		$current_airfield_Name = $current_airfield_Name . " " .$count ;
		}
		if (substr($line,0,9)=="  XPos = ") {
			$XPos = substr($line,9,50);
			$XPos = rtrim($XPos);
			$XPos = substr($XPos,0,-1);
			$XPos = floatval($XPos);
//			echo '<br> Xpos is :'.$XPos;
		}
		if (substr($line,2,9)=="  XPos = ") {
			$XPos = substr($line,11,50);
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
		if (substr($line,2,9)=="  ZPos = ") {
			$ZPos = substr($line,11,50);
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
		if (substr($line,2,9)=="  YOri = ") {
			$YOri = substr($line,11,50);
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
		if (substr($line,2,9)== "  Model =") {
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
		if (substr($line,2,12)=="  Country = ") {
			$Country = substr($line,14,50);
			$Country = rtrim($Country);
			$Country = substr($Country,0,-1);
			$Country = floatval($Country);
//			echo '<br> Country is :'.$Country;
		}	

		
		if (substr($line,0,7)=="  Chart") {
			$points = 1;
//			echo '<br> There are runways';
		}	
		if (substr($line,2,7)=="  Chart") {
			$points = 1;
//			echo '<br> There are runways';
		}	
// 		This ends the runway points sequence
		if ((substr($line,0,14)=="  ReturnPlanes") or (substr($line,2,14)=="  ReturnPlanes"))
		{
			$points = 0;
		}
		if (substr($line,0,15)=="  Hydrodrome = ") {
			$Hydrodrome = substr($line,15,50);
			$Hydrodrome = rtrim($Hydrodrome);
			$Hydrodrome = substr($Hydrodrome,0,-1);
			$Hydrodrome = floatval($Hydrodrome);
//			echo '<br> Hydrodrome is :'.$Hydrodrome;
		}	
		if (substr($line,2,15)=="  Hydrodrome = ") {
			$Hydrodrome = rtrim($Hydrodrome);
			$Hydrodrome = substr($Hydrodrome,0,-1);
			$Hydrodrome = floatval($Hydrodrome);
//			echo '<br> Hydrodrome is :'.$Hydrodrome;
		}
		if (substr($line,0,12)=="  LinkTrId =") 
		{
			if (substr($line,0,14)== "  LinkTrId = 0")
			{
			$Enabled = 0;
			}
			else
			{
			$Enabled = 1;
			}
//			echo '<br> Enabled is 0';
		}	
		if (substr($line,2,12)=="  LinkTrId =") 
		{
			if (substr($line,2,14)== "  LinkTrId = 0")
			{
			$Enabled = 0;
			}
			else
			{
			$Enabled = 1;
			}
//			echo '<br> Enabled is 0';
		}	

		if (substr($line,0,1)=='}' or substr($line,2,1)=='}')
		{
			if ($current_object == 'Airfield')
			{
//				echo '<br> Updating';
				// find coalition
				$coalition = 0;
				$q99 = 'SELECT * from countries where ckey = '.$Country.' LIMIT 1';
				$r99 = $camp_link->query($q99);
				$r99_data = $r99->fetch_row();
				if ($r99_data[0]) 
					{
//					echo "<br> Country found is".$r99_data[3];
//					echo "<br> Coalition is".$r99_data[4];
					$coalition = $r99_data[4];
					}
				else 
					{
//					echo'<p>'.mysqli_error($camp_link).'</p>';
					}
				$q2="INSERT INTO airfields (airfield_Name,airfield_Model,airfield_Country,airfield_Coalition,airfield_XPos,airfield_ZPos,airfield_YOri,airfield_Hydrodrome,airfield_Enabled)
				VALUES ('$current_Name','$Model','$Country','$coalition',$XPos,$ZPos,$YOri,$Hydrodrome,$Enabled)";
//				echo '<br> My select is:'.$q2;
				$r2=$camp_link->query($q2);
				if ($r2) 
				{
//					echo '<br> Airfield added:';
				} 
				else 
				{
//					echo'<p>'.$camp_link->error().'</p>';
				}	
				$current_object = '';
				$count = $count + 1;
			}
		}	
	}	
	// do not close $camp_link... needed later in process
}
