        <div id="side">

			<?php
				# include getCampaignVariables.php
				include ( 'includes/getCampaignVariables.php' );
				
				# check if there is a user logged on
				if (!empty($_SESSION["userName"]))
					{		
						# get user role
						$userRoleId = $_SESSION['userRoleId'];
						$userRole 	= $_SESSION["userRole"];
						
						# check if a navigation button was pressed
						if (!empty($_SESSION['btn']))
							{
								# load the information into the varibale
								$btn = $_SESSION['btn'];
								
# was the pressed button Home?
									if ($btn == "home")
										{	
											if ($userRole == "administrator")
												{
													echo "	<ul id=\"sidebar\">\n";
													
													if (empty($loadedCampaign))
														{
															if ($sde == 'connect') {
																echo "		<li><a href=\"CampaignSelect.php?btn=home&sde=connect\" class=\"campConnectAct\"><span></span></a></li>\n";
																}
															else {
																echo "		<li><a href=\"CampaignSelect.php?btn=home&sde=connect\" class=\"campConnect\"><span></span></a></li>\n";
															}
															if ($sde == 'drop') {
																echo "		<li><a href=\"CampaignDrop.php?btn=home&sde=drop\"	class=\"campDropAct\"><span></span></a></li>\n";
																}
															else {
																echo "		<li><a href=\"CampaignDrop.php?btn=home&sde=drop\"	class=\"campDrop\"><span></span></a></li>\n";
															}
														}
													else
														{
															if ($sde == 'ststcs') {
															echo "		<li><a href=\"IndexBosWarRofWar.php?btn=home&sde=ststcs\" class=\"statisticsAct\"><span></span></a></li>\n";
															}
															else {
																echo "		<li><a href=\"IndexBosWarRofWar.php?btn=home&sde=ststcs\" class=\"statistics\"><span></span></a></li>\n";
															}
															echo "		<li><a href=\"CampaignMgmtChangeStatus.php?btn=campStp\"	class=\"campStatus\"><span></span></a></li>\n";																														
														}
													echo "  </ul>\n";
												}
											if ($userRole == "commander")
												{
													echo "	<ul id=\"sidebar\">\n";
													echo "		<li><a href=\"CampaignSelect.php?btn=home\" class=\"campConnect\"><span></span></a></li>\n";														
													echo "  </ul>\n";
												}
											if ($userRole == "viewer")
												{
													echo "	<ul id=\"sidebar\">\n";
													if ($sde == 'ststcs') {
														echo "		<li><a href=\"IndexBosWarRofWar.php?btn=home&sde=ststcs\" class=\"statisticsAct\"><span></span></a></li>\n";
														}
													else {
														echo "		<li><a href=\"IndexBosWarRofWar.php?btn=home&sde=ststcs\" class=\"statistics\"><span></span></a></li>\n";
													}
												echo "  </ul>\n";
												}
										}
										
# was the pressed button User Management?
									if ($btn == "userMgmt")
										{
											# define what a administrator sees in the sidebar
											if ($userRole == "administrator")
												{
													echo "	<ul id=\"sidebar\">\n";
													echo "	</ul>\n";
												}
											# define what a commander sees in the sidebar
											else if ($userRole == "commander")
												{
													echo "	<ul id=\"sidebar\">\n";
													echo "		<li><a href=\"CampaignSelect.php?btn=home\" class=\"campConnect\"><span></span></a></li>\n";
													echo "	</ul>\n";
												}
											# define what a viewer sees in the sidebar
											else if ($userRole == "viewer")
												{
													echo "	<ul id=\"sidebar\">\n";
													if ($sde == 'ststcs') {
														echo "		<li><a href=\"IndexBosWarRofWar.php?btn=home&sde=ststcs\" class=\"statisticsAct\"><span></span></a></li>\n";
														}
													else {
														echo "		<li><a href=\"IndexBosWarRofWar.php?btn=home&sde=ststcs\" class=\"statistics\"><span></span></a></li>\n";
													}
													echo "  </ul>\n";
												}
											}
											
# was the pressed button Campaign Setup?
									if ($btn == "campStp")
										{	
											if ($userRole == "administrator")
												{	
													# turn this menu on if user has loaded a campaign into the SESSION variable campaign
													echo "	<ul id=\"sidebar\">\n";
# change campaign status													
													if ($sde == 'campState') {
														echo "		<li class=\"campStatus\"><a href=\"CampaignMgmtChangeStatus.php?btn=campStp&sde=campState\" class=\"campStatusAct\"><span>$camp_status</span></a>\n</li>\n";
														}
													else {
														echo "		<li class=\"campStatus\"><a href=\"CampaignMgmtChangeStatus.php?btn=campStp&sde=campState\" class=\"campStatus\"><span>$camp_status</span></a></li>\n";
													}
# campaign confguration													
													if ($sde == 'campConf') {
														if ($camp_status_id > '0') { # [MYATA] this is not a good way as it doesn't really track if a user finished configuration
															$conf_status = 'Config completed';
														} else {
															$conf_status = 'Config not completed';
														}
														echo "	    <li class=\"campStatus\"><a href=\"CampaignMgmtConfigure.php?btn=campStp&sde=campConf\" class=\"campConfigureAct\"><span>$conf_status</span></a></li>\n";
														}
													else {
														if ($camp_status_id > '0') { # [MYATA] this is not a good way as it doesn't really track if a user finished configuration
															$conf_status = 'Config completed';
														} else {
															$conf_status = 'Config not completed';
														}
														echo "	    <li class=\"campStatus\"><a href=\"CampaignMgmtConfigure.php?btn=campStp&sde=campConf\" class=\"campConfigure\"><span>$conf_status</span></a></li>\n";
													}
# campaign setup													
													if ($sde == 'campSet') {
														echo "	    <li><a href=\"CampaignMgmtSetup.php?btn=campStp&sde=campSet\" class=\"campSetupAct\"></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtSetup.php?btn=campStp&sde=campSet\" class=\"campSetup\"></a></li>\n";
													}
# campaign airforces													
													if ($sde == 'campP') {
														echo "	    <li><a href=\"CampaignMgmtObjects.php?btn=campStp&sde=campP&objectClass=P\"	class=\"campAirForcesAct\"></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtObjects.php?btn=campStp&sde=campP&objectClass=P\"	class=\"campAirForces\"></a></li>\n";
													}
# campaign groundforces													
													if ($sde == 'campV') {
														echo "	    <li><a href=\"CampaignMgmtObjects.php?btn=campStp&sde=campV&objectClass=V\" class=\"campGroundForcesAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtObjects.php?btn=campStp&sde=campV&objectClass=V\" class=\"campGroundForces\"><span></span></a></li>\n";
													}
# campaign create columns													
													if ($sde == 'campCol') {
														echo "	    <li><a href=\"CampaignMgmtSetupColumns.php?btn=campStp&sde=campCol\" class=\"campCreateColumnsAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtSetupColumns.php?btn=campStp&sde=campCol\" class=\"campCreateColumns\"><span></span></a></li>\n";
													}
# campaign create statics													
													if ($sde == 'campStat') {
														echo "	    <li><a href=\"CampaignMgmtSetupStatics.php?btn=campStp&sde=campStat\" class=\"campCreateStaticsAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtSetupStatics.php?btn=campStp&sde=campStat\" class=\"campCreateStatics\"><span></span></a></li>\n";
													}
# download airfields and bridges													
													if ($sde == 'campAfldBrdg') {
														echo "	    <li><a href=\"CampaignMgmtDLBridgesConfirm.php?btn=campStp&sde=campAfldBrdg\" class=\"MgmtDLAfldsBrdgsAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtDLBridgesConfirm.php?btn=campStp&sde=campAfldBrdg\" class=\"MgmtDLAfldsBrdgs\"><span></span></a></li>\n";
													}	
# download columns and statics to template																									
													if ($sde == 'MgmtDlClmsStcs') {
														echo "	    <li><a href=\"CampaignMgmtDLTemplateConfirm.php?btn=campStp&sde=MgmtDlClmsStcs\" class=\"MgmtDlClmsStcsAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtDLTemplateConfirm.php?btn=campStp&sde=MgmtDlClmsStcs\" class=\"MgmtDlClmsStcs\"><span></span></a></li>\n";
													}
# upload columns and statics from template													
													if ($sde == 'MgmtUlClmsStcs') {
														echo "	    <li><a href=\"CampaignMgmtULTemplateConfirm.php?btn=campStp&sde=MgmtUlClmsStcs\" class=\"MgmtUlClmsStcsAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtULTemplateConfirm.php?btn=campStp&sde=MgmtUlClmsStcs\" class=\"MgmtUlClmsStcs\"><span></span></a></li>\n";
													}
/*													
													if ($sde == 'campAf') {
														echo "	    <li><a href=\"CampaignMgmtAirfields.php?btn=btn=campStp&sde=campAf\" class=\"campAirfieldResupplyAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtAirfields.php?btn=campStp&sde=campAf\" class=\"campAirfieldResupply\"><span></span></a></li>\n";
													}
*/													
													echo "  </ul>\n";
												}
											if ($userRole == "commander")
												{
													echo "<h3>$loadedCampaign</h3>\n";
													echo "	<ul id=\"sidebar\">\n";
													echo "	    <li><a href=\"CampaignMgmtAirfields.php?btn=campStp\"	class=\"modifyAirfield\"><span></span></a></li>\n";
													echo "	    <li><a href=\"MsnPreColumnsMgmtSelect.php?btn=campStp\" class=\"modifyTroops\"><span></span></a></li>\n";
													echo "	    <li><a href=\"MsnPreStaticsMgmtSelect.php?btn=campStp\" class=\"modifyTroops\"><span></span></a></li>\n";
													echo "  </ul>\n";
												}
										}
										
# was the pressed button Prepare Mission?
									if ($btn == "preMsn")
										{	
											if ($userRole == "administrator" Or $userRole == "commander")
												{	
													# turn this menu on if user has loaded a campaign into the SESSION variable campaign
													echo "	<ul id=\"sidebar\">\n";
# supply points control points													
													if ($sde == 'campCtrl') {
														echo "	    <li><a href=\"CampaignMgmtSupplyControlPoints.php?btn=preMsn&sde=campCtrl\" class=\"campControlSupplyPointsAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtSupplyControlPoints.php?btn=preMsn&sde=campCtrl\" class=\"campControlSupplyPoints\"><span></span></a></li>\n";
													}
# update bridge status													
													if ($sde == 'campBrdg') {
														echo "	    <li><a href=\"CampaignMgmtBridges.php?btn=preMsn&sde=campBrdg\" class=\"campUpdateBridgesAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtBridges.php?btn=preMsn&sde=campBrdg\" class=\"campUpdateBridges\"><span></span></a></li>\n";
													}													
# create columns
													if ($sde == 'campCol') {
														echo "	    <li><a href=\"CampaignMgmtSetupColumns.php?btn=preMsn&sde=campCol\" class=\"campCreateColumnsAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtSetupColumns.php?btn=preMsn&sde=campCol\" class=\"campCreateColumns\"><span></span></a></li>\n";
													}
# create statics										
													if ($sde == 'campStat') {
														echo "	    <li><a href=\"CampaignMgmtSetupStatics.php?btn=preMsn&sde=campStat\" class=\"campCreateStaticsAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtSetupStatics.php?btn=preMsn&sde=campStat\" class=\"campCreateStatics\"><span></span></a></li>\n";
													}													
# resupply airfields											
													if ($sde == 'campAf') {
														echo "	    <li><a href=\"CampaignMgmtAirfields.php?btn=preMsn&sde=campAf\" class=\"campAirfieldResupplyAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtAirfields.php?btn=preMsn&sde=campAf\" class=\"campAirfieldResupply\"><span></span></a></li>\n";
													}
# download columns and statics to planners
													if ($sde == 'MgmtDl2Plnrs') {
														echo "	    <li><a href=\"CampaignMgmtDLPlanningConfirm.php?btn=preMsn&sde=MgmtDl2Plnrs\" class=\"MgmtDl2PlnrsAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtDLPlanningConfirm.php?btn=preMsn&sde=MgmtDl2Plnrs\" class=\"MgmtDl2Plnrs\"><span></span></a></li>\n";
													}
# upload columns and statics from planners													
													if ($sde == 'MgmtUlFrmMsnPlnrs') {
														echo "	    <li><a href=\"CampaignMgmtULPlannedConfirm.php?btn=preMsn&sde=MgmtUlFrmMsnPlnrs\" class=\"MgmtUlFrmMsnPlnrsAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtULPlannedConfirm.php?btn=preMsn&sde=MgmtUlFrmMsnPlnrs\" class=\"MgmtUlFrmMsnPlnrs\"><span></span></a></li>\n";
													}
#	download final mission file												
													if ($sde == 'MgmtDlFnlMsn') {
														echo "	    <li><a href=\"CampaignMgmtDLBuildingConfirm.php?btn=preMsn&sde=MgmtDlFnlMsn\" class=\"MgmtDlFnlMsnAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtDLBuildingConfirm.php?btn=preMsn&sde=MgmtDlFnlMsn\" class=\"MgmtDlFnlMsn\"><span></span></a></li>\n";
													}
# run final mission													
													if ($sde == 'NewBtn5') {
														echo "	    <li><a href=\"MsnPreGenRunMission.php?btn=preMsn&sde=NewBtn5\" class=\"dummyAct\">Run Mission</a></li>\n";
														}
													else {
														echo "	    <li><a href=\"MsnPreGenRunMission.php?btn=preMsn&sde=NewBtn5Act\" class=\"dummy\">Run Mission</a></li>\n";
													}
/*
													if ($sde == 'campVRsup') {
														echo "	    <li><a href=\"MsnPreResupplyVehicles.php?btn=preMsn&sde=campVRsup\" class=\"campGroundResupplyAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"MsnPreResupplyVehicles.php?btn=preMsn&sde=campVRsup\" class=\"campGroundResupply\"><span></span></a></li>\n";
													}
													if ($sde == 'NewBtn1') {
														echo "	    <li><a href=\"CampaignMgmtAdvcdParam.php?btn=preMsn&sde=NewBtn1\" class=\"dummyAct\">Campaign Advanced Parameters</a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignMgmtAdvcdParam.php?btn=preMsn&sde=NewBtn1\" class=\"dummy\">Campaign Advanced Parameters</a></li>\n";
													}
													
													if ($sde == 'NewBtn2') {
														echo "	    <li><a href=\"MsnPreGenNextForPlanning.php?btn=preMsn&sde=NewBtn2\"	class=\"dummyAct\">Generate next mission for planning</a></li>\n";
														}
													else {
														echo "	    <li><a href=\"MsnPreGenNextForPlanning.php?btn=preMsn&sde=NewBtn2\"	class=\"dummy\">Generate next mission for planning</a></li>\n";
													}
													if ($sde == 'NewBtn3') {
														echo "	    <li><a href=\"MsnPreGetNext.php?btn=preMsn&sde=NewBtn3\" class=\"dummyAct\">Receive back group files from planners</a></li>\n";
														}
													else {
														echo "	    <li><a href=\"MsnPreGetNext.php?btn=preMsn&sde=NewBtn3Act\" class=\"dummy\">Receive back group files from planners</a></li>\n";
													}
													if ($sde == 'NewBtn4') {
														echo "	    <li><a href=\"MsnPreGenNextForMission.php?btn=preMsn&sde=NewBtn4\" class=\"dummyAct\">Generate Mission Files</a></li>\n";
														}
													else {
														echo "	    <li><a href=\"MsnPreGenNextForMission.php?btn=preMsn&sde=NewBtn4Act\" class=\"dummy\">Generate Mission Files</a></li>\n";
													}
*/													
													echo "  </ul>\n";
												}
										}
										
# was the pressed button Post Mission?
									if ($btn == "postMsn")
										{	
											if ($userRole == "administrator" OR $userRole == "commander")
												{	
													# turn this menu on if user has loaded a campaign into the SESSION variable campaign
													echo "	<ul id=\"sidebar\">\n";
													if ($sde == 'lgPrsr') {
														echo "	    <li><a href=\"MsnPostLogParser.php?btn=postMsn&sde=lgPrsr\" class=\"campLogParserAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"MsnPostLogParser.php?btn=postMsn&sde=lgPrsr\" class=\"campLogParser\"><span></span></a></li>\n";
													}
													if ($sde == 'crrSts') {
														echo "	    <li><a href=\"MsnPostCorrectStats.php?btn=postMsn&sde=crrSts\" class=\"dummyAct\">Correct Stats</a></li>\n";
														}
													else {
														echo "	    <li><a href=\"MsnPostCorrectStats.php?btn=postMsn&sde=crrSts\" class=\"dummy\">Correct Stats</a></li>\n";
													}
													if ($sde == 'updtColStcs') {
														echo "	    <li><a href=\"MsnPostUpdtColumns.php?btn=postMsn&sde=updtColStcs\" class=\"dummyAct\">Update Columns and Statics to remove losses</a></li>\n";
														}
													else {
														echo "	    <li><a href=\"MsnPostUpdtColumns.php?btn=postMsn&sde=updtColStcs\" class=\"dummy\">Update Columns and Statics to remove losses</a></li>\n";
													}
#													if ($sde == 'dummy') {
#														echo "	    <li><a href=\"MsnPostUpdtStatics.php?btn=postMsn&sde=dummy\" class=\"dummyAct\">Spare button</a></li>\n";
#														}
#													else {
#														echo "	    <li><a href=\"MsnPostUpdtStatics.php?btn=postMsn&sde=dummy\" class=\"dummy\">Spare button</a></li>\n";
#													}
													if ($sde == 'ctrlArLss') {
														echo "	    <li><a href=\"MsnPostUpdtAirfields.php?btn=postMsn&sde=ctrlArLss\" class=\"dummyAct\">Control Air losses</a></li>\n";
														}
													else {
														echo "	    <li><a href=\"MsnPostUpdtAirfields.php?btn=postMsn&sde=ctrlArLss\" class=\"dummy\">Control Air losses</a></li>\n";
													}
													echo "  </ul>\n";
												}
										}
										
# was the pressed button Prepare Campaign? - This button is only displayes to Administrators
									if ($btn == "prepCamp")
										{	
											if ($userRole == "administrator")
												{	
													# turn this menu on if user has loaded a campaign into the SESSION variable campaign
													echo "	<ul id=\"sidebar\">\n";
													if ($sde == 'createCamp') {
														echo "	    <li><a href=\"CampaignPrepCreateNew.php?btn=prepCamp&sde=createCamp\" class=\"campCreateAct\"><span></span></a></li>\n";
														}
													else {
														echo "	    <li><a href=\"CampaignPrepCreateNew.php?btn=prepCamp&sde=createCamp\" class=\"campCreate\"><span></span></a></li>\n";
													}
													echo "  </ul>\n";
												}
										}									
								}
							else {

# there is a user logged on but no button was pressed so this is the default view
									echo "<h3>Choose:</h3>\n";	
								}
						}
				else {

# there is no user logged on and no button was pressed so this is the default view
						echo "<h3>Info:</h3>\n";
						echo "	<ul id=\"sidebar\">\n";
							if ($sde == 'ststcs') {
									echo "		<li><a href=\"IndexBosWarRofWar.php?btn=home&sde=ststcs\" class=\"statisticsAct\"><span></span></a></li>\n";
									}
								else {
									echo "		<li><a href=\"IndexBosWarRofWar.php?btn=home&sde=ststcs\" class=\"statistics\"><span></span></a></li>\n";
								}
						echo "  </ul>\n";
					}
            ?>
            
        </div>
