<?php
// show directory content
// code borrowed from from the readdir() function documentation
// it was user contributed
function showDir($dir, $i, $maxDepth){
   $i++;
   if($checkDir = opendir($dir)){
       $cDir = 0;
       $cFile = 0;
       // check all files in $dir, add to array listDir or listFile
       while($file = readdir($checkDir)){
           if($file != "." && $file != ".."){
               if(is_dir($dir . "/" . $file)){
                   $listDir[$cDir] = $file;
                   $cDir++;
               }
               else{
                   $listFile[$cFile] = $file;
                   $cFile++;
               }
           }
       }
      
       // show directories
       if(count($listDir) > 0){
           sort($listDir);
           for($j = 0; $j < count($listDir); $j++){
               echo "
               <tr>";
                   $spacer = "";
                   for($l = 0; $l < $i; $l++) $spacer .= "&emsp;";
                   // create link
                   $link = "<a href=\"" . $_SERVER["PHP_SELF"] . "?dir=" . $dir . "/" . $listDir[$j] . "\">$listDir[$j]</a>";
                   echo "<td>" . $spacer . $link . "</td>
               </tr>";
               // list all subdirectories up to maxDepth
               if($i < $maxDepth) showDir($dir . "/" . $listDir[$j], $i, $maxDepth);
           }
       }
      
       // show files
	   /*
       if(count($listFile) > 0){
           sort($listFile);
           for($k = 0; $k < count($listFile); $k++){
               $spacer = "";
               for($l = 0; $l < $i; $l++) $spacer .= "&emsp;";
               echo "
               <tr>
                   <td>" . $spacer . $listFile[$k] . "</td>
               </tr>";   
           }
       }       
		*/
       closedir($checkDir);
   }
}

if($_GET["dir"] == "" || !is_dir($_GET["dir"])) $dir = getcwd();
else $dir = $_GET["dir"];
// replace backslashes, not necessary, but better to look at
$dir = str_replace("\\", "/", $dir);

// show parent path
$pDir = pathinfo($dir);
$parentDir = $pDir["dirname"];

echo "<a href=\"" . $_SERVER["PHP_SELF"] . "\"><h3>Home</h3></a>";
echo "Current directory: " . $dir;
echo "<a href=\"" . $_SERVER["PHP_SELF"] . "?dir=$parentDir\"><h4>Parent directory: $parentDir</h4></a>";

// Display directory content
echo"<table border=1 cellspacing=0 cellpadding=2>
<tr><th align=left>File / Dir</th>";

// specifies the maxDepth of included subdirectories
// set maxDepth to 0 if u want to display the current directory
$maxDepth = 0;
showDir($dir, -1, $maxDepth); 
?>

