<!DOCTYPE HTML>
<html lang="en">
<head><meta charset="UTF-8">
<title>Updating a column</title>
</head>
<body>
<form action="columnchecker.php" method="POST">
<p>Name of Column <input type="text" name="colname" size="31"></P>
<p>Vector 0 - 360°</p><input type="number" name="vector" size="2" value="000" min="0" max="360"><br>
<p>Vehicles 
<select name="vehicle_1">
<option value="crossley">crossley</option>
<option value="leyland">leyland</option>
</select>
<select name="vehicle_2">
<option value="         ">       </option>
<option value="crossley">crossley</option>
<option value="leyland">leyland</option>
</select>
</p> 
<br>
<p><input type="submit"></p>
</form>

</body>
</html>
