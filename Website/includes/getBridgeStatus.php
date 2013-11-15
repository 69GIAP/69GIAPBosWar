<?php
// Get bridge status information 
// out of campaign DB
// 69giapmyata
// ver 1.0


	
	$sql = "SELECT id, Name, damage_1, damage_2, damage_3, damage_4, damage_5, damage_6, damage_7, damage_8, damage_9, damage_10
			FROM bridges
			WHERE 	damage_1 = 1 OR
					damage_2 = 1 OR
					damage_3 = 1 OR
					damage_4 = 1 OR
					damage_5 = 1 OR
					damage_6 = 1 OR
					damage_7 = 1 OR
					damage_8 = 1 OR
					damage_9 = 1 OR
					damage_10 = 1;";
		
	$i = 1;
	
	#echo $sql;
	echo "		<!-- Checkboxes for model selection -->\n";
	if(!$result = $camp_link->query($sql)){
		die('There was an error running the query ' . mysqli_error($camp_link));
	}
	
	echo "<h3>Campaign Object Set</h3>\n";	
	echo "<div class=\"checkboxWrapper\">\n";

	# load results into variables 
	while ($obj = mysqli_fetch_object($result)) {
		$bridgeId		=($obj->id);
		$bridgeName		=($obj->Name);
		$bridgeDamage1	=($obj->damage_1);
		$bridgeDamage2	=($obj->damage_2);
		$bridgeDamage3	=($obj->damage_3);
		$bridgeDamage4	=($obj->damage_4);
		$bridgeDamage5	=($obj->damage_5);
		$bridgeDamage6	=($obj->damage_6);
		$bridgeDamage7	=($obj->damage_7);
		$bridgeDamage8	=($obj->damage_8);
		$bridgeDamage9	=($obj->damage_9);
		$bridgeDamage10	=($obj->damage_10);
		if (   $bridgeDamage1 == 1 OR $bridgeDamage2 == 1 OR $bridgeDamage3 == 1 OR $bridgeDamage4 == 1 OR $bridgeDamage5 == 1
			OR $bridgeDamage6 == 1 OR $bridgeDamage7 == 1 OR $bridgeDamage8 == 1 OR $bridgeDamage9 == 1 OR $bridgeDamage10 == 1) {
			$objectStatus = 1;
		}
		
		echo "<div class=\"checkbox\">\n";
		if	($objectStatus == 1) {
			echo "		<p><b>$bridgeName</b></p>\n";
			echo "		<input class =\"special\" id=\"objectIdActive_$i\" type=\"radio\" name ='$bridgeName' value =\"1\" >\n";
			echo "		<label class =\"special\" for=\"objectIdActive_$i\">passable</label>\n";
			
			echo "		<input class =\"special\" id=\"objectIdInactive_$i\" type=\"radio\" name ='$bridgeName' value =\"0\" checked>\n";
			echo "		<label class =\"special\" for=\"objectIdInactive_$i\">impassable</label><br \>\n";			
		}
		else {
			echo "		<p><b>$bridgeName</b></p>\n";
			echo "		<input class =\"special\" id=\"objectIdActive_$i\" type=\"radio\" name ='$bridgeName' value =\"1\" checked>\n";
			echo "		<label class =\"special\" for=\"objectIdActive_$i\">passable</label>\n";
			
			echo "		<input class =\"special\" id=\"objectIdInactive_$i\" type=\"radio\" name ='$bridgeName' value =\"0\" >\n";
			echo "		<label class =\"special\" for=\"objectIdInactive_$i\">impassable</label><br \>\n";
		}
		echo "</div>\n";
		
		# damaged spawns
		echo "<div class=\"radio\">\n"; 
			if ($bridgeDamage1 == 1) {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled checked>  \n";
				echo "	<label for=\"damagedSpan$i\">Span 1</label>  \n";
			}
			else {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled >  \n";
				echo "	<label for=\"damagedSpan$i\">Span 1</label>  \n";
			}
			if ($bridgeDamage2 == 1) {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\"  disabled checked>  \n";
				echo "	<label for=\"damagedSpan$i\">Span 2</label>  \n";
			}
			else {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled >  \n";
				echo "	<label for=\"damagedSpan$i\">Span 2</label>  \n";
			}
			if ($bridgeDamage3 == 1) {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\"  disabled checked>  \n";
				echo "	<label for=\"damagedSpan$i\">Span 3</label>  \n";
			}
			else {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled >  \n";
				echo "	<label for=\"damagedSpan$i\">Span 3</label>  \n";
			}
			if ($bridgeDamage4 == 1) {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled checked>  \n";
				echo "	<label for=\"damagedSpan$i\">Span 4</label>  \n";
			}
			else {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled >  \n";
				echo "	<label for=\"damagedSpan$i\">Span 4</label>  \n";
			}
			if ($bridgeDamage5 == 1) {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled checked>  \n";
				echo "	<label for=\"damagedSpan$i\">Span 5</label>  \n";
			}
			else {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled >  \n";
				echo "	<label for=\"damagedSpan$i\">Span 5</label>  \n";
			}
			if ($bridgeDamage6 == 1) {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled checked>  \n";
				echo "	<label for=\"damagedSpan$i\">Span 6</label>  \n";
			}
			else {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled >  \n";
				echo "	<label for=\"damagedSpan$i\">Span 6</label>  \n";
			}
			if ($bridgeDamage7 == 1) {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled checked>  \n";
				echo "	<label for=\"damagedSpan$i\">Span 7</label>  \n";
			}
			else {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled >  \n";
				echo "	<label for=\"damagedSpan$i\">Span 7</label>  \n";
			}
			if ($bridgeDamage8 == 1) {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled checked>  \n";
				echo "	<label for=\"damagedSpan$i\">Span 8</label>  \n";
			}
			else {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled >  \n";
				echo "	<label for=\"damagedSpan$i\">Span 8</label>  \n";
			}
			if ($bridgeDamage9 == 1) {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled checked>  \n";
				echo "	<label for=\"damagedSpan$i\">Span 9</label>  \n";
			}
			else {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled >  \n";
				echo "	<label for=\"damagedSpan$i\">Span 9</label>  \n";
			}
			if ($bridgeDamage10 == 1) {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled checked>  \n";
				echo "	<label for=\"damagedSpan$i\">Span 10</label>  \n";
			}
			else {
				echo "	<input id=\"damagedSpan$i\" type=\"radio\" name=\"\" value=\"\" disabled >  \n";
				echo "	<label for=\"damagedSpan$i\">Span 10</label>  \n";
			}
		
		echo "</div>\n";
				
		print "<hr noshade width=\"auto\" size=\"1\" >\n";
		$i ++;
	}
	echo "</div>\n";

?>

