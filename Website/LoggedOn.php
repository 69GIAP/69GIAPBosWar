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

				include ('includes/debuggingSessionVariables.php');	

				#checking user role
				if ($userRole == "administrator")
					{
						echo "<p>This page is visible when the [Home] button is used and when the user loggs into the website.</p></>\n";
						echo "<p>To administer Users use the [User Management] button.</p>\n";
			            echo "<p>To navigate to the Campaign Management use the [Campaign Management] button.</p>\n";
					}
				else if ($userRole == "commander")
					{
						echo "<p>Logged on as Commander.</p></>\n";
					}
				if ($userRole == "viewer")
					{
						echo "<p>Logged on as viewer.</p></>\n";
					}
				else
					{
						# This redirects the user to the Login screen if he tries to press a button and is not logged on
						include ( 'includes/errorNotLoggedOn.php' );
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
