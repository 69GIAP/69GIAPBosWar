<?php

	#debugging navigation bar
	/*echo "<div class=\"debugging\"<br>\n";
	echo "debugging SESSION variables:</p>\n";
	echo "Loaded Campaign: <b>"		.$loadedCampaign.	"</b><br>\n";
	echo "Loaded Game: <b>"			.$game.				"</b><br>\n";
	echo "Loaded Button Press: <b>"	.$btn.				"</b><br>\n";
	echo "Loaded Role: <b>"			.$userRole.			"</b><br>\n";
	echo "Loaded User_Id: <b>"		.$user_id.			"</b><br>\n";
	echo "</div>\n";*/
	# debugging SESSION variables
	echo "\n <div class=\"debugging\">\n";
	foreach ($_SESSION as $param_name => $param_val) {
		echo "\$_SESSION $param_name: <b>$param_val</b><br> \n";}
	echo "</div> \n";
?>	