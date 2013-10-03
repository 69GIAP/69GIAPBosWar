# V1.0
# Stenka 10/9/13
# Php version of inbox table to load into airfields table runs after inbox load
<?php
# require is connecting user peter to stalingrad1 database
# here
require('require.php');
$q='SELECT id FROM inbox WHERE LEFT(lin,8) = "Airfield"';
$r=mysqli_query($dbc,$q);
if($r)
{echo '<br> the search worked';
$row = mysqli_fetch_array($r,MYSQLI_NUM);
echo '<br> value of row'.$row;
}
else
{echo'<p>'.mysqli_error($dbc).'</p>';
echo '<br> the search failed';}





EXIT;

if($r)
	{
	echo'<h1>Selected airfields</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>airfield starts on line'.$row[0];
			$search_no = 2+$row[0];
			echo'<br>Therefore the name of the airfield is on line'.$search_no;
			$q1="SELECT LEFT(data_value,80) FROM inbox WHERE id = $search_no";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{





			echo'<br>r1 is </h1>'.$r1;
				while ($row2 = mysqli_fetch_array($r1,MYSQLI_NUM))
				{
				echo'<br>'.$row2[0];
					$data_name = $row2[0];
					$q2="SELECT af_Name from airfields where af_Name = $data_name";
					$r2=mysqli_query($dbc,$q2);
					echo"<h1>got my r2 is $r2 </h1>";
					if ($r2)
					{
						echo "<br> found airfield $data_name in table";
				mysqli_free_result($r2);						
					}	
					else
					{
					echo "<br> not found airfield $data_name in table";
					$q3="INSERT INTO airfields (af_Name) VALUES ('$data_name')";
					$r3= mysqli_query($dbc,$q3);
					if ($r3)
						{echo "<br> I've added an airfield";}
					else
						{echo'<p>'.mysqli_error($dbc).'</p>';} 
					}

				}

			}
			else
				{echo'<p>'.mysqli_error($dbc).'</p>';}
			mysqli_free_result($r1);
		}
#  end of section where I try to pick out value
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
echo'<br>Peter<br>'.$row[2];


EXIT;	
	
	
	
	
	
	
	
	
	
	
	
	

# drop table inbox so I can recreate with the auto increment resarting at 1
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
data_dec_value DOUBLE
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
$filename = "c:/Program files/Rise of Flight/data/Missions/airfield_in.Group";

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
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
# start extraction of values
$q='UPDATE inbox SET data_value = SUBSTR(lin FROM 10) WHERE lin REGEXP("  Name = ")';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up name value</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
$q='UPDATE inbox SET data_value = SUBSTR(lin FROM 10) WHERE lin REGEXP("  Index = ")';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up index value</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
$q='UPDATE inbox SET data_value = SUBSTR(lin FROM 13) WHERE lin REGEXP("  LinkTrid = ")';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up link value</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='UPDATE inbox SET data_value = SUBSTR(lin FROM 9) WHERE lin REGEXP("  XPos = ")';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up X Position value</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}		
$q='UPDATE inbox SET data_value = SUBSTR(lin FROM 9) WHERE lin REGEXP("  YPos = ")';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up Y Position value</h1>';
	}
else	
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='UPDATE inbox SET data_value = SUBSTR(lin FROM 9) WHERE lin REGEXP("  ZPos = ")';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up Z Position value</h1>';
	}
else		
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='UPDATE inbox SET data_value = SUBSTR(lin FROM 9) WHERE lin REGEXP("  YOri = ")';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>picking up Angle value</h1>';
	}
else	
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
$q='UPDATE inbox SET data_value = SUBSTR(lin FROM 9) WHERE lin REGEXP("  Country = ")';
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
$q='UPDATE inbox SET data_value = REPLACE(data_value,";"," ")';
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
# now copy the text value field to a numeric value field
$q='UPDATE inbox SET data_dec_value = cast(data_value AS SIGNED INTEGER)';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>left trimming again</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	

# now lets compare
$q='SELECT RTRIM(data_value),lin FROM inbox';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Values calculated</h1>';
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






$q='SELECT RTRIM(lin) FROM inbox INTO OUTFILE "c:/BOSWAR/testout.Group"';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>send to output file</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	

# LINES TERMINATED BY '\n'




	
	
	
mysqli_close($dbc);







