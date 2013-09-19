<?php 
# creates a new session for tracking the user is logged on 
	session_start(); 

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
				<p>As this is the main screen the user sees we will put navigation description and general information on the tool in here.</p>
            	<?php 
				include ('includes/debuggingSessionVariables.php');				
				include ( 'includes/getCampaigns.php' );?>
            </div>
    
        </div>

<?php
	# Include the general sidebar
	include ( 'includes/sidebar.php' );
?>	

		<div id="clearing"></div>
	</div>

<?php
	# Close the dbc connection
	mysqli_close($dbc);

	# Include the footer
	include ( 'includes/footer.php' );
?>
