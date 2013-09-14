<?php

# get active campaigns
$query = "SELECT * FROM statistics_test";
	
if(!$result = $dbc->query($query))
   { die('There was an error running the query [' . $dbc->error . ']'); }
	
if ($result = mysqli_query($dbc, $query)) 
	{
		
		# created first table line
		echo "<table id=\"statistics\">\n";
		# build stats table header
		echo "	<tr>\n";
		echo "		<th>Pilot</th>\n";
		echo "		<th>Pilot Rating</th>\n";
		echo "		<th>Sorties</th>\n";
		echo "		<th>Deaths</th>\n";
		echo "		<th>Captured</th>\n";
		echo "		<th>Air Kills</th>\n";
		echo "		<th>Ground Kills</th>\n";				
		echo "		<th>Sea Kills</th>\n";
		echo "		<th>Infantry Kills</th>\n";
		echo "		<th>Overall Score</th>\n";
		echo "	</tr>\n";
		
		# define variable for td class
		$rowcount=0;
		
		/* fetch associative array */
		while ($obj = mysqli_fetch_object($result)) 
			{
			$pilot			=($obj->pilot);
			$rating			=($obj->pilotrating);
			$sorites		=($obj->sorties);
			$deaths			=($obj->deaths);
			$captured		=($obj->captured);
			$airkills		=($obj->airkills);
			$groundkills	=($obj->groundkills);
			$seakills		=($obj->seakills);
			$infantrykills	=($obj->infantrykills);
			$grossscore		=($obj->grossscore);
			
			if ($rowcount%2==0)
				{
					# build even numbered rows of stats table
					echo "	<tr class=\"even\">\n";
					echo "		<td>$pilot</td>\n";
					echo "		<td>$rating</td>\n";
					echo "		<td>$sorites</td>\n";
					echo "		<td>$deaths</td>\n";
					echo "		<td>$captured</td>\n";
					echo "		<td>$airkills</td>\n";
					echo "		<td>$groundkills</td>\n";				
					echo "		<td>$seakills</td>\n";
					echo "		<td>$infantrykills</td>\n";
					echo "		<td>$grossscore</td>\n";
					echo "	</tr>\n";
					
					#increase counter to swithch style
					$rowcount++;
				}
				else
				{
					# build odd numbered rows of stats table
					echo "	<tr class=\"odd\">\n";
					echo "		<td>$pilot</td>\n";
					echo "		<td>$rating</td>\n";
					echo "		<td>$sorites</td>\n";
					echo "		<td>$deaths</td>\n";
					echo "		<td>$captured</td>\n";
					echo "		<td>$airkills</td>\n";
					echo "		<td>$groundkills</td>\n";				
					echo "		<td>$seakills</td>\n";
					echo "		<td>$infantrykills</td>\n";
					echo "		<td>$grossscore</td>\n";
					echo "	</tr>\n";
					
					#increase counter to swithch style
					$rowcount++;					
				}
			}
			echo "</table>\n";
		}
?>