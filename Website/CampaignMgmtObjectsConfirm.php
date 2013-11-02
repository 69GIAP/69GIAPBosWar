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
                
				$query	= '';
				
				# get POST variables and bind into idList variable
				foreach ($_POST as $param_name => $param_val) {

					$query .= "UPDATE rof_campaign_objects SET active = 1, coalId = $param_val WHERE id = $param_name ;<br>\n";

				}

				echo $query;
                
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
