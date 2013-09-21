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
				
				# POST from airfield form
				$airfieldName = $_POST["airfieldName"];
				$airfieldCoalition = $_POST["airfieldCoalition"];
				$airfieldModel = $_POST["airfieldModel"];
				$airfieldNumber = $_POST["airfieldNumber"];	
				
                  
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
