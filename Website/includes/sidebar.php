        <div id="side">

			<?php

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
															echo "		<li><a href=\"CampaignSelect.php?btn=home\" class=\"campConnect\"><span></span></a></li>\n";
															#echo "		<li><a href=\"CampaignCreateNew.php?btn=home\" class=\"campCreate\"><span></span></a></li>\n";
															echo "		<li><a href=\"CampaignDrop.php?btn=home\" class=\"campDrop\"><span></span></a></li>\n";															
														}
													else
														{
															echo "	    <li><a href=\"CampaignLogParser.php?btn=campMgmt\" class=\"campLogParser\"><span></span></a></li>\n";
															echo "		<li><a href=\"CampaignConfiguration.php?btn=campMgmt\" class=\"campStatus\"><span></span></a></li>\n";																														
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
													echo "	    <li><a href=\"IndexBosWarRofWar.php?btn=home\" class=\"statistics\"><span></span></a></li>\n";
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
													echo "	    <li><a href=\"#\" class=\"statistics\"><span></span></a></li>\n";
													echo "  </ul>\n";
												}
											}
									# was the pressed button Campaign Management?
									if ($btn == "campMgmt")
										{	
											if ($userRole == "administrator")
												{	
													# turn this menu on if user has loaded a campaign into the SESSION variable campaign
													echo "	<ul id=\"sidebar\">\n";
													echo "		<li><a href=\"CampaignMgmtChangeStatus.php?btn=campMgmt\" class=\"campStatus\"><span></span></a></li>\n";
													echo "	    <li><a href=\"CampaignMgmtSetup.php?btn=campMgmt\" class=\"campSetup\"><span></span></a></li>\n";
													echo "	    <li><a href=\"CampaignMgmtAdvcdParam.php?btn=campMgmt\" class=\"campConfig\">Campaign Advanced Parameters</a></li>\n";
													echo "	    <li><a href=\"CampaignMgmtPlaneset.php?btn=campMgmt\" class=\"campConfig\">Available planes for Campaign</a></li>\n";
													echo "	    <li><a href=\"CampaignMgmtSupplyControlPoints.php?btn=campMgmt\" class=\"campConfig\">Supply/Control Points</a></li>\n";
													echo "	    <li><a href=\"CampaignMgmtVehicleset.php?btn=campMgmt\" class=\"campConfig\">Vehicles</a></li>\n";
													echo "	    <li><a href=\"CampaignMgmtColumns.php?btn=campMgmt\" class=\"campConfig\">Create Columns</a></li>\n";
													echo "	    <li><a href=\"CampaignMgmtStatics.php?btn=campMgmt\" class=\"campConfig\">Create Static</a></li>\n";
													echo "	    <li><a href=\"CampaignMgmtAirfields.php?btn=campMgmt\" class=\"campConfig\">Update Airfields</a></li>\n";
													echo "	    <li><a href=\"CampaignMgmtBridges.php?btn=campMgmt\" class=\"campConfig\">Update Bridge Status</a></li>\n";
													echo "	    <li><a href=\"CampaignMgmtGroupFiles.php?btn=campMgmt\" class=\"campPlanning\">Receive Group Files</a></li>\n";	
													echo "  </ul>\n";
												}
											if ($userRole == "commander")
												{
													echo "<h3>$loadedCampaign</h3>\n";
													echo "	<ul id=\"sidebar\">\n";
													echo "	    <li><a href=\"MsnPreAirfieldMgmtSelect.php?btn=campMgmt\" class=\"modifyAirfield\"><span></span></a></li>\n";
													echo "	    <li><a href=\"MsnPreColumnsMgmtSelect.php?btn=campMgmt\" class=\"modifyTroops\"><span></span></a></li>\n";
													echo "	    <li><a href=\"MsnPreStaticsMgmtSelect.php?btn=campMgmt\" class=\"modifyTroops\"><span></span></a></li>\n";
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
													echo "	    <li><a href=\"CampaignMgmtAdvcdParam.php?btn=preMsn\" class=\"campStatus\">Campaign Advanced Parameters</a></li>\n";
													echo "	    <li><a href=\"MsnPreGenNextForPlanning.php?btn=preMsn\" class=\"campLogParser\">Generate next mission for planning</a></li>\n";
													echo "	    <li><a href=\"MsnPreResupplyPlanes.php?btn=preMsn\" class=\"campLogParser\">Manage Resupply of Planes</a></li>\n";
													echo "	    <li><a href=\"MsnPreResupplyVehicles.php?btn=preMsn\" class=\"campLogParser\">Manage Resupply of Vehicles</a></li>\n";
													echo "	    <li><a href=\"MsnPreUpdtBridges.php?btn=preMsn\" class=\"campLogParser\">Update Bridge Status</a></li>\n";
													echo "	    <li><a href=\"MsnPreGetNext.php?btn=preMsn\" class=\"campLogParser\">Receive back group files from planners</a></li>\n";
													echo "	    <li><a href=\"MsnPreGenNextForMission.php?btn=preMsn\" class=\"campLogParser\">Generate Mission Files</a></li>\n";
													echo "	    <li><a href=\"MsnPreGenRunMission.php?btn=preMsn\" class=\"campLogParser\">Run Mission</a></li>\n";													
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
													echo "	    <li><a href=\"MsnPostLogParser.php?btn=postMsn\" class=\"campLogParser\"><span></span></a></li>\n";
													echo "	    <li><a href=\"MsnPostCorrectStats.php?btn=postMsn\" class=\"campLogParser\">Correct Stats</a></li>\n";
													echo "	    <li><a href=\"MsnPostUpdtColumns.php?btn=postMsn\" class=\"campLogParser\">Update Columns to remove losses</a></li>\n";
													echo "	    <li><a href=\"MsnPostUpdtStatics.php?btn=postMsn\" class=\"campLogParser\">Update Statics to remove losses</a></li>\n";
													echo "	    <li><a href=\"MsnPostUpdtAirfields.php?btn=postMsn\" class=\"campLogParser\">Control Air losses</a></li>\n";
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
													echo "	    <li><a href=\"CampaignPrepCreateNew.php?btn=prepCamp\" class=\"campCreate\"><span></span></a></li>\n";
													echo "  </ul>\n";
												}
										}									
								}
							else
								{
									# there is a user logged on but no button was pressed so this is the default view
									echo "<h3>Choose:</h3>\n";	
								}
						}
				else
					{
						# there is no user logged on and no button was pressed so this is the default view
						echo "<h3>Info:</h3>\n";
						echo "	<ul id=\"sidebar\">\n";
						echo "	    <li><a href=\"IndexBosWarRofWar.php?btn=home\" class=\"statistics\"><span></span></a></li>\n";
						echo "  </ul>\n";
					}
            ?>
            
        </div>