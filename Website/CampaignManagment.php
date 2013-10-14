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
				
                	# This redirects the user to the Login screen if he tries to press a button and is not logged on
					include ( 'includes/errorNotLoggedOn.php' );

					# show campaigns due to User role
					if ($userRole == "administrator")
						{
							echo "Here has to be some intelligent text other than this!";
						}
					if ($userRole == "commander")
						{
							echo "Please choose out of one of the options in the side menu!";
						}
					if ($userRole == "viewer")
						{
							echo "<p>You don't have the necessary rights to view this content.</p>\n";
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
