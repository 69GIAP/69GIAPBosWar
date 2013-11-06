
<?php

	if ($_POST["updateAirfield"] == 7)
		{
				
# check 1			
			# check if if model name = ''; this means no aircraft is currently assigned to the airport
			$check1 = "SELECT * from airfields_models where airfield_Name = '$airfieldName' AND model_Name = '' ;";

		
			#execute the database checks
			if(!$result = $camp_link->query($check1)){
						die('There was an error running the query ' . mysqli_error($camp_link));
					}
					if ($result->num_rows != 0) {
						if (empty($modelNameAddQuantity)) {
							$modelNameAddQuantity = '0';
						}
						$query="UPDATE airfields_models SET model_Name = '$modelNameAdd', model_Quantity = $modelNameAddQuantity WHERE model_Name = '' AND airfield_Name = '$airfieldName'";
				}
			
			

# check 2
			# check if there are already 6 aircraft models assigned to that airfield
			$check2 = "SELECT * from airfields_models where airfield_Name = '$airfieldName' and airfield_Coalition = $airfieldCoalitionId";

			#execute the database checks		
			$result = mysqli_query($camp_link, $check2);
			$num	= mysqli_num_rows($result);
			# check if maximum amount of models is reached
			if ($num >= 6)
				{
					header ("Location: airfieldMgmtError.php?error=1");
					# without the exit the script would just ignore the result and check the $check2 which results in a green light - no error
					exit;
				}

# check 3
			# check if there is a primary key violation
			$check3 = "SELECT * from airfields_models where airfield_Name = '$airfieldName' AND model_Name = '$modelNameAdd'";
			
			#execute the database checks
			$result = mysqli_query($camp_link, $check3);
			$num	= mysqli_num_rows($result); 
			# check if model already exists
			if ($num >= 1)
				{
					header ("Location: airfieldMgmtError.php?error=2");
					exit;
				}
		}
		
	if ($_POST["updateAirfield"] == 8)
		{
			# check if airport has only one entry left
			$check4 = "SELECT * from airfields_models where airfield_Name = '$airfieldName'";


# check 4	
			# check if airport has only one entry left
			$check4 = "SELECT * from airfields_models where airfield_Name = '$airfieldName'";
			
			#execute the database checks
			$result = mysqli_query($camp_link, $check4);
			$num	= mysqli_num_rows($result); 

			# check if model already exists
			if ($num == 1)
				{	
					$query="UPDATE airfields_models SET model_Name = '', model_Quantity = '0' WHERE model_Name = '$modelNameAdd' AND airfield_Name = '$airfieldName'";
				}
		}

?>
