<?php 
# creates a new session for tracking the user is logged on 
	session_start(); 

# Incorporate the MySQL debug script.
	require ( 'includes/debug.php' );

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
	
# Include the webside header
	include ( 'includes/RofWar_header.php' );
	
# Include the navigation on top
	include ( 'includes/RofWar_navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
                <p>Logged on as CenterAirAdmin.</p>
            </div>
    
        </div>

<?php
	# Include the general sidebar
	include ( 'includes/RofWar_sidebar.php' );
?>	

		<div id="clearing"></div>
	</div>

<?php
	# Include the footer
	include ( 'includes/RofWar_footer.php' );
?>