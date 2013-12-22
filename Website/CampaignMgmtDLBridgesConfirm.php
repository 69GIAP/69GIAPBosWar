<?php 

// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
		
// Include the webside header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );

// Include Post variable debugging
	include ( 'includes/debugging/debuggingPostVariables.php');

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
			<?php
				// require connect2CampaignFunction.php
				require ( 'functions/connect2Campaign.php' );

				// include getCampaignVariables.php
				include ( 'includes/getCampaignVariables.php' );
		
				// use this information to connect to campaign 
				$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
				// require getAbbrv.php
				require ('functions/getAbbrv.php');
				// export Bridges 
				global $camp_link;
				$abbrv = get_abbrv();
				echo "<br />\$abbrv: $abbrv<br />\n";
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
				$filename = "$abbrv"."_bridges.Group";
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
				fclose($fh);
				echo "$num Records processed<br />\n";
				// end of exporting bridges
				echo "<form id=\"campaignMgmtDLBridgesConfirm\" name=\"campaignDownloadBridges\" action=\"CampaignMgmtDLBridgesConfirm.php?btn=campStp&sde=campBrdg\" method=\"post\">\n";
				// NEXT BUTTON
				echo "<fieldset id=\"actions\">\n";	
				echo "<input type=\"hidden\" name=\"action\" value = \"next\">\n";	
				echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Next</button>\n";
				echo "	</fieldset>\n";
				echo "</form>\n";
				// actually do the downloads
				echo "OK, time to download!<br />\n";
				echo "<form id=\"campaignMgmtDLFile\" name=\"campaignDownloadBridges\" action=\"CampaignMgmtDLFile.php?btn=campStp&sde=campBrdg\" method=\"post\">\n";
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
