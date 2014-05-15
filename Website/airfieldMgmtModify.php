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
					# include connect2CampaignFunction.php
					include ( 'functions/connect2Campaign.php' );
					
					# include getMinCountry.php
					include ( 'functions/getMinCountry.php' );
					
					# include getCampaignVariables.php
					include ('includes/getCampaignVariables.php');

					# include getCoalitionname.php
					include ( 'functions/getObjectModel.php' );					
					
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
				
					# find out which form was used; form 0 is the reduced form of an icactive airfield
					$form = $_GET['form'];
					
					if ($form == 1) {
						$airfieldName = $_POST["airfieldName"];
	
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

							# use this information to get the objects Model
							$modelModelAdd = get_objectModel("$modelNameAdd");
												
						}
							
						if (empty($_POST["modelNameAddQuantity"]) ){
							$modelNameAddQuantity = '0';
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
						if ($_POST["updateAirfield"] == 1) //model 1 - update count or remove if value 0 was submitted
							{
								if ($modelNameQuantityNew1 == 0) {

									$query1="DELETE from airfields_models WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";
								} else {
									$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew1' WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";
								}
							}
						if ($_POST["updateAirfield"] == 2) //model 2 - update count or remove if value 0 was submitted
							{
								if ($modelNameQuantityNew2 == 0) {

									$query1="DELETE from airfields_models WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
								} else {
									$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew2' WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
								}
							}
						if ($_POST["updateAirfield"] == 3) //model 3 - update count or remove if value 0 was submitted
						{
							if ($modelNameQuantityNew3 == 0) {

									$query1="DELETE from airfields_models WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
								} else {
									$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew3' WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
								}
						}
						if ($_POST["updateAirfield"] == 4) //model 4 - update count or remove if value 0 was submitted
							{
								if ($modelNameQuantityNew4 == 0) {

									$query1="DELETE from airfields_models WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
								} else {
									$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew4' WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
								}
							}
						if ($_POST["updateAirfield"] == 5) //model 5 - update count or remove if value 0 was submitted
							{
								if ($modelNameQuantityNew5 == 0) {

									$query1="DELETE from airfields_models WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
								} else {
									$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew5' WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
								}
							}
						if ($_POST["updateAirfield"] == 6) //model 6 - update count or remove if value 0 was submitted
							{
								if ($modelNameQuantityNew6 == 0) {

									$query1="DELETE from airfields_models WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
								} else {
									$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew6' WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
								}
							}										
						if ($_POST["updateAirfield"] == 7) // model add
							{
							$query1="INSERT INTO airfields_models (airfield_Name, model_Name, model_Model, model_Quantity) VALUES ('$airfieldName', '$modelNameAdd', '$modelModelAdd', $modelNameAddQuantity) ;";
							}
						if ($_POST["updateAirfield"] == 8) // model remove
							{
							$query1="DELETE from airfields_models WHERE model_Name like '$modelNameAdd' AND airfield_Name like '$airfieldName' ;";
							}
						if ($_POST["updateAirfield"] == 9) //coalition mgmt old 
							{
							$query1="UPDATE airfields SET airfield_Coalition = '$airfieldCoalitionIdNew' WHERE airfield_Name like '$airfieldName' ;";
							}
						if ($_POST["updateAirfield"] == 10) //coalition mgmt new 
						{
							# check if there is already an entry in the airfields_models table
							$query2 = "SELECT airfield_Name FROM airfields_Models WHERE airfield_Name like '$airfieldName' ;";
							
							if(!$result2 = $camp_link->query($query2)){
								die('There was an error running the query ' . $camp_link->error);
							}
							if ($result2->num_rows > 0) {
								$exists = 1;
							} else {
								$exists = 0;
							}
							
							# initialize $query
							$query1 = '';

							# debug variables
#							echo $airfieldName ."<br>";
#							echo "Entry in airfields_models table exists: ".$exists."<br><br>";
							
							# get POST variables
							foreach ($_POST as $param_name => $param_val) {

								if ($param_name	== 'airfieldName' or 
									$param_name		== 'updateAirfield' or
									$param_name		== 'airfieldCoalitionId')
								{
										
#									echo "\$param_name is ".$param_name."<br>";
#									echo "\$param_val ".$param_val." length is ".strlen($param_val)."<br>";
									$param_name = 'ignore';
									$param_val	= 'ignore';
								}

#								echo "\$param_name: ".$param_name."<br>\n";
#								echo "\$param_val: ".$param_val."<br><br>\n";
								
								if (strpos($param_name, 'modelName') === true)  {
#									echo "\$param_name contains ".$param_name."<br>";
									$param_name = 'ignore';
									}
		
								# determine if airfield was activated by checkbox
								if ($param_name != 'ignore' && $param_val != 'ignore'  && is_numeric($param_val) && $param_val == 1) {
									
									# activate airfield base on airfield id
									$query1 .= "UPDATE airfields SET airfield_enabled = $param_val WHERE id = $param_name ;";
									# create an entry into the airfields_models table if there is none
									if ($exists != 1) {
										$query1 .= "INSERT INTO airfields_models (airfield_Name) VALUES ('$airfieldName') ;";
									}
								}
						
								# determine if airfield was deactivated by checkbox
								elseif ($param_name != 'ignore' && $param_val != 'ignore'  && is_numeric($param_val) && $param_val == 0) {
											
									# deactivate airfield base on airfield id
									$query1 .= "UPDATE airfields SET airfield_enabled = $param_val WHERE id = $param_name ;";
									# remove all entries from the airfields_models table
									$query1 .= "DELETE from airfields_models WHERE airfield_Name like '$airfieldName' ;";
								}
								
								# change airfield coalition
								elseif ($param_name != 'ignore' && $param_val != 'ignore' && $param_val == ('neutral' or 'allied' or 'axis')) {
									
									if ($param_val 		== 'neutral') {
											$param_val	= 0;
										}
									elseif ($param_val	== 'allied') {
											$param_val	= 1;
										}
									elseif ($param_val	== 'axis') {
											$param_val	= 2;
										}
									# get min(ckey) based on coalition
									$CntryKey = get_mincountry("$param_val");
											
									# update new coalition in base table
									$query1 .= "UPDATE airfields SET airfield_Country = '$CntryKey', airfield_Coalition = '$param_val' WHERE airfield_Name like '$param_name' ;";
								}
							}
						}	
					}
					
					# this is from the form visible only when a field is inactive											
					if ($form == 0) {
						# get airfield name out of Session as we used the POST for the 
						$airfieldName = $_POST["airfieldName"];

						if ($_POST["updateAirfield"] == 10) //coalition mgmt new 
						{
							# check if there is already an entry in the airfields_models table
							$query2 = "SELECT airfield_Name FROM airfields_Models WHERE airfield_Name = '$airfieldName' ;";
							
							if(!$result2 = $camp_link->query($query2)){
								die('There was an error running the query ' . $camp_link->error);
							}
							if ($result2->num_rows > 0) {
								$exists = 1;
							} else {
								$exists = 0;
							}
							
							# initialize $query
							$query1 = '';

							# debug variables
							echo $airfieldName ."<br>";
							echo "Entry in airfields_models table exists: ".$exists."<br><br>";
							
							# get POST variables
							foreach ($_POST as $param_name => $param_val) {
															
								if ($param_name == 'airfieldName' or 
									$param_name == 'updateAirfield' 
									) {
										
									echo "\$param_name is ".$param_name."<br>";
									echo "\$param_val ".$param_val." length is ".strlen($param_val)."<br>";
									$param_name = 'ignore';
									$param_val	= 'ignore';
								}

								echo "\$param_name: ".$param_name."<br>\n";
								echo "\$param_val: ".$param_val."<br><br>\n";
		
								# determine if airfield was activated by checkbox
								if ($param_name != 'ignore' && $param_val != 'ignore' && is_numeric($param_val) && $param_val == 1) {
									
									# activate airfield base on airfield id
									$query1 .= "UPDATE airfields SET airfield_enabled = $param_val WHERE id = $param_name ;";
									# create an entry into the airfields_models table if there is none
									if ($exists != 1) {
										$query1 .= "INSERT INTO airfields_models (airfield_Name) VALUES ('$airfieldName') ;";
									}
								}
						
								# determine if airfield was deactivated by checkbox
								elseif ($param_name != 'ignore' && $param_val != 'ignore' && is_numeric($param_val) && $param_val == 0) {
											
									# deactivate airfield base on airfield id
									$query1 .= "UPDATE airfields SET airfield_enabled = $param_val WHERE id = $param_name ;";
									# remove all entries from the airfields_models table
									$query1 .= "DELETE from airfields_models WHERE airfield_name like '$airfieldName' ;";
								}
								
								# change airfield coalition
								elseif ($param_name != 'ignore' && $param_val != 'ignore' && $param_val == ('neutral' or 'allied' or 'axis')) {
									
									if ($param_val 		== 'neutral') {
											$param_val	= 0;
										}
									elseif ($param_val	== 'allied') {
											$param_val	= 1;
										}
									elseif ($param_val	== 'axis') {
											$param_val	= 2;
										}
									
									# get min(ckey) based on coalition
									$CntryKey = get_mincountry("$param_val");
											
									# update new coalition in base table
									$query1 .= "UPDATE airfields SET airfield_Country = '$CntryKey', airfield_Coalition = '$param_val' WHERE airfield_Name like '$param_name' ;";
								}
							}
						}	
					}
					
					# check some data before update tables
					include ('includes/checkAirfieldDataBeforeUpdate.php');
					
					// execute multi query //
					if ($camp_link->multi_query($query1)) {
						do {
							// store first result set //
							if ($result = $camp_link->store_result()) {
								// do nothing as we don't expect feedback
								$result->free();
							}
						// need to include more_results to avoid strict checking warning
						} while ($camp_link->more_results() && $camp_link->next_result());
					}
					if ($camp_link->errno) { 
						echo "airfieldMgmgrStatusModify.php multi_query execution ended prematurely.<br>\n";
						echo $query1."<br>";
						var_dump($camp_link->error); 
					}

					else {
					
#					echo $query1;
#					exit;
					unset($_POST);
					
					header ("Location: airfieldMgmtChange.php?btn=preMsn&sde=campAf&airfieldName=$airfieldName");
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
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
