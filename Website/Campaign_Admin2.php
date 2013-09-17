<?php 
# creates a new session for tracking the user is logged on 
	session_start(); 

# Incorporate the MySQL debug script.
	require ( 'includes/debug.php' );

# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

#  include connect2_db.php (defines connect_campaign())
         include ( 'includes/connect2campaign.php' );



?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
               <h2>Campaign Admin2</h2>
<?php
	       $link = connect_campaign('localhost',"rofwar","rofwar","flanders_eagles");
	        include ( "includes/test_change_db.php" ); ?>
            </div>
    
        </div>
<?php
	# Include the general sidebar
	include ( "includes/campaignsidebar.php" );
?>	

		<div id="clearing"></div>

	</div>

<?php
	# Include the footer
	include ( "includes/footer.php" );
?>
