<?php
function PLAYERPLANE($i) { // AType:10
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $Planes;
   global $PLID; // player plane id 
   global $PID; // plane ID (whether bot or player)
   global $BUL; // # of bullets
   global $SH; // unknown
   global $BOMB; // # of bombs
   global $RCT; // unknown
   global $POS; // position x,y,z
   global $IDS; // player profile ID/ plane ID
   global $LOGIN; // player account ID
   global $NAME; // player profile name
   global $TYPE; // type of plane in this context
   global $COUNTRY; // country ID
   global $FORM; // unknown - perhaps formation?
   global $FIELD; // unknown - perhaps type of field?
   global $INAIR; // unknown - perhaps airstart?
   global $PARENT; // unkown
   global $numplayers; // number of players
   global $Pline;  // lines that define players

// example line
// Type:10 PLID:1252352 PID:1253376 BUL:2000 SH:0 BOMB:7 RCT:0 (247592.031,29.269,84643.422) IDS:0c1459c5-5a39-411e-b03c-9149676c2f82 LOGIN:18c61e14-c0b2-4c70-9a8a-56f371fb85eb NAME:Tushka:69GIAP TYPE:Gotha G.V COUNTRY:501 FORM:0 FIELD:0 INAIR:0 PARENT:-1
   // note: T and AType have already been trimmed off

   // nibble away from the left side of the line, extracting data as we go
   $Part[1] = substr($Part[1],5); // trim the "PLID:" leader off this line
   $Part = explode(" PID:",$Part[1],2); // split into PLID (planeID) and remainder at " PID:"
   $PLID[$i] = $Part[0];
   $Part = explode(" BUL:",$Part[1],2); // split into PID (playerID) and remainder at " BUL:"
   $PID[$i] = $Part[0];
   $Part = explode(" SH:",$Part[1],2); // split into BUL (bullets) and remainder  at " SH:"
   $BUL[$i] = $Part[0];
   $Part = explode(" BOMB:",$Part[1],2); // split into SH (?) and remainder  at " BOMB:"
   $SH[$i] = $Part[0];
   $Part = explode(" RCT:",$Part[1],2); // split into BOMB (bombs) and remainder at " RCT:"
   $BOMB[$i] = $Part[0];
   $Part = explode(" ",$Part[1],3); // split into RCT (?) and remainder at spaces
   $RCT[$i] = $Part[0];
   $POS[$i] = $Part[1];
   $Part[2] = substr($Part[2],4); // trim the "IDS:" leader off remainder
   $Part = explode(" LOGIN:",$Part[2],2); // split into IDS (profile) and remainder at " LOGIN:"
   $IDS[$i] = $Part[0];
   $Part = explode(" NAME:",$Part[1],2); // split into LOGIN (login) and remainder at " NAME:"
   $LOGIN[$i] = $Part[0];
   $Part = explode(" TYPE:",$Part[1],2); // split into NAME and remainder at " TYPE:"
   $NAME[$i] = $Part[0];
   $Part = explode(" COUNTRY:",$Part[1],2); // split into TYPE and remainder at " COUNTRY:"
   $TYPE[$i] = $Part[0];
   $Part = explode(" FORM:",$Part[1],2); // split into COUNTRY (country index) and remainder at " FORM:"
   $COUNTRY[$i] = $Part[0];
   $Part = explode(" FIELD:",$Part[1],2); // split into FORM (?) and remainder  at " FIELD:"
   $FORM[$i] = $Part[0];
   $Part = explode(" INAIR:",$Part[1],2); // split into FIELD (?) and remainder at " INAIR:"
   $FIELD[$i] = $Part[0];
   $Part = explode(" PARENT:",$Part[1],2); // split into INAIR (airstart?) and remainder at " PARENT:"
   $INAIR[$i] = $Part[0];
   $PARENT[$i] = rtrim($Part[1]);
   // note which line number refers to this player
   $Pline[$numplayers] = $i ;
   // add one to running total of players
   ++$numplayers;
//   ECHO ("<p>PLAYERPLANE $Ticks[$i] $PLID[$i] $PID[$i] $BUL[$i] $SH[$i] $BOMB[$i] $RCT[$i] $POS[$i] $IDS[$i] $LOGIN[$i] $NAME[$i] $TYPE[$i] $COUNTRY[$i] $FORM[$i] $FIELD[$i] $INAIR[$i] $PARENT[$i]<p>\n");
}
?>
