# V1.1
# Stenka 18/9/13 Operational
# Php version of group file load into inbox table
<?php
# require is connecting user peter to stalingrad1 database
# the user must have all rights to the database as we will change structure
require('../connect_db.php');
# stick up database structure on screen
$q='SHOW TABLES';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Tables on Stalingrad1_db database</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
# drop table inbox so I can recreate with the auto increment restarting at 1
$q='DROP TABLE IF EXISTS inbox';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Dropping table inbox</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
# stick on screen to see if it's gone
	$q='SHOW TABLES';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Tables on Stalingrad1_db database</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
# recreate table
$q='CREATE TABLE IF NOT EXISTS inbox
(
id	INT UNIQUE AUTO_INCREMENT,
lin			TEXT,
data_value	VARCHAR(200),
data_dec_value DECIMAL(20,3)
)';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Creating table inbox with auto increment at 1</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
# put on screen again 
$q='SHOW TABLES';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Tables on Stalingrad1_db database</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}		
# OK so we now have a clean inbox we can load it from the group file
# Check if the file exists
$filename = "c:/BOSWAR/ROF1916.Group";

if (file_exists($filename)) 
{
    echo "<p>The file $filename exists";
} 
else 
{
    echo "<p>The file $filename does not exist";
}

$q= "LOAD DATA INFILE '$filename'
 	INTO TABLE inbox 
	LINES TERMINATED BY '\n' (lin)"
;
$r=mysqli_query($dbc,$q);
if($r)
{
	echo'<h1>Loaded inbox</h1>';
}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='SELECT id,lin FROM inbox';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Records parsed into inbox</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
#		echo'<br>'.$row[0];
		}
		echo'<br>'.$row[0];
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
# start extraction of values
$q='UPDATE inbox SET data_value = SUBSTR(lin,11,200) WHERE SUBSTR(lin,1,9) = "  Name = "';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up name value</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
$q='UPDATE inbox SET data_value = SUBSTR(lin,11,200) WHERE SUBSTR(lin,1,10) = "  Index = "';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up index value</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
$q='UPDATE inbox SET data_value = SUBSTR(lin,14,200) WHERE SUBSTR(lin,1,13) = "  LinkTrid = "';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up link value</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='UPDATE inbox SET data_value = SUBSTR(lin,10,200) WHERE SUBSTR(lin,1,9) = "  XPos = "';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up X Position value</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}		
$q='UPDATE inbox SET data_value = SUBSTR(lin,10,200) WHERE SUBSTR(lin,1,9) = "  YPos = "';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up Y Position value</h1>';
	}
else	
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='UPDATE inbox SET data_value = SUBSTR(lin,10,200) WHERE SUBSTR(lin,1,9) = "  ZPos = "';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up Z Position value</h1>';
	}
else		
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='UPDATE inbox SET data_value = SUBSTR(lin,10,200) WHERE SUBSTR(lin,1,9) = "  YOri = "';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up Angle value</h1>';
	}
else	
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='UPDATE inbox SET data_value = SUBSTR(lin,13,200) WHERE SUBSTR(lin,1,12) = "  Country = "';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up Country value</h1>';
	}
else	
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
# strip off all padding spaces from data_value
$q='UPDATE inbox SET data_value = ltrim(data_value)';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Left trim</h1>';
	}
else	
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='UPDATE inbox SET data_value = rtrim(data_value)';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Right trim</h1>';
	}
else	
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
# now strip off ";" from end of data_value
$q='UPDATE inbox SET data_value = REPLACE(data_value,";","")';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>strip off semi colon</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='UPDATE inbox SET data_value = ltrim(data_value)';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>left trimming again</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
	# now strip off '"' from end of data_value
$q="UPDATE inbox SET data_value = REPLACE(data_value,'\"','')";
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>strip off quotes</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='UPDATE inbox SET data_value = ltrim(data_value)';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>left trimming again</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='UPDATE inbox SET data_value = rtrim(data_value)';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>right trimming again</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}		
	
	
	
# now copy the text value field to a numeric value field
$q='UPDATE inbox SET data_dec_value = data_value WHERE data_value NOT REGEXP "[A-Za-z]"';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>converting to integer</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
# for some reason that misses indexes I'll force it
$q='UPDATE inbox SET data_dec_value = data_value WHERE SUBSTR(lin,1,10) = "  Index = "';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up index value</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
$q='UPDATE inbox SET data_dec_value = data_value WHERE SUBSTR(lin,1,13) = "  LinkTrid = "';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up link value</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
	
# now lets compare
$q='SELECT substr(lin,1,40) FROM inbox where data_value IS NOT NULL';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>here is lin version</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
$q='SELECT substr(data_value,1,40) FROM inbox where data_value IS NOT NULL';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>here is datavalue version</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
$q='SELECT FORMAT(data_dec_value,3) FROM inbox where data_value IS NOT NULL';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>here is numeric version</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}





	
# write result with stripped trailing spaces to output file so I can inspect the result in notepad++
# $q='SELECT RTRIM(data_value),RTRIM(lin),FORMAT(data_dec_value,3) FROM inbox INTO OUTFILE "c:/BOSWAR/testout.Group" LINES TERMINATED BY "\n"';
# Check if the file exists
$filename = "c:/BOSWAR/testout.Group";

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

$q='SELECT data_value FROM inbox INTO OUTFILE "c:/BOSWAR/testout.Group"';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>send to output file</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	

# LINES TERMINATED BY '\n'




	
	
	
mysqli_close($dbc);







