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
						
						# initialze POST variables, if any of the flights was changed these parameters hold the changes
						if (!empty($_POST["modelNameLoaded1"]))
							{
								$modelNameLoaded1 				= $_POST["modelNameLoaded1"];
								$modelNameQuantity1				= $_POST["modelNameQuantity1"];
								$modelNameQuantityNew1			= $_POST["modelNameQuantityNew1"];
								$modelNameAltitude1				= $_POST["modelNameAltitude1"];
								$modelNameAltitudeNew1			= $_POST["modelNameAltitudeNew1"];
								$modelNameSpawnPosition1		= $_POST["modelNameSpawnPosition1"];
								$modelNameSpawnPositionNew1	= $_POST["modelNameSpawnPositionNew1"];
								$modelNameFlight1					= $_POST["modelNameFlight1"];
								$modelNameFlightNew1				= $_POST["modelNameFlightNew1"];
							}
						if (!empty($_POST["modelNameLoaded2"]))
							{
								$modelNameLoaded2 				= $_POST["modelNameLoaded2"];
								$modelNameQuantity2				= $_POST["modelNameQuantity2"];
								$modelNameQuantityNew2			= $_POST["modelNameQuantityNew2"];
								$modelNameAltitude2				= $_POST["modelNameAltitude2"];
								$modelNameAltitudeNew2			= $_POST["modelNameAltitudeNew2"];
								$modelNameSpawnPosition2		= $_POST["modelNameSpawnPosition2"];
								$modelNameSpawnPositionNew2	= $_POST["modelNameSpawnPositionNew2"];
								$modelNameFlight2					= $_POST["modelNameFlight2"];
								$modelNameFlightNew2				= $_POST["modelNameFlightNew2"];								
							}
						if (!empty($_POST["modelNameLoaded3"]))
							{
								$modelNameLoaded3 				= $_POST["modelNameLoaded3"];
								$modelNameQuantity3				= $_POST["modelNameQuantity3"];
								$modelNameQuantityNew3			= $_POST["modelNameQuantityNew3"];
								$modelNameAltitude3				= $_POST["modelNameAltitude3"];
								$modelNameAltitudeNew3			= $_POST["modelNameAltitudeNew3"];
								$modelNameSpawnPosition3		= $_POST["modelNameSpawnPosition3"];
								$modelNameSpawnPositionNew3	= $_POST["modelNameSpawnPositionNew3"];
								$modelNameFlight3					= $_POST["modelNameFlight3"];
								$modelNameFlightNew3				= $_POST["modelNameFlightNew3"];								
							}
						if (!empty($_POST["modelNameLoaded4"]))
							{				
								$modelNameLoaded4 				= $_POST["modelNameLoaded4"];
								$modelNameQuantity4				= $_POST["modelNameQuantity4"];
								$modelNameQuantityNew4			= $_POST["modelNameQuantityNew4"];
								$modelNameAltitude4				= $_POST["modelNameAltitude4"];
								$modelNameAltitudeNew4			= $_POST["modelNameAltitudeNew4"];
								$modelNameSpawnPosition4		= $_POST["modelNameSpawnPosition4"];
								$modelNameSpawnPositionNew4	= $_POST["modelNameSpawnPositionNew4"];								
								$modelNameFlight4					= $_POST["modelNameFlight4"];
								$modelNameFlightNew4				= $_POST["modelNameFlightNew4"];
							}
						if (!empty($_POST["modelNameLoaded5"]))
							{				
								$modelNameLoaded5 				= $_POST["modelNameLoaded5"];
								$modelNameQuantity5				= $_POST["modelNameQuantity5"];
								$modelNameQuantityNew5			= $_POST["modelNameQuantityNew5"];
								$modelNameAltitude5				= $_POST["modelNameAltitude5"];
								$modelNameAltitudeNew5			= $_POST["modelNameAltitudeNew5"];
								$modelNameSpawnPosition5		= $_POST["modelNameSpawnPosition5"];
								$modelNameSpawnPositionNew5	= $_POST["modelNameSpawnPositionNew5"];
								$modelNameFlight5					= $_POST["modelNameFlight5"];
								$modelNameFlightNew5				= $_POST["modelNameFlightNew5"];								
							}
						if (!empty($_POST["modelNameLoaded6"]))
							{				
								$modelNameLoaded6 				= $_POST["modelNameLoaded6"];
								$modelNameQuantity6				= $_POST["modelNameQuantity6"];
								$modelNameQuantityNew6			= $_POST["modelNameQuantityNew6"];
								$modelNameAltitude6				= $_POST["modelNameAltitude6"];
								$modelNameAltitudeNew6			= $_POST["modelNameAltitudeNew6"];
								$modelNameSpawnPosition6		= $_POST["modelNameSpawnPosition6"];
								$modelNameSpawnPositionNew6	= $_POST["modelNameSpawnPositionNew6"];								
								$modelNameFlight6					= $_POST["modelNameFlight6"];
								$modelNameFlightNew6				= $_POST["modelNameFlightNew6"];								
							}										
						
						# check for non entered values	
						if (empty($_POST["modelNameAdd"]) ){
							$modelNameAdd = '';
						}
						else {
							$modelNameAdd = $_POST["modelNameAdd"];
							# use this information to get the objects Model
							$modelModelAdd = get_objectModel("$modelNameAdd");
						}
						
						# check for changed Quantity and prepare variable if no change supplied
						if (empty($_POST["modelNameAddQuantity"]) ){
							$modelNameAddQuantity = '0';
						}
						else {
							$modelNameAddQuantity = $_POST["modelNameAddQuantity"];
						}
						
						# check for changed Flight name
						if (empty($_POST["modelNameAddFlight"]) ){
							$modelNameAddFlight = '';
						}
						else {
							$modelNameAddFlight = $_POST["modelNameAddFlight"];
						}

						# check if altitude value was provided and reset pending variables according to sim
						if ($sim == 'RoF') {
							if (empty($_POST["modelNameAddAltitude"]) ){ # if there is no altitude spawning point is reset to ground
								$modelNameAddAltitude = '0';
								
								if (empty($_POST["modelNameAddSpawnPosition"])) {
									$_POST["modelNameAddSpawnPosition"] = 0;
								}
								else {
									$modelNameAddSpawnPosition = $_POST["modelNameAddSpawnPosition"];
								}
							}
							else {
								$modelNameAddAltitude = $_POST["modelNameAddAltitude"];
								$_POST["modelNameAddSpawnPosition"] = 1;
							}
						}
						if ($sim == 'BoS') {
							if (empty($_POST["modelNameAddAltitude"]) ){ # if there is no altitude spawning point is reset to ground
								$modelNameAddAltitude = '0';
								$_POST["modelNameAddSpawnPosition"] = 2;							
							}
							else {
								$modelNameAddAltitude = $_POST["modelNameAddAltitude"];
								$_POST["modelNameAddSpawnPosition"] = 0;
							}
						}

						$airfieldCoalitionId		= $_POST["airfieldCoalitionId"];
						
						if (empty($_POST["airfieldCoalitionIdNew"]) ){
							$airfieldCoalitionIdNew = '';
						}
						else {
							$airfieldCoalitionIdNew	= $_POST["airfieldCoalitionIdNew"];
						}
						
						$modelNameAddSpawnPosition = $_POST["modelNameAddSpawnPosition"];
							
						# prepare sql based on aelected aircraft, 6 aircrafts are the limit by now, the value is not yet configurable
						if ($_POST["updateAirfield"] == 1) //model 1 - update count or remove if value 0 was submitted
							{
								if ($modelNameQuantityNew1 == 0) {
									# remove this type from the airfield as the quantity is 0
									$query1="DELETE from airfields_models WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";
								} else {
									# update the table record with new quantity
									$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew1' WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";

									if ($modelNameAltitudeNew1 != $modelNameAltitude1) {
										if ($sim == 'RoF') {
												if ($modelNameAltitudeNew1 > 0){ # air start Rise Of Flight
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew1', model_SpawnPosition = 1 WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew1', model_SpawnPosition = 0 WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";
												}
											}
											if ($sim == 'BoS') {
												if ($modelNameAltitudeNew1 == 1 or $modelNameAltitudeNew1 == 2){ # ground start Battle of Stalingrad
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew1'', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew1', model_Altitude = 2 WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";
												}
											}
										}
									if ($modelNameSpawnPositionNew1 != $modelNameSpawnPosition1) {
											if ($sim == 'RoF') {
												if ($modelNameSpawnPositionNew1 == 0){ # ground start Rise Of Flight
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew1', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew1', model_Altitude = 1000 WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";
												}
											}
											if ($sim == 'BoS') {
												if ($modelNameSpawnPositionNew1 == 1 or $modelNameSpawnPositionNew1 == 2){ # ground start Battle of Stalingrad
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew1', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew1', model_Altitude = 1000 WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";
												}
											}
										}
									if ($modelNameFlightNew1 != $modelNameFlight1) { # check for changed flight callsign
										$query1 .= "UPDATE airfields_models SET model_Flight = '$modelNameFlightNew1' WHERE model_Name like '$modelNameLoaded1' AND airfield_Name like '$airfieldName' ;";
									}									
								}
							}
						if ($_POST["updateAirfield"] == 2) //model 2 - update count or remove if value 0 was submitted
							{
								if ($modelNameQuantityNew2 == 0) {
									# remove this type from the airfield as the quantity is 0
									$query1="DELETE from airfields_models WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
								} else {
									# update the table record with new quantity
									$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew2' WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
										
									if ($modelNameAltitudeNew2 != $modelNameAltitude2) {
										if ($sim == 'RoF') {
												if ($modelNameAltitudeNew2 > 0){ # air start Rise Of Flight
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew2', model_SpawnPosition = 1 WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew2', model_SpawnPosition = 0 WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
												}
											}
											if ($sim == 'BoS') {
												if ($modelNameAltitudeNew2 == 1 or $modelNameAltitudeNew2 == 2){ # ground start Battle of Stalingrad
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew2'', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew2', model_Altitude = 2 WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
												}
											}
										}
									if ($modelNameSpawnPositionNew2 != $modelNameSpawnPosition2) {
											if ($sim == 'RoF') {
												if ($modelNameSpawnPositionNew2 == 0){ # ground start Rise Of Flight
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew2', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew2', model_Altitude = 1000 WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
												}
											}
											if ($sim == 'BoS') {
												if ($modelNameSpawnPositionNew2 == 1 or $modelNameSpawnPositionNew2 == 2){ # ground start Battle of Stalingrad
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew2', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew2', model_Altitude = 1000 WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
												}
											}
										}
									if ($modelNameFlightNew2 != $modelNameFlight2) { # check for changed flight callsign
										$query1 .= "UPDATE airfields_models SET model_Flight = '$modelNameFlightNew2' WHERE model_Name like '$modelNameLoaded2' AND airfield_Name like '$airfieldName' ;";
									}									
								}
							}
						if ($_POST["updateAirfield"] == 3) //model 3 - update count or remove if value 0 was submitted
						{
							if ($modelNameQuantityNew3 == 0) {
								# remove this type from the airfield as the quantity is 0
								$query1="DELETE from airfields_models WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
							} else {
								# update the table record with new quantity
								$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew3' WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
								
								if ($modelNameAltitudeNew3 != $modelNameAltitude3) {
									if ($sim == 'RoF') {
											if ($modelNameAltitudeNew3 > 0){ # air start Rise Of Flight
												$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew3', model_SpawnPosition = 1 WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
											} else {
												$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew3', model_SpawnPosition = 0 WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
											}
										}
										if ($sim == 'BoS') {
											if ($modelNameAltitudeNew3 == 1 or $modelNameAltitudeNew3 == 2){ # ground start Battle of Stalingrad
												$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew3'', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
											} else {
												$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew3', model_Altitude = 2 WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
											}
										}
									}
								if ($modelNameSpawnPositionNew3 != $modelNameSpawnPosition3) {
										if ($sim == 'RoF') {
											if ($modelNameSpawnPositionNew3 == 0){ # ground start Rise Of Flight
												$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew3', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
											} else {
												$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew3', model_Altitude = 1000 WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
											}
										}
										if ($sim == 'BoS') {
											if ($modelNameSpawnPositionNew3 == 1 or $modelNameSpawnPositionNew3 == 2){ # ground start Battle of Stalingrad
												$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew3', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
											} else {
												$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew3', model_Altitude = 1000 WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
												}
											}
										}
									if ($modelNameFlightNew3 != $modelNameFlight3) { # check for changed flight callsign
										$query1 .= "UPDATE airfields_models SET model_Flight = '$modelNameFlightNew3' WHERE model_Name like '$modelNameLoaded3' AND airfield_Name like '$airfieldName' ;";
									}									
								}
							}
						if ($_POST["updateAirfield"] == 4) //model 4 - update count or remove if value 0 was submitted
							{
								if ($modelNameQuantityNew4 == 0) {
									# remove this type from the airfield as the quantity is 0
									$query1="DELETE from airfields_models WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
								} else {
									# update the table record with new quantity
									$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew4' WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
									
									if ($modelNameAltitudeNew4 != $modelNameAltitude4) {
										if ($sim == 'RoF') {
												if ($modelNameAltitudeNew4 > 0){ # air start Rise Of Flight
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew4', model_SpawnPosition = 1 WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew4', model_SpawnPosition = 0 WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
												}
											}
											if ($sim == 'BoS') {
												if ($modelNameAltitudeNew4 == 1 or $modelNameAltitudeNew4 == 2){ # ground start Battle of Stalingrad
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew4'', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew4', model_Altitude = 2 WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
												}
											}
										}
										
									if ($modelNameSpawnPositionNew4 != $modelNameSpawnPosition4) {
											if ($sim == 'RoF') {
												if ($modelNameSpawnPositionNew4 == 0){ # ground start Rise Of Flight
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew4', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew4', model_Altitude = 1000 WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
												}
											}
											if ($sim == 'BoS') {
												if ($modelNameSpawnPositionNew4 == 1 or $modelNameSpawnPositionNew4 == 2){ # ground start Battle of Stalingrad
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew4', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew4', model_Altitude = 1000 WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
												}
											}
										}
									if ($modelNameFlightNew4 != $modelNameFlight4) { # check for changed flight callsign
										$query1 .= "UPDATE airfields_models SET model_Flight = '$modelNameFlightNew4' WHERE model_Name like '$modelNameLoaded4' AND airfield_Name like '$airfieldName' ;";
									}									
								}
							}
							if ($_POST["updateAirfield"] == 5) //model 5 - update count or remove if value 0 was submitted
							{
								if ($modelNameQuantityNew5 == 0) {
									# remove this type from the airfield as the quantity is 0
									$query1="DELETE from airfields_models WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
								} else {
									# update the table record with new quantity
									$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew5' WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
									
									if ($modelNameAltitudeNew5 != $modelNameAltitude5) {
										if ($sim == 'RoF') {
												if ($modelNameAltitudeNew5 > 0){ # air start Rise Of Flight
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew5', model_SpawnPosition = 1 WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew5', model_SpawnPosition = 0 WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
												}
											}
											if ($sim == 'BoS') {
												if ($modelNameAltitudeNew5 == 1 or $modelNameAltitudeNew5 == 2){ # ground start Battle of Stalingrad
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew5'', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew5', model_Altitude = 2 WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
												}
											}
										}
										
									if ($modelNameSpawnPositionNew5 != $modelNameSpawnPosition5) {
											if ($sim == 'RoF') {
												if ($modelNameSpawnPositionNew5 == 0){ # ground start Rise Of Flight
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew5', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew5', model_Altitude = 1000 WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
												}
											}
											if ($sim == 'BoS') {
												if ($modelNameSpawnPositionNew5 == 1 or $modelNameSpawnPositionNew5 == 2){ # ground start Battle of Stalingrad
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew5', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew5', model_Altitude = 1000 WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
												}
											}
										}
									if ($modelNameFlightNew5 != $modelNameFlight5) { # check for changed flight callsign
										$query1 .= "UPDATE airfields_models SET model_Flight = '$modelNameFlightNew5' WHERE model_Name like '$modelNameLoaded5' AND airfield_Name like '$airfieldName' ;";
									}									
								}
							}
						if ($_POST["updateAirfield"] == 6) //model 6 - update count or remove if value 0 was submitted
							{
								if ($modelNameQuantityNew6 == 0) {
									# remove this type from the airfield as the quantity is 0
									$query1="DELETE from airfields_models WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
								} else {
									# update the table record with new quantity
									$query1="UPDATE airfields_models SET model_Quantity = '$modelNameQuantityNew6' WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
									
									if ($modelNameAltitudeNew6 != $modelNameAltitude6) {
										if ($sim == 'RoF') {
												if ($modelNameAltitudeNew6 > 0){ # air start Rise Of Flight
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew6', model_SpawnPosition = 1 WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew6', model_SpawnPosition = 0 WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
												}
											}
											if ($sim == 'BoS') {
												if ($modelNameAltitudeNew6 == 1 or $modelNameAltitudeNew6 == 2){ # ground start Battle of Stalingrad
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew6'', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_Altitude = '$modelNameAltitudeNew6', model_Altitude = 2 WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
												}
											}
										}
										
									if ($modelNameSpawnPositionNew6 != $modelNameSpawnPosition6) {
											if ($sim == 'RoF') {
												if ($modelNameSpawnPositionNew6 == 0){ # ground start Rise Of Flight
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew6', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew6', model_Altitude = 1000 WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
												}
											}
											if ($sim == 'BoS') {
												if ($modelNameSpawnPositionNew6 == 1 or $modelNameSpawnPositionNew6 == 2){ # ground start Battle of Stalingrad
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew6', model_Altitude = 0 WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
												} else {
													$query1 .= "UPDATE airfields_models SET model_SpawnPosition = '$modelNameSpawnPositionNew6', model_Altitude = 1000 WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
												}
											}
										}
									if ($modelNameFlightNew6 != $modelNameFlight6) { # check for changed flight callsign
										$query1 .= "UPDATE airfields_models SET model_Flight = '$modelNameFlightNew6' WHERE model_Name like '$modelNameLoaded6' AND airfield_Name like '$airfieldName' ;";
									}									
								}
							}
							
						if ($_POST["updateAirfield"] == 7) // add a new model
							{
								if ( ( 
										($sim == 'RoF' and $modelNameAddSpawnPosition == 1 ) or
										($sim == 'BoS' and $modelNameAddSpawnPosition == 0 )
										) and $modelNameAddAltitude == 0 
									) {
										$modelNameAddAltitude = 1000; # predefined spawning altitude if no value was provided
										}
								$query1="INSERT INTO airfields_models (airfield_Name, model_Name, model_Model, model_Quantity, model_Altitude, model_Flight, model_SpawnPosition) 
									VALUES ('$airfieldName', '$modelNameAdd', '$modelModelAdd', $modelNameAddQuantity, '$modelNameAddAltitude', '$modelNameAddFlight', '$modelNameAddSpawnPosition') ;";
							}
		
						/* Code obsolete due to drop down filter, active models do no longer appear so this button was remove			
						if ($_POST["updateAirfield"] == 8) // model remove
							{
							$query1="DELETE from airfields_models WHERE model_Name like '$modelNameAdd' AND airfield_Name like '$airfieldName' ;";
							}*/

						if ($_POST["updateAirfield"] == 9) //coalition mgmt old 
							{
							$query1="UPDATE airfields SET airfield_Coalition = '$airfieldCoalitionIdNew' WHERE airfield_Name like '$airfieldName' ;";
							}
							
						if ($_POST["updateAirfield"] == 10) //coalition mgmt new 
						{
							# check if there is already an entry in the airfields_models table
							$query2 = "SELECT airfield_Name FROM airfields_Models WHERE airfield_Name like '$airfieldName' ;";
echo 	$query2."<br><br>";						
							if(!$result2 = $camp_link->query($query2)){
								die('There was an error running the query ' . $camp_link->error);
							}
							if ($result2->num_rows > 0) {
								$exists = 1;
							} else {
								$exists = 0;
							}
echo 	"Airfield record exists<br><br>";	
							
							# initialize $query
							$query1 = '';

							# get POST variables
							foreach ($_POST as $param_name => $param_val) {
#echo "<br>before filter:<br>";
#echo "Parameter name is  ".$param_name."<br>";
#echo "Parameter value is  ".$param_val."<br><br>";

								# resets certain POST variables to be ignored
								if ($param_name	== 'airfieldName' or 
									$param_name		== 'updateAirfield' or
									$param_name		== 'airfieldCoalitionId')
								{
									$param_name = 'ignore';
									$param_val	= 'ignore';
								}
								
								# checks if string contains modelName and resets the param_name to 'ignore'
								if (strpos($param_name, 'modelName') !== false)  {
									$param_name = 'ignore';
									}
									
#echo "after filter:<br>";
#echo "Parameter name is  ".$param_name."<br>";
#echo "Parameter value is  ".$param_val."<br><br>";
		
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
# feedback before check:
echo "-------------------------------------------------------------- <br>\n";
echo "Query before checkAirfieldDataBeforeUpdate.php <br>\n";
echo "-------------------------------------------------------------- <br>\n";
echo $query1."<br>\n<br>\n";
				
					# check some data before update tables
					include ('includes/checkAirfieldDataBeforeUpdate.php');

# feedback before action
#return;

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
