
<?php
	
	if ($_POST["updateAirfield"] == 5)
		{		
			# check if if model name = 'No Aircraft'; this means no aircraft is currently assigned
			$check1 = "SELECT * from test_airfields where name = '$airfieldName' AND model = 'No Aircraft'";
			# check if there are already 4 aircraft models assigned to that airfield
			$check2 = "SELECT * from test_airfields where name = '$airfieldName' and coalId = $airfieldCoalitionId";
			# check if there is a primary key violation
			$check3 = "SELECT * from test_airfields where name = '$airfieldName' AND model = '$airfieldModelAdd'";

# check 1		
			#execute the database checks
			$result = mysqli_query($camp_link, $check1);
			# check if model name is as defined in query
			if ($result)
				{
					$query="UPDATE test_airfields SET model = '$airfieldModelAdd', number = '$airfieldModelAddQuantity' WHERE model = 'No Aircraft' AND name = '$airfieldName'";
				}
# check 2
			#execute the database checks		
			$result = mysqli_query($camp_link, $check2);
			$num	= mysqli_num_rows($result);
			# check if maximum amount of models is reached
			if ($num > 4)
				{
					header ("Location: airfieldManagementError.php?error=1");
					# without the exit the script would just ignore the result and check the $check2 which results in a green light - no error
					exit;
				}
# check 3		
			#execute the database checks
			$result = mysqli_query($camp_link, $check3);
			$num	= mysqli_num_rows($result); 
			# check if model already exists
			if ($num >= 1)
				{
					header ("Location: airfieldManagementError.php?error=2");
					exit;
				}
		}
	if ($_POST["updateAirfield"] == 6)
		{
			# check if airport has only one entry left
			$check4 = "SELECT * from test_airfields where name = '$airfieldName'";


# check 4	
			# check if airport has only one entry left
			$check4 = "SELECT * from test_airfields where name = '$airfieldName'";
			
			#execute the database checks
			$result = mysqli_query($camp_link, $check4);
			$num	= mysqli_num_rows($result); 

			# check if model already exists
			if ($num == 1)
				{
					$query="UPDATE test_airfields SET model = 'No Aircraft', number = '0' WHERE model = '$airfieldModelAdd' AND name = '$airfieldName'";
				}
		}
?>
