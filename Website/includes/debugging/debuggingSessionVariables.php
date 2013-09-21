<?php

	# debugging SESSION variables
	echo "\n <div class=\"debugging\">\n";
	foreach ($_SESSION as $param_name => $param_val) {
		echo "\$_SESSION $param_name: <b>$param_val</b><br> \n";}
	echo "</div> \n";
?>	