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
								$modelNameAdd	= $_GET['model'];
								
								echo "<form  id=\"airfieldForm\" name=\"login\"  action=\"airfieldMgmtChange.php?btn=campStp&airfieldName=$airfieldName#addRemove\" method=\"post\">\n";	
								echo "	<fieldset class=\"actions\">\n";	
								echo "  <h1 id=\"h1Form\">Error!</h1>\n";
													
								if ($error == 1)
									{
										echo "<p>There is already the maximum amount of aircraft models assigned to the airfield <b>$airfieldName</b>!<p>\n";
									}
								if ($error == 2)
									{
										echo "<p>There is already an aircraft model type <b>$modelNameAdd</b> assigned to the airfield <b>$airfieldName</b>!<p>\n";
									}
	
								# BUTTON
								echo "		<li>";
								echo "		<button type=\"submit\" name=\"updateAirfield\" id=\"submitHalfsize1\" value =\"6\" id=\"submit\">Back</button>\n";
								echo "		</li>\n";	
												
								echo "	</fieldset>\n";					
								echo "</form>\n";						
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
