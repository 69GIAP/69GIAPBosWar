<?php 

# Incorporate the MySQL debug script.
	require ( 'includes/debug.php' );

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
	
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            	<?php 
				   # User management code
					
					# bind post variable into variables
					#  airield name from selection form
						$airfieldName = $_POST["airfieldName"];	

					# get data from test_airfield table dependent on selection
						$sql = "SELECT * FROM test_airfields WHERE name =\"" . $airfieldName."\"";
						#echo $sql;
						
						if(!$result = $dbc->query($sql)){
						die('There was an error running the query ' . mysqli_error($dbc));
						}
						# load results into variables 
						while ($obj = mysqli_fetch_object($result)) 
							{
								$airfieldName		=($obj->name);
								$airfieldCoalition	=($obj->coalition);
								$airfieldModel		=($obj->model);
								$airfieldNumber		=($obj->number);
								
								
								# get coalition name and store to variable
								$getCoalName = "SELECT Coalitionname FROM rof_coalitions WHERE coalID = " . $airfieldCoalition."";
								if(!$result = $dbc->query($getCoalName)){
									die('There was an error running the query ' . mysqli_error($dbc));
									}
								# load results into variables 
								while ($obj = mysqli_fetch_object($result)) 
									{
										$airfieldCoalitionName		=($obj->Coalitionname);
									}
								
								# print results to form
								echo "<fieldset class=\"boswar\">\n";
								echo "	<form  name=\"airfieldModify\"  action=\"airfieldManagementModify.php\" method=\"post\">\n";
								echo "		<li> <label for=\"airfieldName\">Airfield Name:<br></label>\n";
								echo "		<input type=\"text\" name=\"airfieldName\" id=\"airfieldName\" placeholder='$airfieldName' size=\"24\" maxlength=\"50\" />\n";
								echo "		</li>\n";
								
								echo "		<li> <label for=\"airfieldCoalition\">Coalition:<br></label>\n";
								echo "		<input type=\"text\" name=\"airfieldCoalition\" id=\"airfieldCoalition\" placeholder='$airfieldCoalitionName' size=\"24\" maxlength=\"50\" />\n";
								echo "		</li>\n";
								
								echo "		<li> <label for=\"airfieldModel\">Aircraft:<br></label>\n";
								echo "		<input type=\"text\" name=\"airfieldModel\" id=\"airfieldModel\" placeholder='$airfieldModel' size=\"24\" maxlength=\"50\" />\n";
								echo "		</li>\n";
								
								echo "		<li> <label for=\"airfieldNumber\">Quantity:<br></label>\n";
								echo "		<input type=\"text\" name=\"airfieldNumber\" id=\"airfieldNumber\" placeholder='$airfieldNumber' size=\"24\" maxlength=\"50\" />\n";
								echo "		</li>\n";
								
								echo "		<li><label for=\"submit\"></label>\n";
								echo "		<button type=\"submit\" id=\"submit\">Update</button>\n";
								echo "		</li>\n";
								echo "	</form>\n";
								echo "</fieldset>\n";
								
								# print results to form with drop menus
								echo "<fieldset class=\"boswar\">\n";
								echo "	<form  name=\"airfieldModify\"  action=\"airfieldManagementModify.php\" method=\"post\">\n";
								echo "		<li> <label for=\"airfieldName\">Airfield Name:<br></label>\n";
								echo "		<input type=\"text\" name=\"airfieldName\" id=\"airfieldName\" placeholder='$airfieldName' size=\"24\" maxlength=\"50\" />\n";
								echo "		</li>\n";
								
								echo "		<li> <label for=\"airfieldCoalition\">Coalition:<br></label>\n";
								echo "		<input type=\"text\" name=\"airfieldCoalition\" id=\"airfieldCoalition\" placeholder='$airfieldCoalitionName' size=\"24\" maxlength=\"50\" />\n";
								echo "		</li>\n";
								
								echo "		<li> <label for=\"airfieldModel\">Aircraft:<br></label>\n";
								echo "		<input type=\"text\" name=\"airfieldModel\" id=\"airfieldModel\" placeholder='$airfieldModel' size=\"24\" maxlength=\"50\" />\n";
								echo "		</li>\n";
								
								echo "		<li> <label for=\"airfieldNumber\">Quantity:<br></label>\n";
								echo "		<input type=\"text\" name=\"airfieldNumber\" id=\"airfieldNumber\" placeholder='$airfieldNumber' size=\"24\" maxlength=\"50\" />\n";
								echo "		</li>\n";
								
								echo "		<li><label for=\"submit\"></label>\n";
								echo "		<button type=\"submit\" id=\"submit\">Update</button>\n";
								echo "		</li>\n";
								echo "	</form>\n";
								echo "</fieldset>\n";
								
							}		
				?> 
                
            </div>
    
        </div>

<?php
	# Include the general sidebar
	include ( 'includes/sidebar.php' );
?>	

		<div id="clearing"></div>
	</div>

<?php
	# Include the footer
	include ( 'includes/footer.php' );
?>