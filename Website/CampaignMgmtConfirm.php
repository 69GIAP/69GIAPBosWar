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
					$bottomLeftX = $_POST["bottomLeftX"];
					$bottomLeftZ = $_POST["bottomLeftZ"];
					$topRightX = $_POST["topRightX"];
					$topRightZ = $_POST["topRightZ"];
					
					$updateCampaignParameters = $_POST["updateCampaignParameters"];
					
				# prepare sql based on selected aircraft
				if ($_POST["updateCampaignParameters"] == 1)
					{
						echo "Not yet defined";
					}
				if ($_POST["updateCampaignParameters"] == 2)
					{
						echo "Not yet defined";
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
