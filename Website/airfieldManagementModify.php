<?php 

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
				
				# airfield name from selection form
				$airfieldName = $_POST["airfieldName"];
				$airfieldCoalition = $_POST["airfieldCoalition"];
				$airfieldModel = $_POST["airfieldModel"];
				$airfieldNumber = $_POST["airfieldNumber"];	
				
				echo "airfieldName: $airfieldName <br>\n";
				echo "airfieldCoalition: $airfieldCoalition <br>\n";
				echo "airfieldModel: $airfieldModel <br>\n";
				echo "airfieldNumber: $airfieldNumber <br>\n";
                     
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
