<?php 

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );

# clear some SESSION variables
#	unset ($_SESSION['camp_db']);
#	unset ($_SESSION['airfieldName']);
		
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );


?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
				<?php 

					# Feedback to the user wich campaign he is connected to right now
					echo "<p>You will be able to change the status of the campaign '$loadedCampaign' soon.</p>\n";	

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
