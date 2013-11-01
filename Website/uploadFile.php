<?php 
// uploadFile.php
// upload .Group and .Mission files to server
// =69.GIAP=MYATA and =69.GIAP=TUSHKA
// Oct 11, 2013
// latest revision: Oct 26, 2013
// BOSWAR version1.1
// for testing see uploadFile.php

// Incorporate the MySQL connection script.
require ( '../connect_db.php' );
	
// Include the webside header
include ( 'includes/header.php' );
	
// Include the navigation on top
include ( 'includes/navigation.php' );

?>
<div id="wrapper">
<div id="container">
<div id="content">
<?php           
// configuration
$SaveToDir = "C:/BOSWAR/";
// restrict uploaded files to .Group and .Mission files
$allowedExts = array("Group", "group", "Mission", "mission");
// get $returnpage
$returnpage = $_POST["returnpage"];
//echo "\$returnpage: $returnpage<br />\n";

$temp = explode(".", $_FILES["userfile"]["name"]);
$extension = end($temp);
// limit size to 4 MB max (3 MB is a large .Mission file in RoF)
// (can tune later if needed for BoS)
// and require extension to be in allowed list
if ( $_FILES["userfile"]["size"] < 4000000 && in_array($extension, $allowedExts)) {
   if ($_FILES["userfile"]["error"] > 0) {
      echo "Return Code: " . $_FILES["userfile"]["error"] . "<br>";
   } else {
      echo "Upload: " . $_FILES["userfile"]["name"] . "<br>";
      echo "Type: " . $_FILES["userfile"]["type"] . "<br>";
      echo "Size: " . (round ($_FILES["userfile"]["size"] / 1024 /1024, 2)) . " MB<br>";
      echo "Temp file: " . $_FILES["userfile"]["tmp_name"] . "<br>";
      if (file_exists("$SaveToDir" . $_FILES["userfile"]["name"])) {
	 echo $_FILES["userfile"]["name"] . " already exists. ";
      } else {
	 move_uploaded_file($_FILES["userfile"]["tmp_name"],
	 "$SaveToDir" . $_FILES["userfile"]["name"]);
	 echo "Saved to: " . "$SaveToDir" . $_FILES["userfile"]["name"];
      }
   }
} else {
   if ($_FILES["userfile"]["size"] > 4000000) {
      echo $_FILES["userfile"]["name"]." is > 4 MB<br />\n";
   } else {
      echo ".$extension is not an allowed extension";
   }
}
?> 
<br />&nbsp;<br />
<a href="$returnpage" onClick="history.back();return false;">Go back</a>
</div>
</div>
<?php
// Include the general sidebar
include ( 'includes/sidebar.php' );
?>	

<div id="clearing"></div>
</div>

<?php
// close $dbc
$dbc->close();
// Include the footer
include ( 'includes/footer.php' );
?>
