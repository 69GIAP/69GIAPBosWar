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
						$sql = "SELECT * FROM test_airfields WHERE name = $airfieldName";
						
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
								# print results				
								echo $airfieldName;
								echo $airfieldCoalition;
								echo $airfieldModel;
								echo $airfieldNumber;
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