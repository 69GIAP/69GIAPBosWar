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
													echo "<h3>Home:</h3>\n";
													echo "	<ul id=\"sidebar\">\n";
													
													if (empty($loadedCampaign))
														{
															echo "		<li><a href=\"CampaignSelect.php?btn=home\" class=\"campConnect\"><span></span></a></li>\n";
															echo "		<li><a href=\"CampaignCreateNew.php?btn=home\" class=\"campCreate\"><span></span></a></li>\n";
														}
													else
														{
															echo "	    <li><a href=\"CampaignLogParser.php?btn=campmgmt\" class=\"campLogParser\"><span></span></a></li>\n";
															echo "		<li><a href=\"CampaignConfiguration.php?btn=campmgmt\" class=\"campStatus\"><span></span></a></li>\n";															
														}
													echo "  </ul>\n";
												}
											if ($userRole == "commander")
												{
													echo "<h3>Home:</h3>\n";
													echo "	<ul id=\"sidebar\">\n";
													echo "		<li><a href=\"CampaignSelect.php?btn=home\" class=\"campConnect\"><span></span></a></li>\n";														
													echo "  </ul>\n";
												}
											if ($userRole == "viewer")
												{
													echo "<h3>Home:</h3>\n";
													echo "	<ul id=\"sidebar\">\n";
													echo "	    <li><a href=\"IndexBosWarRofWar.php?btn=home\" class=\"statistics\"><span></span></a></li>\n";
												echo "  </ul>\n";
												}
										}	
									# was the pressed button User Management?
									if ($btn == "usermgmt")
										{
											# define what a administrator sees in the sidebar
											if ($userRole == "administrator")
												{
													echo "<h3>Administration:</h3>\n";
													echo "	<ul id=\"sidebar\">\n";
													#echo "		<li><a href=\"#\" class=\"adminBanner\"><span></span></a></li>\n";                          
													echo "	</ul>\n";
												}
											# define what a commander sees in the sidebar
											else if ($userRole == "commander")
												{
													echo "<h3>Commander:</h3>\n";
													echo "	<ul id=\"sidebar\">\n";
													echo "		<li><a href=\"CampaignSelect.php?btn=home\" class=\"campConnect\"><span></span></a></li>\n";
													echo "	</ul>\n";
												}
											# define what a viewer sees in the sidebar
											else if ($userRole == "viewer")
												{
													echo "<h3>Viewer:</h3>\n";
													echo "	<ul id=\"sidebar\">\n";
													echo "	    <li><a href=\"#\" class=\"statistics\"><span></span></a></li>\n";
													echo "  </ul>\n";
												}
											}
										else
										
										# was the pressed button Campaign Management?
										if ($btn == "campmgmt")
											{	
												if ($userRole == "administrator")
													{	
														# turn this menu on if user has loaded a campaign into the SESSION variable campaign
														echo "<h3>Campaign Management:</h3>\n";
														echo "	<ul id=\"sidebar\">\n";
														echo "	    <li><a href=\"CampaignLogParser.php?btn=campmgmt\" class=\"campLogParser\"><span></span></a></li>\n";
														echo "		<li><a href=\"CampaignConfiguration.php?btn=campmgmt\" class=\"campStatus\"><span></span></a></li>\n";																	
														echo "  </ul>\n";
													}
												if ($userRole == "commander")
													{
														echo "<h3>$loadedCampaign</h3>\n";
														echo "	<ul id=\"sidebar\">\n";
														echo "	    <li><a href=\"airfieldManagementSelect.php\" class=\"modifyAirfield\"><span></span></a></li>\n";
														echo "	    <li><a href=\"#\" 							class=\"modifyTroops\"><span></span></a></li>\n";														
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
						echo "	    <li><a href=\"#\" class=\"statistics\"><span></span></a></li>\n";
						echo "  </ul>\n";
					}
            ?>
            
        </div>