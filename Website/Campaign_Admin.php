<?php 

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
			<?php include ( 'includes/getCampaignsAdmin.php' ); ?>
            <?php include ( 'includes/test_change_db.php' ); ?>
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
