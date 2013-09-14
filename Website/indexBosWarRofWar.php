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

                <h1>Statistics</h1>
                <?php
					# should be bound dynamically to chosen $_SESSION["game"] to distinguish between Rof and Bos,
					# variable is already stored to $game = $_SESSION['game'] in the document header for each page
					# so it can be used to verify version in an if statement easily
					if ($game == "RofWar")
						{
							include ( 'includes/getRofCampaigns.php' );
						}
					else
						{
							include ( 'includes/getBosCampaigns.php' );
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
