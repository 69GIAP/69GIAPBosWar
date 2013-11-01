<?php 

# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
				<?php
					$SetupDone = $_POST["Setup"];
					echo "\$SetupDone: $SetupDone<br />\n";
						
				if ($SetupDone == 'true') {
					header ("Location: CampaignMgmtUpload.php?btn=campMgmt");
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
	$dbc->close;
	# Include the footer
	include ( 'includes/footer.php' );
?>
