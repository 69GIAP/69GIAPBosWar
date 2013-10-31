# V1.0
# Stenka 25/10/13
# Php version write for supply points
<?php
# require is connecting user database
# here
require('../connect_db.php');
# next load campaign variable into constants
require('cam_param.php');
# now we will start creating supply points
# initialise variables
# $path is the path to where the user keeps the group files
$path = 'c:/BOSWAR/';
# what database?

# $index_no is the index number 
$index_no = 1;
# end of my variables initialisation
#prepare datafile for output
$filename = $path."supply_points.Group";
echo'<br> filename is:'.$filename;
if (file_exists($filename)) 
{
    echo "<p>The file $filename exists";
	unlink($filename);
	echo "<p>I try to delete it";
} 
else 
{
    echo "<p>The file $filename does not exist";
}
if (file_exists($filename)) 
{
    echo "<p>The file $filename exists";
} 
else 
{
    echo "<p>The file $filename does not exist";
}
# OK open file for business
$fh = fopen($filename,'w') or die("Can not open file");
#
$q = "SELECT * from supply_points";
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo '<br>Supply Points in table';
	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
	echo '<br>'.$row['id'].'|'.$row['supplypointName'].$row['country'];
	$current_rec = $row['id'];
	$current_Name = $row['supplypointName'];
	$supply_coalition = $row['CoalID'];
	$supply_YOri = $row['YOri'];
	$supply_XPos = $row['xPos'];
	$supply_ZPos = $row['zPos'];
	$supply_country = $row['country'];	
# here is where we start writing a record to group file
	$writestring="Block\r\n";
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
	$writestring = '  XPos = '.number_format($supply_XPos, 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZPos = '.number_format($supply_ZPos, 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = '.$supply_YOri.';'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Model = "graphics'."\\"."blocks\\"."rwstation".'.mgm";'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".'rwstation.txt";'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Country = '.$supply_country.';'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Desc = ""'.";\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  Durability = 25000;'."\r\n";
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
# start of the mcu write
		$writestring = 'MCU_TR_Entity'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '{'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Index = '.$index_no.';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Name = "Supply Point entity"'.';'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Desc = "";'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Targets = [];'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Objects = [];'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  XPos = '.number_format($supply_XPos, 3, '.', '').';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  YPos = 0.000;'."\r\n";	
		fwrite($fh,$writestring); 	
		$writestring = '  ZPos = '.number_format($supply_ZPos, 3, '.', '').';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  XOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  YOri = '.$supply_YOri.';'."\r\n";	
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
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}

# this is the end of the do while loop	

fclose($fh);
	echo "<br>$num Records";
