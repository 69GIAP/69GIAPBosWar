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
					$airfieldName 				= $_POST["airfieldName"];
				if (!empty($_POST["airfieldModelLoaded1"]))
					{
						$airfieldModelLoaded1 		= $_POST["airfieldModelLoaded1"];
						$airfieldModelQuantity1		= $_POST["airfieldModelQuantity1"];
						$airfieldModelQuantityNew1	= $_POST["airfieldModelQuantityNew1"];
					}
				if (!empty($_POST["airfieldModelLoaded2"]))
					{
						$airfieldModelLoaded2 		= $_POST["airfieldModelLoaded2"];
						$airfieldModelQuantity2		= $_POST["airfieldModelQuantity2"];
						$airfieldModelQuantityNew2	= $_POST["airfieldModelQuantityNew2"];
					}
				if (!empty($_POST["airfieldModelLoaded3"]))
					{
						$airfieldModelLoaded3 		= $_POST["airfieldModelLoaded3"];
						$airfieldModelQuantity3		= $_POST["airfieldModelQuantity3"];
						$airfieldModelQuantityNew3	= $_POST["airfieldModelQuantityNew3"];
					}
				if (!empty($_POST["airfieldModelLoaded4"]))
					{				
						$airfieldModelLoaded4 		= $_POST["airfieldModelLoaded4"];
						$airfieldModelQuantity4		= $_POST["airfieldModelQuantity4"];
						$airfieldModelQuantityNew4	= $_POST["airfieldModelQuantityNew4"];
					}
					
				$airfieldModelAdd			= $_POST["airfieldModelAdd"];
				$airfieldModelAddQuantity	= $_POST["airfieldModelAddQuantity"];
				
				$airfieldCoalitionId		= $_POST["airfieldCoalitionId"];
				$airfieldCoalitionIdNew		= $_POST["airfieldCoalitionIdNew"];	
/*				
echo "airfieldModelLoaded1: $airfieldModelLoaded1<br>\n";
echo "airfieldModelQuantityNew1: $airfieldModelQuantityNew1<br>\n";
echo "airfieldName: $airfieldName<br>\n";

echo "airfieldModelLoaded2: $airfieldModelLoaded2<br>\n";
echo "airfieldModelQuantityNew2: $airfieldModelQuantityNew2<br>\n";
echo "airfieldName: $airfieldName<br>\n";
*/				
						
				# prepare sql based on selected aircraft
				if ($_POST["updateAirfield"] == 1)
					{
					$query="UPDATE test_airfields SET number = '$airfieldModelQuantityNew1' WHERE model = '$airfieldModelLoaded1' AND name = '$airfieldName'";
					}
				if ($_POST["updateAirfield"] == 2)
					{
					$query="UPDATE test_airfields SET number = '$airfieldModelQuantityNew2' WHERE model = '$airfieldModelLoaded2' AND name = '$airfieldName'";
					}
				if ($_POST["updateAirfield"] == 3)
				{
					$query="UPDATE test_airfields SET number = '$airfieldModelQuantityNew3' WHERE model = '$airfieldModelLoaded3' AND name = '$airfieldName'";
				}
				if ($_POST["updateAirfield"] == 4)
					{
					$query="UPDATE test_airfields SET number = '$airfieldModelQuantityNew4' WHERE model = '$airfieldModelLoaded4' AND name = '$airfieldName'";
					}	
				if ($_POST["updateAirfield"] == 5)
					{
					$query="INSERT INTO test_airfields (name, coalId, model, number) VALUES ('$airfieldName', $airfieldCoalitionId, '$airfieldModelAdd', $airfieldModelAddQuantity)";
					}
				if ($_POST["updateAirfield"] == 6)
					{
					$query="DELETE from test_airfields WHERE model = '$airfieldModelAdd' AND name = '$airfieldName'";
					}
				if ($_POST["updateAirfield"] == 7)
					{
					$query="UPDATE test_airfields SET coalId = '$airfieldCoalitionIdNew' WHERE name = '$airfieldName'";
					}						
							
# get the camp_db connection information START
				$getInfo = "SELECT * from campaign_settings where camp_db = '$loadedCampaign'";  
	 
				if(!$result = $dbc->query($getInfo)) {
					die('There was an error receiving the connnection information [' . $dbc->error . ']');
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

				# sanity checks
				include ('includes/checkAirfieldDataBeforeUpdate.php');
						
				# updates
				if(!$result = $camp_link->query($query)){
					die('There was an error running the query <br>'.$query."<br>" . mysqli_error($camp_link));
				}
					else
				{				
					header ("Location: airfieldManagementChange.php");
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
