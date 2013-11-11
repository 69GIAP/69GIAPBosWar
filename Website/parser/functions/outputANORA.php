<?php
// ANORA
// select proper article: "an" or "a" (or no article at all)
// =69.GIAP=TUSHKA
// 2011-2013
// BOSWAR version 1.3
// Nov 11, 2013

function ANORA($word) {
	global $anora; // an or a

	// hacks to avoid an article with certain player names
	if ((substr($word,0,3) == "=69") || (substr($word,0,3) == "242") ||
		(substr($word,0,3) == "OZA") || (substr($word,0,3) == "Evi") ||
		(substr($word,0,3) == "Wil") || (substr($word,0,3) == "Tus") ||
		(substr($word,0,3) == "Cha") || (substr($word,0,3) == "JZ-") ||
		(substr($word,0,3) == "J18") || (substr($word,0,3) == "cro") ||
		(substr($word,0,3) == "_st") || (substr($word,0,3) == "VON") ||
		(substr($word,0,3) == "col") || (substr($word,0,3) == "vol") ||
		(substr($word,0,3) == "tyr") || (substr($word,0,3) == "LvA") ||
		(substr($word,0,3) == "=IR") || (substr($word,0,3) == "lew") ||
		(substr($word,0,3) == "hq ") || (substr($word,0,3) == "hq_") ||
		(substr($word,0,3) == "Duc") || (substr($word,0,3) == "WH_") ||
		(substr($word,0,3) == "K_L") || (substr($word,0,3) == "Hq_") ||
		(substr($word,0,3) == "LVA") || (substr($word,0,5) == "HeadT") ||
		(substr($word,0,3) == "=CA") || (substr($word,0,4) == "bfly") ||
		(substr($word,0,4) == "Otto") || (substr($word,0,5) == "Night") ||
		(substr($word,0,3) == "AB1") || (substr($word,0,5) == "Tozzi") ||
		(substr($word,0,3) == "LM_") || (substr($word,0,3) == "JaV") ||
		(substr($word,0,3) == "-NW") || (substr($word,0,3) == "Alg") ||
		(substr($word,0,3) == "Tan") || (substr($word,0,3) == "BSS") ||
		(substr($word,0,3) == "_BT") || (substr($word,0,3) == "BT_") ||
		(substr($word,0,3) == "The") || (substr($word,0,3) == "RED") ||
		(substr($word,0,4) == "Lord") || (substr($word,0,3) == "C6-") ||
		(substr($word,0,3) == "act") || (substr($word,0,4) == "N561") ||
		(substr($word,0,3) == "BH ") || (substr ($word,0,3) == "BH_") ||
		(substr($word,0,4) == "John") || (substr($word,0,3) == "=VA") ||
		(substr($word,0,3) == "Ron") || (substr($word,0,3) == "J2_") ||
		(substr($word,0,5) == "=III=") || (substr($word,0,4) == "Izra") ||
		(substr($word,0,4) == "Zach") || (substr($word,0,4) == "Star") ||
		(substr($word,0,4) == "zerw") || (substr($word,0,4) == "Rood") ||
		(substr($word,0,4) == "TeeK") || (substr($word,0,4) == "Robi") ||
		(substr($word,0,4) == "Baro") || (substr($word,0,4) == "Lark") ||
		(substr($word,0,4) == "Spa ") || (substr($word,0,4) == "Last") ||
		(substr($word,0,4) == "Par2") || (substr($word,0,4) == "Last") ||
		(substr($word,0,3) == "JG1") || (substr($word,0,3) == "J5_") ||
		(substr($word,0,3) == "CaK") || (substr($word,0,4) == "Flak") ||
		(substr($word,0,3) == "SPA") || (substr($word,0,4) == "= CA") ||
		(substr($word,0,4) == "Cors") || (substr($word,0,4) == "Hans")) {
			$anora = "";
		// by sound
		} elseif ((substr($word,0,1) == "A") || (substr($word,0,2) == "S." ) ||
			(substr($word,0,2) == "LM") || (substr($word,0,1) == "E") ||
			(substr($word,0,3) == "HMS") || (substr($word,0,3) == "R.E") ||
			(substr($word,0,3) == "F.E")) {
			$anora = "an";
		} else {
			$anora = "a";
	}
}
?>
