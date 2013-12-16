<?php
function TOFROM($where) {
// massage $where string to show takeoff "from" rather than "at" or "next to"
// =69.GIAP=TUSHKA
// 2011-2013
// BOSWAR version 1.01
// Dec 15, 2013
	
	$where = preg_replace("/^at/", "from", $where);
	$where = preg_replace("/next to/", "from", $where);
	return $where;
}
?>
