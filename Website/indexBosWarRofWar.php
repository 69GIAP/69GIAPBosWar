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
				
            	<?php
					echo "<h2>Welcome to ";
					
                	if ($game == 'RoF')
						{	echo "ROFWAR";	}
					else
						{	echo "BOSWAR";	}
					
					echo "!</h2>\n";
					echo "<p>Please select the campaign you are interested in.</p>\n";
					
					include ( 'includes/getCampaigns.php' );
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
	# Close the dbc connection
	mysqli_close($dbc);

	# Include the footer
	include ( 'includes/footer.php' );
?>
