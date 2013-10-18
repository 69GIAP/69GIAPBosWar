// Gets campaign stati from campaign_status
// 69giapmyata
// ver 1.1
<?php

	# load the query into a variable dependent on the role the user owns

	$query = "SELECT * FROM campaign_status ORDER BY id desc";
	
	if(!$result = $dbc->query($query))
		{
			die('There was an error running the query [' . $dbc->error . ']');
		}
	
	if ($result = mysqli_query($dbc, $query)) 
		{				
			echo "<option value=\"0\" disabled selected>Select New Campaign Status</option>\n";
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$campId			=($obj->id);
					$campStatus		=($obj->campaign_status);
					echo "<option value=\"". $campId. "\">". $campStatus. "</option>\n";
				}
		}
?>
