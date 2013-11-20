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
					$newCampStatus = $_POST["newCampStatus"];
						
				if ($_POST["createCampaign"] == 1)
					{
					$query="UPDATE campaign_settings SET status = $newCampStatus WHERE camp_db = '$loadedCampaign'";
					}
				if ($_POST["createCampaign"] == 2)
					{
						echo "Not yet defined";
						exit;
					}						
						
				# updates
				if(!$result = $camp_link->query($query)){
					die('There was an error running the query <br>'.$query."<br>" . $camp_link->error());
				}
					else
				{				
					header ("Location: CampaignMgmtChangeStatus.php?btn=campStp");
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
