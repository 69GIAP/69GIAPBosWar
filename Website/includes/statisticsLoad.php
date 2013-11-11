<?php
# statisticsLoad.php
# =69.GIAP=MYATA
# Oct 18, 2013
# Version 1.1
# Nov 10, 2013

# get active campaigns
$query = "SELECT MissionID, clocktime, attackerName, attackerCountryID, attackerCoalID, action, targetType, targetName, targetCountryID, targetCoalID, targetValue
		FROM kills
		WHERE MissionId = '$MissionID'
		ORDER BY attackerCountryID, attackerCoalID, clocktime asc";
	
if(!$result = $camp_link->query($query))
   { die('There was an error running the query [' . $camp_link->error . ']'); }
	
if ($result = $camp_link->query($query)) 
	{
		
		# created first table line
		echo "<h3>Mission statistics of mission: $MissionID</h3>";
		echo "<table id=\"statistics\">\n";
		# build stats table header
		echo "	<tr>\n";
		echo "		<th>Time</th>\n";
		echo "		<th>Attacker</th>\n";
		echo "		<th>Attacker Country</th>\n";
		echo "		<th>Attacker Coalition</th>\n";
		echo "		<th>Action</th>\n";
		echo "		<th>Target Typ</th>\n";
		echo "		<th>Target Name</th>\n";				
		echo "		<th>Target Country</th>\n";
		echo "		<th>Target Coalition</th>\n";
		echo "		<th>Target Value</th>\n";
		echo "	</tr>\n";
		
		# define variable for td class
		$rowcount=0;
		
		/* fetch associative array */
		while ($obj = $result->fetch_object()) 
			{
			$clocktime			=($obj->clocktime);
			$attackerName		=($obj->attackerName);
			$attackerCountryID	=($obj->attackerCountryID);
			$attackerCoalID		=($obj->attackerCoalID);
			$action				=($obj->action);
			$targetType			=($obj->targetType);
			$targetName			=($obj->targetName);
			$targetCountryID	=($obj->targetCountryID);
			$targetCoalID		=($obj->targetCoalID);
			$targetValue		=($obj->targetValue);
			
			if ($rowcount%2==0)
				{
					# build even numbered rows of stats table
					echo "	<tr class=\"even\">\n";
					echo "		<td>$clocktime</td>\n";
					echo "		<td>$attackerName</td>\n";
					echo "		<td>$attackerCountryID</td>\n";
					echo "		<td>$attackerCoalID</td>\n";
					echo "		<td>$action</td>\n";
					echo "		<td>$targetType</td>\n";				
					echo "		<td>$targetName</td>\n";
					echo "		<td>$targetCountryID</td>\n";
					echo "		<td>$targetCoalID</td>\n";
					echo "		<td>$targetValue</td>\n";					
					echo "	</tr>\n";
					
					#increase counter to swithch style
					$rowcount++;
				}
				else
				{
					# build odd numbered rows of stats table
					echo "	<tr class=\"odd\">\n";
					echo "		<td>$clocktime</td>\n";
					echo "		<td>$attackerName</td>\n";
					echo "		<td>$attackerCountryID</td>\n";
					echo "		<td>$attackerCoalID</td>\n";
					echo "		<td>$action</td>\n";
					echo "		<td>$targetType</td>\n";				
					echo "		<td>$targetName</td>\n";
					echo "		<td>$targetCountryID</td>\n";
					echo "		<td>$targetCoalID</td>\n";
					echo "		<td>$targetValue</td>\n";					
					echo "	</tr>\n";
					
					#increase counter to swithch style
					$rowcount++;					
				}
			}
			echo "</table>\n";
		}
?>
