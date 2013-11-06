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
				if (!empty($_POST["modelNameLoaded1"]))
					{
						$modelNameLoaded1 		= $_POST["modelNameLoaded1"];
						$modelNameQuantity1		= $_POST["modelNameQuantity1"];
						$modelNameQuantityNew1	= $_POST["modelNameQuantityNew1"];
					}
				if (!empty($_POST["modelNameLoaded2"]))
					{
						$modelNameLoaded2 		= $_POST["modelNameLoaded2"];
						$modelNameQuantity2		= $_POST["modelNameQuantity2"];
						$modelNameQuantityNew2	= $_POST["modelNameQuantityNew2"];
					}
				if (!empty($_POST["modelNameLoaded3"]))
					{
						$modelNameLoaded3 		= $_POST["modelNameLoaded3"];
						$modelNameQuantity3		= $_POST["modelNameQuantity3"];
						$modelNameQuantityNew3	= $_POST["modelNameQuantityNew3"];
					}
				if (!empty($_POST["modelNameLoaded4"]))
					{				
						$modelNameLoaded4 		= $_POST["modelNameLoaded4"];
						$modelNameQuantity4		= $_POST["modelNameQuantity4"];
						$modelNameQuantityNew4	= $_POST["modelNameQuantityNew4"];
					}
				if (!empty($_POST["modelNameLoaded5"]))
					{				
						$modelNameLoaded5 		= $_POST["modelNameLoaded5"];
						$modelNameQuantity5		= $_POST["modelNameQuantity5"];
						$modelNameQuantityNew5	= $_POST["modelNameQuantityNew5"];
					}
				if (!empty($_POST["modelNameLoaded6"]))
					{				
						$modelNameLoaded6 		= $_POST["modelNameLoaded6"];
						$modelNameQuantity6		= $_POST["modelNameQuantity6"];
						$modelNameQuantityNew6	= $_POST["modelNameQuantityNew6"];
					}										
					
				if (empty($_POST["modelNameAdd"]) ){
					$modelNameAdd = '';
				}
				else {
					$modelNameAdd = $_POST["modelNameAdd"];
				}
					
				if (empty($_POST["modelNameAddQuantity"]) ){
					$modelNameAddQuantity = '';
				}
				else {
					$modelNameAddQuantity = $_POST["modelNameAddQuantity"];
				}
				
				$airfieldCoalitionId		= $_POST["airfieldCoalitionId"];
				
				if (empty($_POST["airfieldCoalitionIdNew"]) ){
					$airfieldCoalitionIdNew = '';
				}
				else {
					$airfieldCoalitionIdNew	= $_POST["airfieldCoalitionIdNew"];
				}
					
						
				# prepare sql based on selected aircraft
				if ($_POST["updateAirfield"] == 1)
					{
					$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew1' WHERE model_Name = '$modelNameLoaded1' AND airfield_Name = '$airfieldName' ;";
					}
				if ($_POST["updateAirfield"] == 2)
					{
					$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew2' WHERE model_Name = '$modelNameLoaded2' AND airfield_Name = '$airfieldName' ;";
					}
				if ($_POST["updateAirfield"] == 3)
				{
					$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew3' WHERE model_Name = '$modelNameLoaded3' AND airfield_Name = '$airfieldName' ;";
				}
				if ($_POST["updateAirfield"] == 4)
					{
					$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew4' WHERE model_Name = '$modelNameLoaded4' AND airfield_Name = '$airfieldName' ;";
					}
				if ($_POST["updateAirfield"] == 5)
					{
					$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew4' WHERE model_Name = '$modelNameLoaded4' AND airfield_Name = '$airfieldName' ;";
					}
				if ($_POST["updateAirfield"] == 6)
					{
					$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew4' WHERE model_Name = '$modelNameLoaded4' AND airfield_Name = '$airfieldName' ;";
					}										
				if ($_POST["updateAirfield"] == 7)
					{
					$query1="INSERT INTO airfields_models (airfield_Name, airfield_Coalition, model_Name, model_Quantity) VALUES ('$airfieldName', $airfieldCoalitionId, '$modelNameAdd', $modelNameAddQuantity) ;";
					}
				if ($_POST["updateAirfield"] == 8)
					{
					$query1="DELETE from airfields_models WHERE model_Name = '$modelNameAdd' AND airfield_Name = '$airfieldName' ;";
					}
				if ($_POST["updateAirfield"] == 9)
					{
					$query1="UPDATE airfields_models SET airfield_Coalition = '$airfieldCoalitionIdNew' WHERE airfield_Name = '$airfieldName' ;";
					}
				if ($_POST["updateAirfield"] == 10)
					{
					header ("Location: airfieldMgmtStatusModify.php");
					}											
						
					# include connect2CampaignFunction.php
					include ( 'functions/connect2Campaign.php' );
					
					# include getCampaignVariables.php
					include ('includes/getCampaignVariables.php');
					
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					# sanity checks
					include ('includes/checkAirfieldDataBeforeUpdate.php');
		
					# updates
					if(!$result = $camp_link->query($query1)){
						die('There was an error running the query <br>'.$query1."<br>" . mysqli_error($camp_link));
					}
						else {
						#echo $query1;
						#exit;				
						header ("Location: airfieldMgmtChange.php?btn=campMgmt&airfieldName=$airfieldName");
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
