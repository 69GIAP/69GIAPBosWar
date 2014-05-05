<?php 
// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();

// Include the website header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );


?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
				<?php
					// require connect2CampaignFunction.php
					require ( 'functions/connect2Campaign.php' );

					// include getCampaignVariables.php
					include ( 'includes/getCampaignVariables.php' );

					// declare $camp_link to be a global variable
					global $camp_link;

					// connect to campaign db
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					// get post variables
					$templateImport	= $_POST["templateImport"];
					$file			= 'uploads/'.$_POST["file"];
					$SaveToDir		= $_POST["SaveToDir"];
//					$returnpage		= $_POST["returnpage"];
echo "database is : $loadedCampaign";
echo "Hello im here in campaign management import confirm 3 about to start reading columns";
# here we go loading columns updates

$count = 0;
$current_object = "Unknown";
$current_Name = "Unknown";
$to_update = 0;
$XPos = "";
$ZPos = "";
$YOri = "";
$trainXPos = "";
$trainZPos = "";
$trainYOri = "";

echo '<br>Filename is :'.$file;
$fp = fopen( $file, "r" ) or die("Couldn't open $file");
while ( ! feof( $fp ) ) {
	$line = fgets( $fp, 1024 );
#	print "$line<br>";
# sequence added to handle setting start position of train on tracks
	if (substr($line,0,5) == 'Train')
	{
	$current_object = 'Train';
	$to_update = 1;
if ((substr($line,0,9)=="  XPos = ") and ($current_object == 'Train'))
	{
	$trainXPos = substr($line,9,50);
	$trainXPos = rtrim($trainXPos);
	$trainXPos = substr($trainXPos,0,-1);
	$trainXPos = floatval($trainXPos);

	#	echo '<br> Xpos is :'.$XPos;
	}
	if ((substr($line,0,9)=="  ZPos = ") and ($current_object == 'Train'))
	{
	$trainZPos = substr($line,9,50);
	$trainZPos = rtrim($trainZPos);
	$trainZPos = substr($trainZPos,0,-1);
	$trainZPos = floatval($trainZPos);
#	echo '<br> ZPos is :'.$ZPos;
	}
	if ((substr($line,0,9)=="  YOri = ") and ($current_object == 'Train'))
	{
	$trainYOri = substr($line,9,50);
	$trainYOri = rtrim($trainYOri);
	$trainYOri = substr($trainYOri,0,-1);
	$trainYOri = floatval($trainYOri);
	}

#
	if (substr($line,0,12) == 'MCU_Waypoint')
	{
	$to_update = 1;
	$current_object = 'MCU_Waypoint';
	echo '<br> Found a :'.$current_object;
	$count = 0;
	}
	if ((substr($line,0,9)=="  Name = " ) && ($to_update == 1)) 
	{
	$current_Name = substr($line,10,50);
	$current_Name = rtrim($current_Name);
	$current_Name = substr($current_Name,0,-2);
	echo '<br> Name is :'.$current_Name;
		if ($current_Name == '')
		{
		$to_update = 0;
		}
	}
	if ((substr($line,0,9)=="  XPos = ") && ($to_update == 1))
	{
	$XPos = substr($line,9,50);
	$XPos = rtrim($XPos);
	$XPos = substr($XPos,0,-1);
	$XPos = floatval($XPos);
	echo '<br> Xpos is :'.$XPos;
	}
	if ((substr($line,0,9)=="  ZPos = ") && ($to_update == 1))
	{
	$ZPos = substr($line,9,50);
	$ZPos = rtrim($ZPos);
	$ZPos = substr($ZPos,0,-1);
	$ZPos = floatval($ZPos);
	echo '<br> ZPos is :'.$ZPos;
	}
	if (substr($line,0,1)=='}')
	{
	if ($to_update == 1)
		{
		echo '<br> Column destination';
		if ($current_object == 'Train')
		{
		$q1="UPDATE $loadedCampaign.columns set XPos = $trainXPos, ZPos = $trainZPos, YOri = $trainYOri where Name = '$current_Name' LIMIT 1";
		}
		else
		{
		$q1="UPDATE $loadedCampaign.columns set dest_XPos = $XPos, dest_ZPos = $ZPos where Name = '$current_Name' LIMIT 1";
		}
        echo "<br> $q1";
		$r1= mysqli_query($dbc,$q1);
		if ($r1)
				{echo '<br> update attempted';}
		else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
		$to_update = 0;
		}
	}
	$count = 1+$count;
}
fclose($fp);

# now we update our statics
# set updated flag to 0 throughout
echo '<br>Starting update of static objects';
echo '<br>Starting update of static_updated flag';
$q1="UPDATE $loadedCampaign.statics set static_updated = 0";
$r1= mysqli_query($dbc,$q1);
if ($r1)
	{echo '<br> static flag updated';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}

$to_update = 0;
$count = 0;
$current_object = "Unknown";
$current_Name = "";
$Model = "Unknown";
echo '<br>Filename is :'.$file;
$fp = fopen( $file, "r" ) or die("Couldn't open $file");
while ( ! feof( $fp ) ) 
{
	$line = fgets( $fp, 1024 );
#	echo '<br>'.$line;
	if (substr($line,0,7) == 'Vehicle')
	{
	$current_object = 'Vehicle';
	echo '<br> Found a :'.$current_object;
	$count = 0;
	$to_update = 1;
	}
	if (substr($line,0,4) == 'Flag')
	{
	$current_object = 'Flag';
#	echo '<br> Found a :'.$current_object;
		$to_update = 1;
	$count = 0;
	}	
	if (substr($line,0,5) == 'Block')
	{
	$current_object = 'Block';
		$to_update = 1;
#	echo '<br> Found a :'.$current_object;
	$count = 0;
	}		
	if (substr($line,0,5) == 'Train')
	{
	$current_object = 'Train';
	$to_update = 1;
#	echo '<br> Found a :'.$current_object;
	$count = 0;}	
	if (substr($line,0,9)=="  Name = ")
	{
	$current_Name = substr($line,10,50);
	$current_Name = rtrim($current_Name);
	$current_Name = substr($current_Name,0,-2);
#	echo '<br> Name is :'.$current_Name.':';
	}
	if ($current_Name == "") 
		{
		$to_update = 0;
		}
	if (substr($line,0,9)=="  XPos = ")
	{
	$XPos = substr($line,9,50);
	$XPos = rtrim($XPos);
	$XPos = substr($XPos,0,-1);
	$XPos = floatval($XPos);
#	echo '<br> Xpos is :'.$XPos;
	}
	if (substr($line,0,9)=="  ZPos = ")
	{
	$ZPos = substr($line,9,50);
	$ZPos = rtrim($ZPos);
	$ZPos = substr($ZPos,0,-1);
	$ZPos = floatval($ZPos);
#	echo '<br> ZPos is :'.$ZPos;
	}
	if (substr($line,0,9)=="  YOri = ")
	{
	$YOri = substr($line,9,50);
	$YOri = rtrim($YOri);
	$YOri = substr($YOri,0,-1);
	$YOri = floatval($YOri);
#	echo '<br> YOri is :'.$YOri;
	}
	if (substr($line,0,9)== "  Model =")
	{
	$Model = substr(strrchr($line, "\\"), 1);
	$Model = rtrim($Model);
	$Model = substr($Model,0,-6);
#	echo '<br>Model is :'.$Model;
	}
	if ((substr($line,0,1)=='}') && ($to_update == 1))
	{
	echo '<br> Trying to do an update to static';
			$q1="UPDATE $loadedCampaign.statics SET static_XPos = $XPos,static_ZPos = $ZPos,static_YOri = $YOri,static_updated = 1 where static_Name = '$current_Name' AND static_Model = '$Model' AND static_updated = 0 LIMIT 1";
			echo '<br> My update select is:'.$q1;
			$r1= mysqli_query($dbc,$q1);
			if ($r1)
				{
				echo '<br> updated record';
				}
			else
				{
				echo'<p> update failed'.mysqli_error($dbc).'</p>';
				}
	$to_update = 0;
	}

}

# end of static update
#updates
fclose($fp);
					if ($templateImport == 1) {
						// Now delete the file
						if (file_exists($file)) {
							// delete the file
#							unlink("$file");	
							echo "$file deleted<br />\n";
						} else {
							echo "$file not found or read-only<br />\n";
						}
return;
						?>
						<br />&nbsp;<br />
<a href="CampaignMgmt.php?btn=campStp">Next</a>
#<?php
					}
#?>
#
            </div>
    
        </div>

<?php
	# Include the general sidebar
	include ( 'includes/sidebar.php' );
?>	

		<div id="clearing"></div>
	</div>

<?php
	# close $camp_link
	$camp_link->close();
	# close $dbc
	$dbc->close();
	# Include the footer
	include ( 'includes/footer.php' );
?>
