<?php 
// uploadFile.php
// upload .Group and .Mission files to server
// =69.GIAP=MYATA and =69.GIAP=TUSHKA
// Oct 11, 2013
// latest revision: Oct 26, 2013
// BOSWAR version1.1

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
// restrict uploaded files to .Group and .Mission files
$allowedExts = array("Group", "Mission");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
// limit size to 4 MB max (3 MB is a large .Mission file in RoF)
// (can tune later if needed for BoS)
// and require extension to be in allowed list
if ( $_FILES["file"]["size"] < 4000000 && in_array($extension, $allowedExts)) {
   if ($_FILES["file"]["error"] > 0) {
      echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
   } else {
      echo "Upload: " . $_FILES["file"]["name"] . "<br>";
      echo "Type: " . $_FILES["file"]["type"] . "<br>";
      echo "Size: " . (round ($_FILES["file"]["size"] / 1024 /1024, 2)) . " MB<br>";
      echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
      if (file_exists("C:/BOSWAR/" . $_FILES["file"]["name"])) {
	 echo $_FILES["file"]["name"] . " already exists. ";
      } else {
	 move_uploaded_file($_FILES["file"]["tmp_name"],
	 "C:/BOSWAR/" . $_FILES["file"]["name"]);
	 echo "Saved to: " . "C:/BOSWAR/" . $_FILES["file"]["name"];
      }
   }
} else {
   echo "Invalid file";
}
?> 
</div>
</div>
<?php
// Include the general sidebar
include ( 'includes/sidebar.php' );
?>	

<div id="clearing"></div>
</div>

<?php
// Include the footer
include ( 'includes/footer.php' );
?>
