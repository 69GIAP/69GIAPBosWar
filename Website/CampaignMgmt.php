<?php 

# Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
	
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
							echo "<p>Please select one of the sidebar menu options to proceed!</p>\n";
						}
					if ($userRole == "commander")
						{
							echo "<p>Please choose out of one of the options in the side menu!</p>\n";
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
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
