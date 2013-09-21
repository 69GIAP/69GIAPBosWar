<?php 
# test_change_db.php
# Ver 0.2
# test new connect_campaign() connection $link
# using a second connection to campaign database so
# original $cdb is undisturbed
# =69.GIAP=TUSHKA
# Sept 16, 2013

# Incorporate the MySQL connection script.
#	require ( '../connect_db.php' );

# return name of current default database
if ($result = mysqli_query($link, "SELECT DATABASE()")) 
	{
		$row 	= mysqli_fetch_row($result);
		printf("Default database is %s.<br>\n", $row[0]);
		mysqli_free_result($result);
	}

# change db to flanders_eagles db 
print("Attempting to change to flanders_eagles database.<br>\n");
$change = mysqli_select_db($link, "flanders_eagles");
print("change = ".$change."<br>\n");
if ( !$change ) 
	{
		print("Can not select flanders_eagles database.<br>\n");
		print("Check that db user has proper permissions for it.<br>\n");
	}

# return name of current default database 
if ($result = mysqli_query($link, "SELECT DATABASE()")) 
	{
		$row 	= mysqli_fetch_row($result);
		printf("Now default database is %s.<br>\n", $row[0]);
		mysqli_free_result($result);
	}

# Close connection
 mysqli_close($link);
 
?>
