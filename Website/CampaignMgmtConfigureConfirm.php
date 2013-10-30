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
				if(!$result = $dbc->query($query)){
					die('There was an error running the query <br>'.$query."<br>" . $dbc->error());
				}
					else
				{				
					header ("Location: CampaignMgmtChangeStatus.php?btn=campMgmt");
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
