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
        
				# check to make sure the session variable is registered 
				if(isset($_SESSION["userName"]))
					{ 
						# session variables get cleaned out; SESSION['game'] stays intact 
						unset ($_SESSION['btn']);
						unset ($_SESSION['userName']); 
						unset ($_SESSION['userRole']);
						unset ($_SESSION['userRoleId']);
						unset ($_SESSION['camp_db']);	
						unset ($_SESSION['userId']);
						unset ($_SESSION['camp_db']);
						unset ($_SESSION['airfieldName']);
						unset ($_SESSION['userCoalId']);
						unset ($_SESSION['objectClass']);
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
	# close $dbc
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
