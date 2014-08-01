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
							echo "<p><b>Campaign Setup</b> includes all the tasks that need to be done before the planning of the first mission.
							The map and parameters which will be used, the vehicles, the planes the ground forces on the map and exactly where they are positionned at the start of the campaign.</p>\n";							
							echo "<p><b>Prepare Mission</b> includes all the tasks that need to be done in planning a mission.
							What planes will be available on each airfield. What resupply vehicles are arriving on the map at the supply points and where vehicles are moving to.</p>\n";							
							echo "<p><b>Post mission</b> includes all the tasks that need to be done after running the mission.
							Statistics are analysed and killed vehicles are removed before starting the planning of the next mission.</p>\n";							
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
