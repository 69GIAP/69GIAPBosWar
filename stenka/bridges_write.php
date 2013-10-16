# V1.0
# Stenka 15/10/13
# Php version of mission 1 write for bridges
<?php
# require is connecting user peter to stalingrad1 database
# here
require('../connect_db.php');
# next load campaign variable into constants
require('cam_param.php');
# now we will start creating bridges
# initialise variables
$current_mission = 1;
$miss = 'mission_'.$current_mission;
# $path is the path to where the user keeps the group files
$path = 'c:/BOSWAR/';
# $index_no is the index number 
$index_no = 1;
# end of my variables initialisation
#prepare datafile for output
$filename = $path."bridges_".$miss.".Group";
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
$q = 'SELECT * from bridges';
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo '<br>bridges in table';
	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
	echo '<br>'.$row['id'].'|'.$row['bridge_Name'].$row['bridge_Country'];
	$current_rec = $row['id'];
	$current_Name = $row['bridge_Name'];
	$bridge_coalition = $row['bridge_coalition'];
	$bridge_YOri = $row['bridge_YOri'];
	$bridge_Model = $row['bridge_Model'];
	$bridge_Country = $row['bridge_Country'];
	$bridge_XPos = $row['bridge_XPos'];
	$bridge_ZPos = $row['bridge_ZPos'];	
	$bridge_damage_1 = $row['bridge_damage_1'];
	$bridge_damage_2 = $row['bridge_damage_2'];
	$bridge_damage_3 = $row['bridge_damage_3'];
	$bridge_damage_4 = $row['bridge_damage_4'];
	$bridge_damage_5 = $row['bridge_damage_5'];
	$bridge_damage_6 = $row['bridge_damage_6'];
	$bridge_damage_7 = $row['bridge_damage_7'];
	$bridge_damage_8 = $row['bridge_damage_8'];
	$bridge_damage_9 = $row['bridge_damage_9'];
	$bridge_damage_10 = $row['bridge_damage_10'];
# here is where we start writing a record to group file
	$writestring="Bridge\r\n";
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
	$writestring = '  XPos = '.number_format($bridge_XPos, 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZPos = '.number_format($bridge_ZPos, 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = '.$bridge_YOri.';'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Model = "graphics'."\\"."bridges\\"."$Model".'.mgm";'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($Model).'.txt";'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Country = '.$bridge_Country.';'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Desc = "';
	fwrite($fh,$writestring);	
	$writestring = '  Durability = 25000;'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  DamageReport = 50;'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  DamageThreshold = 1;'."\r\n";				
	fwrite($fh,$writestring);			
	$writestring = '  Damaged'."\r\n";				
	fwrite($fh,$writestring);	
	$writestring = "  {\r\n";				
	fwrite($fh,$writestring);
	$writestring = '    1 = '.$bridge_damage_1.";\r\n";				
	fwrite($fh,$writestring);	
	$writestring = '    2 = '.$bridge_damage_2.";\r\n";				
	fwrite($fh,$writestring);	
	$writestring = '    3 = '.$bridge_damage_3.";\r\n";				
	fwrite($fh,$writestring);	
	$writestring = '    4 = '.$bridge_damage_4.";\r\n";				
	fwrite($fh,$writestring);	
	$writestring = '    5 = '.$bridge_damage_5.";\r\n";				
	fwrite($fh,$writestring);
	$writestring = '    6 = '.$bridge_damage_6.";\r\n";				
	fwrite($fh,$writestring);		
	$writestring = '    7 = '.$bridge_damage_7.";\r\n";				
	fwrite($fh,$writestring);	
	$writestring = '    8 = '.$bridge_damage_8.";\r\n";				
	fwrite($fh,$writestring);	
	$writestring = '    9 = '.$bridge_damage_9.";\r\n";				
	fwrite($fh,$writestring);	
	$writestring = '    10 = '.$bridge_damage_10.";\r\n";				
	fwrite($fh,$writestring);	
	$writestring = "  }\r\n";				
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
	$writestring = '  Name = "Bridge entity"'.';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Desc = "";'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Targets = [];'."\r\n";}
	fwrite($fh,$writestring);
	$writestring = '  Objects = [];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  XPos = '.number_format($bridge_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$writestring = '  ZPos = '.number_format($bridge_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = '.$bridge_YOri.';'."\r\n";	
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
}
# this is the end of the do while loop	

fclose($fh);
	echo "<br>$num Records";
