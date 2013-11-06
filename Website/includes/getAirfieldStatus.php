<?php
// Get airfield status
// out of boswar_db
// 69giapmyata
// ver 1.0


	echo "<!-- Checkboxes for airfield selection -->\n";
	
	$i = 1;
	
	echo "<div class=\"checkboxWrapper\">\n";

	# load results into variables
	echo "<div class=\"checkbox\">\n"; 
	if	($airfieldEnabled == 1) {
	
		echo "		<input class =\"special\" id=\"airfieldNameActive_$i\" type=\"radio\" name ='$airfieldId' value =\"1\" checked>\n";
		echo "		<label class =\"special\" for=\"airfieldNameActive_$i\">active</label>\n";
		
		echo "		<input class =\"special\" id=\"airfieldNameInactive_$i\" type=\"radio\" name ='$airfieldId' value =\"0\" >\n";
		echo "		<label class =\"special\" for=\"airfieldNameInactive_$i\">inactive</label><br \>\n";			
	}
	else {
		echo "		<input class =\"special\" id=\"airfieldNameActive_$i\" type=\"radio\" name ='$airfieldId' value =\"1\" >\n";
		echo "		<label class =\"special\" for=\"airfieldNameActive_$i\">active</label>\n";
		
		echo "		<input class =\"special\" id=\"airfieldNameInactive_$i\" type=\"radio\" name ='$airfieldId' value =\"0\" checked>\n";
		echo "		<label class =\"special\" for=\"airfieldNameInactive_$i\">inactive</label><br \>\n";
	}

		echo "</div>\n";		
# COALITION RADIO BOX
		echo "<div class=\"radio\">\n";  
			if ($airfieldCoalition == 0) {
				echo "	<input id=\"neutral$i\" type=\"radio\" name=\"$airfieldName\" value=\"0\" checked>  \n";
				echo "	<label for=\"neutral$i\">Neutral</label>  \n";
				
				echo "	<input id=\"entente$i\" type=\"radio\" name=\"$airfieldName\" value=\"1\" >  \n";
				echo "	<label for=\"entente$i\">Entente</label>  \n";
				
				echo "	<input id=\"center$i\" type=\"radio\" name=\"$airfieldName\" value=\"2\">  \n";
				echo "	<label for=\"center$i\">Center</label> \n";
			}
			elseif ($airfieldCoalition == 1) {
				echo "	<input id=\"neutral$i\" type=\"radio\" name=\"$airfieldName\" value=\"0\" >  \n";
				echo "	<label for=\"neutral$i\">Neutral</label>  \n";	
							
				echo "	<input id=\"entente$i\" type=\"radio\" name=\"$airfieldName\" value=\"1\" checked>  \n";
				echo "	<label for=\"entente$i\">Entente</label>  \n";
				
				echo "	<input id=\"center$i\" type=\"radio\" name=\"$airfieldName\" value=\"2\" >  \n";
				echo "	<label for=\"center$i\">Center</label> \n"; 
			}
			elseif ($airfieldCoalition == 2) {
				echo "	<input id=\"neutral$i\" type=\"radio\" name=\"$airfieldName\" value=\"0\">  \n";
				echo "	<label for=\"neutral$i\">Neutral</label>  \n";	
							
				echo "	<input id=\"entente$i\" type=\"radio\" name=\"$airfieldName\" value=\"1\">  \n";
				echo "	<label for=\"entente$i\">Entente</label>  \n";
				
				echo "	<input id=\"center$i\" type=\"radio\" name=\"$airfieldName\" value=\"2\" checked>  \n";
				echo "	<label for=\"center$i\">Center</label> \n";
			}

	echo "</div>\n";
echo "</div>\n";
?>

