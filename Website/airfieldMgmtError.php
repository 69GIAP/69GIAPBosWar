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
					$error = $_GET['error'];
					$airfieldName = $_SESSION['airfieldName'];
										
					if ($error == 1)
						{
							echo "<p>There is already the maximum amount of aircraft models assigned to this airfield!<p>\n";
						}
					if ($error == 2)
						{
							echo "<p>There is already an aircraft model of this type assigned to the airfield!<p>\n";
						}
						
					echo "<fieldset class=\"boswar\">\n";
					echo "	<form  name=\"airfieldModify\"  action=\"airfieldMgmtChange.php?btn=campMgmt&airfieldName=$airfieldName\" method=\"post\">\n";
						
					# BUTTON
					echo "		<li><label for=\"submit\"></label>\n";
					echo "		<button type=\"changeCoalition\" name=\"updateAirfield\" value =\"6\" id=\"submit\">Back</button>\n";
					echo "		</li>\n";	
									
					echo "</fieldset>\n";					
					echo "	</form>\n";						
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
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
