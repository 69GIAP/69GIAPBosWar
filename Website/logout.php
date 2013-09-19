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
        
				# check to make sure the session variable is registered 
				if(isset($_SESSION["username"]))
					{ 
						# session variables get cleaned out; SESSION['game'] stays intact 
						unset ($_SESSION['btn']);
						unset ($_SESSION['username']); 
						unset ($_SESSION['userRole']);
						unset ($_SESSION['camp_db']);	
						header("Location: IndexBosWarRofWar.php");
					} 
				else
					{ 
						# the session variable isn't registered, the user shouldn't even be on this page 
						header("Location: IndexBosWarRofWar.php" ); 
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