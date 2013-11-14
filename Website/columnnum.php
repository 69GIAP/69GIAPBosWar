<?php
// columnnum.php
// provide column number arithmetic
// =69.GIAP=TUSHKA
// Nov 13, 2013
// BOSWAR version 1.0

// start with 111 i.e. Bat 1 Co 1 Pl 1 / Abt 1 Ko 1 Zug 1 
// end with 999 i.e. Bat 9 Co 9 Pl 9 / Abt 9 Ko 9 Zug 9
for ($num = 111; $num < 1000; ++$num) {
	// convert number to string by putting quotes around it
	$string = "$num";
//	echo "$string[1]<br />\n";
	if (!$string[2] == "0") {
		if (!$string[1] == "0") {
//			echo "$num<br />\n";
			echo "Bat $string[0] Co $string[1] Pl $string[2] or
			   	Abt $string[0] Ko $string[1] Zug $string[2]<br />\n";
		}
	}
}
?>
