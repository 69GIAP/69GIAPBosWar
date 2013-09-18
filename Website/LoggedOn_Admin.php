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
            
			<?php 
				# This redirects the user to the Login screen if he tries to press a button and is not logged on
				include ( 'includes/errorNotLoggedOn.php' );
			?>
            <p>This page is visible when the [Home] button is used and when the user loggs into the website.</p>
            <p>To administer Users use the [User Management] button.</p>
            <p>To navigate to the Campaign Management use the [Campaign Management] button.</p>
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
