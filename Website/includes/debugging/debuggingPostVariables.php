<?php
	echo "\n <div class=\"debuggingPost\">\n";
	# TUSHKA - dump all POST variables for debugging
	foreach ($_POST as $param_name => $param_val) {
		if (is_array($param_val)) {
				echo "\$_POST $param_name: <br />\n";
				print_r(array_values($param_val));
				echo "<br />\n";
		} else {
			echo "\$_POST $param_name: <b>$param_val</b><br />\n";
		}
	}
	echo "</div> \n";
?>
