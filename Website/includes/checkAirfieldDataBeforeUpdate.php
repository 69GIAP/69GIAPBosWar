
<?php
echo "-------------------------------------------------------------- <br>\n";
echo "Info from checkAirfieldDataBeforeUpdate.php <br>\n";
echo "-------------------------------------------------------------- <br>\n";
echo "<br>\n";
echo "Submitted action is :".$_POST["updateAirfield"]."<br>\n<br>\n";


	if ($_POST["updateAirfield"] < 7)
		{

# check 0
echo "---------<br>\n";
echo "This triggers check 0<br>\n";
echo "It checks if this is the first/last model on the airfield.<br>\n";
echo "---------<br>\n<br>\n";

			# check if airport has only one entry left
			$check0 = "SELECT * from airfields_models where airfield_Name = '$airfieldName'";
			
			#execute the database checks
			$result	= mysqli_query($camp_link, $check0);
			$num		= mysqli_num_rows($result); 
echo "Number of entries for selected airfield is: ".$num."<br>\n<br>\n";

			# check if model already exists
			if ($num == 1 and $modelNameQuantityNew1 == 0) # as num is 1 the variable must be modelNameQuantity1
				{
echo "This triggers a query update.<br>\n<br>\n";
					# the last entry is reset to default
					if ($sim == 'RoF') { #reset spawn position for first entry to ground
						$query1="UPDATE airfields_models SET model_Name = '', model_Model = '', model_Quantity = '0', model_Altitude = '0', model_Flight = '', model_SpawnPosition = '0' WHERE model_Name = '$modelNameLoaded1' AND airfield_Name = '$airfieldName'";
					};
					if ($sim == 'BoS') { #reset spawn position for first entry to parking
						$query1="UPDATE airfields_models SET model_Name = '', model_Model = '', model_Quantity = '0', model_Altitude = '0', model_Flight = '', model_SpawnPosition = '2' WHERE model_Name = '$modelNameLoaded1' AND airfield_Name = '$airfieldName'";
					} 
echo "New query is:<br>\n".$query1."<br>\n<br>\n";					
				}
		}
		
	if ($_POST["updateAirfield"] == 7)
		{		
# check 1
echo "---------<br>\n";
echo "check 1<br>\n";
echo "Checks if the model name is set to '' which results in no airfraft assigned to airfield.<br>\n";
echo "---------<br>\n<br>\n";
		
			# check if if model name = ''; this means no aircraft is currently assigned to the airport
			$check1 = "SELECT * from airfields_models where airfield_Name = '$airfieldName' AND model_Name = '';";
		
			#execute the database checks
			$result	= mysqli_query($camp_link, $check1);
			$num		= mysqli_num_rows($result);	
			if ($num == 1) {
				$query1="UPDATE airfields_models 
				SET 
					model_Name = '$modelNameAdd', 
					model_Model = '$modelModelAdd', 
					model_Quantity = '$modelNameAddQuantity', 
					model_Altitude = '$modelNameAddAltitude', 
					model_Flight = '$modelNameAddFlight', 
					model_SpawnPosition = '$modelNameAddSpawnPosition' 
				WHERE model_Name = '' 
				AND airfield_Name = '$airfieldName' ;";
			}
echo "check 1: ".$check1."<br>\n<br>\n";
echo "rows: ".$num."<br>\n<br>\n";
echo "new query:<br>\n".$query1."<br>\n<br>\n";			
			

# check 2
echo "---------<br>\n";
echo "check 2<br>\n";
echo "Checks if the total count of models exceeds 6 which is the current hardcoded limit.<br>\n";
echo "---------<br>\n<br>\n";

			# check if there are already 6 aircraft models assigned to that airfield
			$check2 = "SELECT * from airfields_models where airfield_Name = '$airfieldName' ;";

			#execute the database checks		
			$result	= mysqli_query($camp_link, $check2);
			$num		= mysqli_num_rows($result);

			# check if maximum amount of models is reached
			if ($num >= 6)
				{
					echo "rows: ".$num."<br>";
					header ("Location: airfieldMgmtError.php?error=1&model=$modelNameAdd");
					# without the exit the script would just ignore the result and check the $check2 which results in a green light - no error
					exit;
				}

# check 3
echo "---------<br>\n";
echo "check 3<br>\n";
echo "Checks if the selected model is already assigned to this airfield.<br>\n";
echo "---------<br>\n<br>\n";

			# check if there is a primary key violation
			$check3 = "SELECT * from airfields_models where airfield_Name = '$airfieldName' AND model_Name = '$modelNameAdd' ;";
			
			#execute the database checks
			$result = mysqli_query($camp_link, $check3);
			$num	= mysqli_num_rows($result); 


			
			# check if model already exists
			if ($num >= 1)
				{
					echo "rows: ".$num."<br>";
					header ("Location: airfieldMgmtError.php?error=2&model=$modelNameAdd");
					exit;
				}
		}

?>
