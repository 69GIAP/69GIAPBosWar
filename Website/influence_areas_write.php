# V1.0
# Stenka 30/10/13
# Php version write for influence areas
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
# are allies in South/North/East/West?
$influence = "West";
$country_allies = 105;
$country_central = 501;
# $index_no is the index number 
$index_no = 1;
# end of my variables initialisation
#prepare datafile for output
$filename = $path."influence_areas.Group";
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
if ($influence == "South" or $influence == "North")
{
	echo '<br>Influence area South or North';
	$writestring="MCU_TR_InfluenceArea\r\n";
	fwrite($fh,$writestring);		
	$writestring="{\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  Index = 1'.";\r\n";	
	fwrite($fh,$writestring);	
	$writestring = '  Name = "Translator Influence Area";'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  Desc = "";'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Targets = [];'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Objects = [];'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  XPos = '.number_format((CAM_BOT_LEFT_X-500), 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZPos = '.number_format((CAM_BOT_LEFT_Z-500), 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Enabled = 1;'."\r\n";	
	fwrite($fh,$writestring);
	if ($influence == "South")
	{
	$writestring = '  Country = '.$country_allies.';'."\r\n";
	}
	else
	{
	$writestring = '  Country = '.$country_central.';'."\r\n";
	}
	fwrite($fh,$writestring);
	$writestring = '  Boundary'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  {'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '    '.number_format(CAM_BOT_LEFT_X, 0, '', '').','.number_format(CAM_BOT_LEFT_Z, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = (CAM_BOT_LEFT_X+((CAM_TOP_RIGHT_X - CAM_BOT_LEFT_X)/3));
$zval = CAM_BOT_LEFT_Z;
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);	
$spacing = (CAM_TOP_RIGHT_Z - CAM_BOT_LEFT_Z)/10;	
$zval = $zval + $spacing;	
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '    '.number_format(CAM_BOT_LEFT_X, 0, '', '').','.number_format(CAM_TOP_RIGHT_Z, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  }'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '}'."\r\n";				
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
	$writestring="MCU_TR_InfluenceArea\r\n";
	fwrite($fh,$writestring);		
	$writestring="{\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  Index = 2'.";\r\n";	
	fwrite($fh,$writestring);	
	$writestring = '  Name = "Translator Influence Area";'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  Desc = "";'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Targets = [];'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Objects = [];'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  XPos = '.number_format((CAM_TOP_RIGHT_X + 500), 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZPos = '.number_format((CAM_TOP_RIGHT_Z + 500), 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Enabled = 1;'."\r\n";	
	fwrite($fh,$writestring);
	if ($influence == "South")
	{
	$writestring = '  Country = '.$country_central.';'."\r\n";
	}
	else
	{
	$writestring = '  Country = '.$country_allies.';'."\r\n";
	}
	fwrite($fh,$writestring);
	$writestring = '  Boundary'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  {'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '    '.number_format(CAM_TOP_RIGHT_X, 0, '', '').','.number_format(CAM_TOP_RIGHT_Z, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = (CAM_TOP_RIGHT_X-((CAM_TOP_RIGHT_X - CAM_BOT_LEFT_X)/3));
$zval = CAM_TOP_RIGHT_Z;
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);	
$spacing = (CAM_TOP_RIGHT_Z - CAM_BOT_LEFT_Z)/10;	
$zval = $zval - $spacing;	
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = $zval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '    '.number_format(CAM_TOP_RIGHT_X, 0, '', '').','.number_format(CAM_BOT_LEFT_Z, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  }'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '}'."\r\n";				
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);	
}
else
{
	echo '<br>Influence area East or West';
	$writestring="MCU_TR_InfluenceArea\r\n";
	fwrite($fh,$writestring);		
	$writestring="{\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  Index = 1'.";\r\n";	
	fwrite($fh,$writestring);	
	$writestring = '  Name = "Translator Influence Area";'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  Desc = "";'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Targets = [];'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Objects = [];'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  XPos = '.number_format((CAM_TOP_RIGHT_X+500), 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZPos = '.number_format((CAM_BOT_LEFT_Z-500), 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Enabled = 1;'."\r\n";	
	fwrite($fh,$writestring);
	if ($influence == "West")
	{
	$writestring = '  Country = '.$country_allies.';'."\r\n";
	}
	else
	{
	$writestring = '  Country = '.$country_central.';'."\r\n";
	}
	fwrite($fh,$writestring);
	$writestring = '  Boundary'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  {'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '    '.number_format(CAM_TOP_RIGHT_X, 0, '', '').','.number_format(CAM_BOT_LEFT_Z, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = (CAM_BOT_LEFT_Z+((CAM_TOP_RIGHT_Z - CAM_BOT_LEFT_Z)/3));
$xval = CAM_TOP_RIGHT_X;
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);	
$spacing = (CAM_TOP_RIGHT_X - CAM_BOT_LEFT_X)/10;	
$xval = $xval - $spacing;	
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval - $spacing;	
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval - $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '    '.number_format(CAM_BOT_LEFT_X, 0, '', '').','.number_format(CAM_BOT_LEFT_Z, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  }'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '}'."\r\n";				
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
	$writestring="MCU_TR_InfluenceArea\r\n";
	fwrite($fh,$writestring);		
	$writestring="{\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  Index = 2'.";\r\n";	
	fwrite($fh,$writestring);	
	$writestring = '  Name = "Translator Influence Area";'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  Desc = "";'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Targets = [];'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Objects = [];'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  XPos = '.number_format((CAM_BOT_LEFT_X - 500), 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZPos = '.number_format((CAM_TOP_RIGHT_Z + 500), 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Enabled = 1;'."\r\n";	
	fwrite($fh,$writestring);
	if ($influence == "West")
	{
	$writestring = '  Country = '.$country_central.';'."\r\n";
	}
	else
	{
	$writestring = '  Country = '.$country_allies.';'."\r\n";
	}
	fwrite($fh,$writestring);
	$writestring = '  Boundary'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  {'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '    '.number_format(CAM_BOT_LEFT_X, 0, '', '').','.number_format(CAM_TOP_RIGHT_Z, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$zval = (CAM_TOP_RIGHT_Z-((CAM_TOP_RIGHT_Z - CAM_BOT_LEFT_Z)/3));
$xval = CAM_BOT_LEFT_X;
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);	
$spacing = (CAM_TOP_RIGHT_X - CAM_BOT_LEFT_X)/10;	
$xval = $xval + $spacing;	
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval + $spacing;	
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval + $spacing;	
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval + $spacing;	
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval + $spacing;	
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval + $spacing;	
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
$xval = $xval + $spacing;		
	$writestring = '    '.number_format($xval, 0, '', '').','.number_format($zval, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '    '.number_format(CAM_TOP_RIGHT_X, 0, '', '').','.number_format(CAM_TOP_RIGHT_Z, 0, '', '').';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  }'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '}'."\r\n";				
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);	
}

#end