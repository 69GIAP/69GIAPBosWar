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
				
                echo "$loadedCampaign<br />\n";

	        # TUSHKA - dump all POST variables
		foreach ($_POST as $param_name => $param_val) {
		    echo "Param: $param_name; Value: $param_val<br />\n";
		}
	
                # airfield name from selection form
                $airfieldName = $_POST["airfieldName"];	
				echo $airfieldName;
                     
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
