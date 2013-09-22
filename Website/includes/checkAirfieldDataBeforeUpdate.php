
<?php
	echo "Button: ".$_POST["updateAirfield"]."<br>";
	
	if ($_POST["updateAirfield"] == 5)
		{
			# check if there are already 4 aircraft models assigned to that airfield
			$check1 = "SELECT * from test_airfields where name = '$airfieldName' and coalition = $airfieldCoalition";
			# check if there is a primary key violation
			$check2 = "SELECT * from test_airfields where name = '$airfieldName' AND model = '$airfieldModelAdd'";
		

			if(!$result1 = $camp_link->query($check1)) {
					die('There was an error receiveing the connnection information [' . $camp_link->error . ']');
				}
			#execute the database checks		
			$result1 = mysqli_query($camp_link, $check1);
			/* count rows returned */
			$rowcount = mysqli_num_rows($result1); 
			echo "Error 1<br>";
			echo "$rowcount rows<br>";
			# check if maximum amount of models is reached
			if ($rowcount > 4)
				{
					header ("Location: airfieldManagementError.php?error=1");
				}
		
			if(!$result2 = $camp_link->query($check2)) {
					die('There was an error receiveing the connnection information [' . $camp_link->error . ']');
				}
					
			#execute the database checks
			$result2 = mysqli_query($camp_link, $check2);
			/* count rows returned */
			$rowcount = mysqli_num_rows($result2); 
			echo "Error 2<br>";
			echo "$rowcount rows<br>";
			# check if model already exists
			if ($rowcount == 1)
				{
					header ("Location: airfieldManagementError.php?error=2");
				}
		}
?>
