// Get Aircraft Quantity for a pulldown list
// 69giapmyata
// ver 1.1
<?php

	# create the Quantity dropdown dynamically based on the variables
	$number = 1;
	while ($number <= 10 )
	{
		echo "<option value=\"". $number. "\">". $number. "</option>\n";
		$number += 1;
	}

?>
