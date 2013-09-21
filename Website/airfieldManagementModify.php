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
				
				# POST from airfield form
				$airfieldName = $_POST["airfieldName"];
				$airfieldCoalition = $_POST["airfieldCoalition"];
				$airfieldCoalitionNew = $_POST["airfieldCoalitionNew"];
				$airfieldModel = $_POST["airfieldModel"];
				$airfieldModelNew = $_POST["airfieldModelNew"];
				$airfieldNumber = $_POST["airfieldNumber"];
				$airfieldNumberNew = $_POST["airfieldNumberNew"];	
				
				$query = "UPDATE test_airfields SET model = '$airfieldModelNew', number = '$airfieldNumberNew', coalition = '$airfieldCoalitionNew'
						WHERE name = '$airfieldName'";
						
# get the camp_db connection information START

				$getInfo = "SELECT * from campaign_settings where camp_db = '$loadedCampaign'";  
	 
				if(!$result = $dbc->query($getInfo)) {
					die('There was an error receiveing the connnection information [' . $dbc->error . ']');
				}
	
				if ($result = mysqli_query($dbc, $getInfo)) {
					/* fetch associative array */
					while ($obj = mysqli_fetch_object($result)) {
						$campaign	=($obj->campaign);
						$camp_host	=($obj->camp_host);
						$camp_user	=($obj->camp_user);
						$camp_passwd=($obj->camp_passwd);
					}
				}
				
				# include connect2CampaignFunction.php (defines connect2campaign($host,$user,$password,$db))
				include ( 'functions/connect2Campaign.php' );
				
				# use this information to connect to campaign 
				$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
				
# get the camp_db connection information END
				
				if(!$result = $camp_link->query($query)){
					die('There was an error running the query ' . mysqli_error($camp_link));
				}
				else
				{				
					header ("Location:airfieldManagementSelect.php");
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
