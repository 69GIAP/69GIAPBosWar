
<?php

	$query = "SELECT camp_user, camp_passwd FROM campaign_settings where camp_user != '' GROUP BY camp_user";
	
	if(!$result = $dbc->query($query))
	{die('There was an error running the query [' . $dbc->error . ']');}

	if ($result = mysqli_query($dbc, $query)) 
	{				
		echo "<option value=\"\" disabled selected>Select Existing DB User</option>\n";	
		/* fetch associative array */
		while ($obj = mysqli_fetch_object($result)) 
			{
				$campUser	=($obj->camp_user);
				$campPw		=($obj->camp_passwd);
				echo "<option value=\"". $campUser. "\">".$campUser."</option>\n";				
			}
	}
	
	mysqli_free_result($result);		
?>
