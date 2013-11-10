<?php
function TOFROM($where) {
// massage $where string to show takeoff "from" rather than "at" or "next to"
   global $where; // position in english

   $where = preg_replace("/^at/", "from", $where);
   $where = preg_replace("/next to/", "from", $where);
}
?>
