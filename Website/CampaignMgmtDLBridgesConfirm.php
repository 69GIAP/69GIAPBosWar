<?php 
# Stenka 1/1/14 added air AI Level
# Stenka 14/5/14 update for BOS

// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
		
// Include the webside header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
			<?php
			echo "The purpose of this session is to output a .Group file containing the Airfields and Bridges in the active sector of a campaign. This can be used at any time in the template or mission building process.";
				// require connect2CampaignFunction.php
				require ( 'functions/connect2Campaign.php' );

				// include getCampaignVariables.php
				include ( 'includes/getCampaignVariables.php' );
		
				// use this information to connect to campaign 
				$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
				// require getAbbrv.php
				require ('functions/getAbbrv.php');
				
				// require getAirAILevel.php
				require ('functions/getAirAILevel.php');
				$air_ai_level = get_air_ai_level();
				// require getObjectModel.php
				require ( 'functions/getObjectModel.php' );
				
				// export Bridges 
				global $camp_link;
				$abbrv = get_abbrv();
#				echo "<br />\$abbrv: $abbrv<br />\n";
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
				$filename = "$abbrv"."_AFnBridges.Group";
				$filename = "$DownloadDir"."$filename";
				echo "Filename to download: $filename<br><br />\n";
				// remove any earlier version of this file
				if (file_exists($filename))
					{
						unlink($filename);
						echo "Old version of $filename has been deleted.<br><br />";
					}
				// index number
				$index_no = 1;
				// open file for business
				$fh = fopen("$filename",'w') or die("Can not open $filename");
				// start writing bridges
				$query = "SELECT * from bridges";
				if(!$result = $camp_link->query($query)) {
					echo "$query<br />\n";
					die('exportBridges query error [' . $camp_link->error . ']');
				}
				$result = $camp_link->query($query);
				$num = $result->num_rows;
				if ($num > 0) 
				{
					while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
					{
						$current_rec = $row['id'];
						$current_Name = $row['Name'];
						$Model = $row['Model'];
						$Description = $row['Description'];
						$Country = $row['Country'];
						$CoalID = $row['CoalID'];
						$XPos = $row['XPos'];			
						$ZPos = $row['ZPos'];				
						$YOri = $row['YOri'];
						$damage_0 = $row['damage_0'];						
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
						$damaged = $damage_0 + $damage_1 + $damage_2 + $damage_3 + $damage_4 + $damage_5 + $damage_6 + $damage_7 + $damage_8 + $damage_8 + $damage_9 + $damage_10;
#						echo "damaged is :".$damaged."<br>";
#						echo "damaged 1 is:".$damage_1;

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
						if ($sim == "RoF") 
						{
						$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($Model).'.txt";'."\r\n";
						}
						else
						{
						$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\"."Bridges"."\\".rtrim($Model).'.txt";'."\r\n";
						}						
						fwrite($fh,$writestring);
						$writestring = '  Country = '.$Country.';'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '  Desc = "";'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '  Durability = 25000;'."\r\n";
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
							if ($damage_0 > 0)
							{
								$writestring = '    0 = 1'.";\r\n";
								fwrite($fh,$writestring);
							}
							if ($damage_1 > 0)
							{
								$writestring = '    1 = 1'.";\r\n";
								fwrite($fh,$writestring);
							}
							if ($damage_2 > 0)
							{
								$writestring = '    2 = 1'.";\r\n";
								fwrite($fh,$writestring);
							}
							if ($damage_3 > 0)
							{
								$writestring = '    3 = 1'.";\r\n";
								fwrite($fh,$writestring);
							}
							if ($damage_4 > 0)
							{
								$writestring = '    4 = 1'.";\r\n";
								fwrite($fh,$writestring);
							}
							if ($damage_5 > 0)
							{
								$writestring = '    5 = 1'.";\r\n";
								fwrite($fh,$writestring);
							}
							if ($damage_6 > 0)
							{
								$writestring = '    6 = 1'.";\r\n";
								fwrite($fh,$writestring);
							}
							if ($damage_7 > 0)
							{
								$writestring = '    7 = 1'.";\r\n";
								fwrite($fh,$writestring);
							}
							if ($damage_8 > 0)
							{
								$writestring = '    8 = 1'.";\r\n";
								fwrite($fh,$writestring);
							}
							if ($damage_9 > 0)
							{
								$writestring = '    9 = 1'.";\r\n";
								fwrite($fh,$writestring);
							}
							if ($damage_10 > 0)
							{
								$writestring = '    10 = 1'.";\r\n";
								fwrite($fh,$writestring);
							}
							$writestring = '  }'."\r\n";
							fwrite($fh,$writestring);			
						}
						$writestring = '}'."\r\n";
						fwrite($fh,$writestring);
						$index_no=($index_no+1);
					}
				}
				$result->free();
				echo "$num Bridge records processed<br />\n";
				// end of exporting bridges
				// start of exporting airfields
				$query = "SELECT * from airfields where airfield_enabled =1";
				if(!$result = $camp_link->query($query)) {
					echo "$query<br />\n";
					die('exportAirfields query error [' . $camp_link->error . ']');
				}
				$result = $camp_link->query($query);
				$num = $result->num_rows;
				if ($num > 0) 
				{
					while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
					{
						$current_rec = $row['id'];
						$current_Name = $row['airfield_Name'];
						$Model = $row['airfield_Model'];
						$Description = $row['airfield_Desc'];
						$Country = $row['airfield_Country'];
						$CoalID = $row['airfield_Coalition'];
						$XPos = $row['airfield_XPos'];			
						$ZPos = $row['airfield_ZPos'];				
						$YOri = $row['airfield_YOri'];
						$airfield_Hydrodrome = $row['airfield_Hydrodrome'];						
						$airfield_Enabled = $row['airfield_Enabled'];
						// here is where we start writing a record
						$writestring="Airfield\r\n";
						fwrite($fh,$writestring);
						$writestring="{\r\n";
						fwrite($fh,$writestring);
						$writestring = '  Name = "'.$current_Name.'";'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '  Index = '.$index_no.";\r\n";
						fwrite($fh,$writestring);
						$index_no=($index_no+1);
						if ($airfield_Enabled == 0)
						{
							$writestring = '  LinkTrId = 0;'."\r\n";
						}
						else
						{
							$writestring = '  LinkTrId = '.$index_no.';'."\r\n";
						}
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
						$writestring = '  Model = "graphics'."\\".'airfields'."\\".rtrim($Model).'.mgm";'."\r\n";			
						fwrite($fh,$writestring);
						if ($sim == "RoF")
						{
							$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($Model).'.txt";'."\r\n";
						}
						else
						{
							$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\"."Airfields"."\\".rtrim($Model).'.txt";'."\r\n";
						}
						fwrite($fh,$writestring);
						$writestring = '  Country = '.$Country.';'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '  Desc = "";'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '  Durability = 25000;'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '  DamageReport = 50;'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '  DamageThreshold = 1;'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '  DeleteAfterDeath = 1;'."\r\n";
						fwrite($fh,$writestring);
						// here are the planes 
						$query2 = 'SELECT * from airfields_models where airfield_Name = "'.$current_Name.'" and model_Quantity <> 0';
						echo "My query2 is :".$query2."<br>";
						if(!$result2 = $camp_link->query($query2)) 
						{
							echo "$query2<br />\n";
							die('exportAirfields query error [' . $camp_link->error . ']');
						}
						$result2 = $camp_link->query($query2);
						$num2 = $result2->num_rows;
						if ($num2 > 0) 
						{
							echo "Ive found a plane on :".$current_Name;
							$writestring = '  Planes'."\r\n";
							fwrite($fh,$writestring);
							$writestring = '  {'."\r\n";
							fwrite($fh,$writestring);							
							
							while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) 
							{
								$Plane_Model = $row2['model_Name'];
								echo "<br>This is a :".$Plane_Model."<br>";
								$Plane_Name = $row2['model_Flight'];
								$Plane_Qty = $row2['model_Quantity'];
								$Plane_Altitude = $row2['model_Altitude'];
								echo "got a plane:".$Plane_Model."<br>";
								$writestring = '    Plane'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '    {'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '      SetIndex = 0;'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '      Number = '. $Plane_Qty.';'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '      AILevel = '.$air_ai_level.';'."\r\n";
								fwrite($fh,$writestring);
								if ($Plane_Altitude == 0)
								{
									$writestring = '      StartInAir = 0;'."\r\n";
									fwrite($fh,$writestring);
								}
								else
								{
									$writestring = '      StartInAir = 1;'."\r\n";
									fwrite($fh,$writestring);
								}
								$writestring = '      Engageable = 1;'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '      Vulnerable = 1;'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '      LimitAmmo = 1;'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '      AIRTBDecision = 1;'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '      Renewable = 1;'."\r\n";
								fwrite($fh,$writestring);
								
								$writestring = '      PayloadId = 0;'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '      Fuel = 1;'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '      RouteTime = 0;'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '      RenewTime = 1800;'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '      Altitude = '.$Plane_Altitude.';'."\r\n";
								fwrite($fh,$writestring);
								# pick out model variable from object propertries
								$objectModel = get_ObjectModel($Plane_Model);
								###
								
								$writestring = '      Model = "graphics'."\\planes\\".$objectModel."\\".$objectModel.'.mgm";'."\r\n";
								fwrite($fh,$writestring);
								if ($sim == "RoF")
								{
									$writestring = '      Script = "LuaScripts'."\\WorldObjects\\".$objectModel.'.txt";'."\r\n";
								}
								else
								{
									$writestring = '      Script = "LuaScripts'."\\WorldObjects\\"."Planes\\".$objectModel.'.txt";'."\r\n";
								}								
								fwrite($fh,$writestring);
								$writestring = '      Name = "'.$Plane_Name.'";'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '      Skin = "";'."\r\n";
								fwrite($fh,$writestring);
								$writestring = '    }'."\r\n";
								fwrite($fh,$writestring);
							}
							$writestring = '  }'."\r\n";
							fwrite($fh,$writestring);
							}
						if ($sim == "BoS")
						{
							$writestring = '  Callsign = 0;'."\r\n";
							fwrite($fh,$writestring);						
							$writestring = '  Callnum = 0;'."\r\n";
							fwrite($fh,$writestring);						
						}
						$writestring = '  ReturnPlanes = 0;'."\r\n";
						fwrite($fh,$writestring);
						if ($airfield_Hydrodrome == 0)
						{
							$writestring = '  Hydrodrome = 0;'."\r\n";
						}
						else
						{
							$writestring = '  Hydrodrome = 1;'."\r\n";
						}
						fwrite($fh,$writestring);
						$writestring = '  RepairFriendlies = 0;'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '  RepairTime = 0;'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '  RearmTime = 0;'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '  RefuelTime = 0;'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '  MaintenanceRadius = 1000;'."\r\n";
						fwrite($fh,$writestring);
						$writestring = '}'."\r\n";
						fwrite($fh,$writestring);
						if ($airfield_Enabled == 1)
						{
							$writestring = ''."\r\n";
							fwrite($fh,$writestring);
							$writestring = 'MCU_TR_Entity'."\r\n";
							fwrite($fh,$writestring);
							$writestring="{\r\n";
							fwrite($fh,$writestring);
							$writestring = '  Index = '.$index_no.";\r\n";
							fwrite($fh,$writestring);
							$writestring = '  Name = "Airfield entity";'."\r\n";
							fwrite($fh,$writestring);
							$writestring = '  Desc = "";'."\r\n";
							fwrite($fh,$writestring);
							$writestring = '  Targets = [];'."\r\n";
							fwrite($fh,$writestring);
							$writestring = '  Objects = [];'."\r\n";
							fwrite($fh,$writestring);
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
							$writestring = '  Enabled = 1;'."\r\n";
							fwrite($fh,$writestring);
							$index_no=($index_no-1);
							$writestring = '  MisObjID = '.$index_no.";\r\n";
							fwrite($fh,$writestring);
							$index_no=($index_no+2);
							$writestring = '}'."\r\n";
							fwrite($fh,$writestring);
						}
					}
				}
				$result->free();
				fclose($fh);
				echo "$num Airfield records processed<br />\n";

				// end of exporting airfields
				echo "<br>Airfields and Bridges for the campaign mission have been exported to a group file:".$filename."<br><br>";
				echo "<form id=\"campaignMgmtDLBridgesConfirm\" name=\"campaignDownloadBridges\" action=\"CampaignMgmtDLBridgesConfirm.php?btn=campStp&sde=campAfldBrdg\" method=\"post\">\n";
				// NEXT BUTTON
				echo "<fieldset id=\"actions\">\n";	
				echo "<input type=\"hidden\" name=\"action\" value = \"next\">\n";	
				echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Next</button>\n";
				echo "	</fieldset>\n";
				echo "</form>\n";
				// actually do the downloads
				echo "Select Next then download the file from the campaign server to your PC then you can read it in to the mission editor as a .Group file.<br><br />\n";
				echo "Note that depending on the browser you are using you may be able to position it directly in your mission folder or it may be placed by default in a downloads folder.<br><br>";
				echo "<form id=\"campaignMgmtDLFile\" name=\"campaignDownloadBridges\" action=\"CampaignMgmtDLFile.php?btn=campStp&sde=campAfldBrdg\" method=\"post\">\n";
				$DownloadDir = 'downloads/';
				print "<select name=\"dlfile\">\n";
				// get list of files as array, removing '.' and '..' from the list
				$files=array_diff(scandir($DownloadDir), array('.','..'));
				// sort the array in natural fashion
				natsort($files);
				// print the list of files that contains $abbrv
				// make each an element of a pulldown list
				echo "<option value=\"\">Select file to download</option>\n";
				$abbrv = get_abbrv();
				while (list ($key, $value) = each ($files)) 
				{
					 if (preg_match("/^$abbrv/","$value")) 
					 {
						  echo "<option value=\"$value\">$value</option>\n";
					 }
				}
					echo "</p><input type=\"submit\" value=\"Go\"><br>\n";
				// close $camp_link
				$camp_link->close();
		?>

            </div>
    
        </div>

		<?php
            # Include the general sidebar
            include ( 'includes/sidebar.php' );
        ?>	

		<div id="clearing"></div>
	</div>

<?php
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
