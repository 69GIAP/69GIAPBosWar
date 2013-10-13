# V1.0
# Stenka 05/10/13
# Load test data into static
<?php
				

$q3="TRUNCATE table static";
$r3= mysqli_query($camp_link,$q3);
if ($r3)
	{echo'<br>static added';}
else
	{echo'<p>'.mysqli_error($camp_link).'</p>';} 				
$q3="INSERT INTO static (static_Name,static_Type,static_Model,static_supplypoint,static_coalition,static_Country) VALUES ('HQ A','Block','tent01','1','1','105')";
$r3= mysqli_query($camp_link,$q3);
if ($r3)
	{echo'<br>static added';}
else
	{echo'<p>'.mysqli_error($camp_link).'</p>';} 
$q3="INSERT INTO static (static_Name,static_Type,static_Model,static_supplypoint,static_coalition,static_Country) VALUES ('HQ A','Block','tent_camp01','1','1','105')";
$r3= mysqli_query($camp_link,$q3);
if ($r3)
	{echo'<br>static added';}
else
	{echo'<p>'.mysqli_error($camp_link).'</p>';} 
$q3="INSERT INTO static (static_Name,static_Type,static_Model,static_supplypoint,static_coalition,static_Country) VALUES ('HQ A','Block','tent_camp02','1','1','105')";
$r3= mysqli_query($camp_link,$q3);
if ($r3)
	{echo'<br>static added';}
else
	{echo'<p>'.mysqli_error($camp_link).'</p>';} 
$q3="INSERT INTO static (static_Name,static_Type,static_Model,static_supplypoint,static_coalition,static_Country) VALUES ('HQ A','Vehicle','leyland','1','1','105')";
$r3= mysqli_query($camp_link,$q3);
if ($r3)
	{echo'<br>static added';}
else
	{echo'<p>'.mysqli_error($camp_link).'</p>';} 
$q3="INSERT INTO static (static_Name,static_Type,static_Model,static_supplypoint,static_coalition,static_Country) VALUES ('HQ A','Train','passa','1','1','105')";
$r3= mysqli_query($camp_link,$q3);
if ($r3)
	{echo'<br>static added';}
else
	{echo'<p>'.mysqli_error($camp_link).'</p>';} 
$q3="INSERT INTO static (static_Name,static_Type,static_Model,static_supplypoint,static_coalition,static_Country) VALUES ('HQ A','Flag','windsock','1','1','105')";
$r3= mysqli_query($camp_link,$q3);
if ($r3)
	{echo'<br>static added';}
else
	{echo'<p>'.mysqli_error($camp_link).'</p>';} 
$q3="INSERT INTO static (static_Name,static_Type,static_Model,static_supplypoint,static_coalition,static_Country) VALUES ('HQ A','Vehicle','leyland','1','1','105')";
$r3= mysqli_query($camp_link,$q3);
if ($r3)
	{echo'<br>static added';}
else
	{echo'<p>'.mysqli_error($camp_link).'</p>';} 
$q3="INSERT INTO static (static_Name,static_Type,static_Model,static_supplypoint,static_coalition,static_Country) VALUES ('HQ A','Vehicle','leylands','1','1','105')";
$r3= mysqli_query($camp_link,$q3);
if ($r3)
	{echo'<br>static added';}
else
	{echo'<p>'.mysqli_error($camp_link).'</p>';} 
$q3="INSERT INTO static (static_Name,static_Type,static_Model,static_supplypoint,static_coalition,static_Country) VALUES ('HQ Z','Vehicle','leylands','1','1','105')";
$r3= mysqli_query($camp_link,$q3);
if ($r3)
	{echo'<br>static added';}
else
	{echo'<p>'.mysqli_error($camp_link).'</p>';} 
$q3="INSERT INTO static (static_Name,static_Type,static_Model,static_supplypoint,static_coalition,static_Country) VALUES ('HQ X','Vehicle','leylands','1','2','501')";
$r3= mysqli_query($camp_link,$q3);
if ($r3)
	{echo'<br>static added';}
else
	{echo'<p>'.mysqli_error($camp_link).'</p>';} 
