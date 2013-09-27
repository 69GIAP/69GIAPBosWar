# V1.1
# Stenka 18/9/13 Operational
# Php version of group file load into inbox table
#Sept 26, 2013
# Major changes by Tushka playing with sql_mode settings
<?php
# require is connecting user peter to stalingrad1 database
# the user must have all rights to the database as we will change structure
require('../connect_db.php');

// Begin Tushka's additions to turn on NO_BACKSLASH_ESCAPES
// see end of file for restoring original settings
//
// check (and save) initial sql_mode
$q="SELECT @@SESSION.sql_mode";
echo "<br>$q<br>\n";
$r=mysqli_query($dbc,$q);
if($r) {
   while ($row = mysqli_fetch_array($r,MYSQLI_NUM)) {
      # save starting sql_mode
      $starting_sql_mode = $row[0]; 
      echo'<br>'.$starting_sql_mode;
   }
   mysqli_free_result($r);
} else {
   echo'<p>'.mysqli_error($dbc).'</p>';
}

// tell server to accept backslashes for this session
$q="SET SESSION sql_mode = 'NO_BACKSLASH_ESCAPES,$starting_sql_mode'";
echo "<br>$q<br>\n";
$r=mysqli_query($dbc,$q);
if($r) {
   //echo "<br>set NO_BACKSLASH_ESCAPES";
} else {
   echo'<p>'.mysqli_error($dbc).'</p>';
}

// check whether we succeeded
$q="SELECT @@SESSION.sql_mode";
echo "<br>$q<br>\n";
$r=mysqli_query($dbc,$q);
if($r) {
   while ($row = mysqli_fetch_array($r,MYSQLI_NUM)) {
      echo'<br>'.$row[0];
   }
   mysqli_free_result($r);
} else {
   echo'<p>'.mysqli_error($dbc).'</p>';
}
// end Tushka's add setting additions... see below for restoring settings

# drop table inbox so I can recreate with the auto increment restarting at 1
$q='DROP TABLE IF EXISTS inbox';
echo "<br>$q<br>\n";
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Dropping table inbox</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
# stick on screen to see if it's gone
	$q='SHOW TABLES';
echo "<br>$q<br>\n";
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
echo "<br>$q<br>\n";
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Creating table inbox with auto increment at 1</h1>';
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
echo "<br>$q<br>\n";
$r=mysqli_query($dbc,$q);
if($r)
{
	echo'<h1>Loaded inbox</h1>';
}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	

$q='SELECT lin FROM inbox';
$r=mysqli_query($dbc,$q);
if($r) {
        while ($row = mysqli_fetch_row($r)) {
                printf("%s<br>\n", $row[0]);
        }
	mysqli_free_result($r);
} else { echo'<p>'.mysqli_error($dbc).'</p>'; }	

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

$q='SELECT lin FROM inbox INTO OUTFILE "c:/BOSWAR/testout.Group"';
echo "<br>$q<br>\n";
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>send to output file</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	

# LINES TERMINATED BY '\n'

// Tushka's additions to restore original sql_mode
// tell server to return to starting sql_mode
$q="SET SESSION sql_mode = '$starting_sql_mode'";
echo '<br>'.$q;
$r=mysqli_query($dbc,$q);
if($r) {
   //echo "<br>unset NO_BACKSLASH_ESCAPES";
} else {
   echo'<p>'.mysqli_error($dbc).'</p>';
}

// check whether we succeeded
$q="SELECT @@SESSION.sql_mode";
echo '<br>'.$q;
$r=mysqli_query($dbc,$q);
if($r) {
   while ($row = mysqli_fetch_array($r,MYSQLI_NUM)) {
      echo'<br>'.$row[0];
   }
   mysqli_free_result($r);
} else {
   echo'<p>'.mysqli_error($dbc).'</p>';
}

mysqli_close($dbc);

// closing php is good form.
?>
