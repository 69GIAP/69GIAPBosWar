<div id="side">
<?php
# check if there is a user logged on

if (!empty($_SESSION["username"])) {		
#   # Using a different  username variable due to conflicts with the below query
#   $ActualUser = $_SESSION["username"];
#   $query = "SELECT role FROM users WHERE username LIKE '$ActualUser' LIMIT 1";
#   $result = mysqli_query($dbc, $query);
#   $row 	= mysqli_fetch_object($result);
#   $role	= $row->role;
   #echo "$role <br>\n";
   # define what administrator sees in the sidebar
#   if ($role == "administrator") {
      echo "<h1>Campaign Admin:</h1>\n";
      echo "	<ul id=\"sidebar\">\n";
      echo "		<li>Option 1</li>\n";
      echo "		<li>Option 2<li>\n";
      echo "		<li>Option 3</li>\n";
      echo "		<li>Option 4</li>\n";                               
      echo "	</ul>\n";
#   }
#} else {
#   # there is no user logged on so this is the default view
#   echo "<h1>Statistics:</h1>\n";
}
?>

</div>
