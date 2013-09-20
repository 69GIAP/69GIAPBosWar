        <div id="side">

			<?php

				# check if there is a user logged on
				if (!empty($_SESSION["username"]))
					{		
							# get user role
							$userRole = $_SESSION["userRole"];
							
							# check if a navigation button was pressed
							if (!empty($_SESSION['btn']))
								{
									# load the information into the varibale
									$btn = $_SESSION['btn'];
									
									# was the pressed button User Management?
									if ($btn == "usermgmt")
										{
											# define what a administrator sees in the sidebar
											if ($userRole == "administrator")
												{
													echo "<h2>Admin:</h2>\n";
													echo "	<ul id=\"sidebar\">\n";
													#echo "		<li><a href=\"#\" class=\"adminBanner\"><span></span></a></li>\n";
													#echo "		<li><a href=\"#\" class=\"sovietBanner\"><span></span></a></li>\n";
													#echo "		<li><a href=\"#\" class=\"centerBanner\"><span></span></a></li>\n";
													#echo "		<li><a href=\"#\" class=\"viewerBanner\"><span></span></a></li>\n";                               
													echo "	</ul>\n";
												}
											# define what a commander sees in the sidebar
											else if ($userRole == "commander")
												{
													echo "<h2>Commander:</h2>\n";
													echo "	<ul id=\"sidebar\">\n";
													echo "		<li><a href=\"#\" class=\"redAirBanner\"><span></span></a></li>\n";
													echo "		<li><a href=\"#\" class=\"redGroundBanner\"><span></span></a></li>\n";
													echo "	</ul>\n";
												}
											# define what a viewer sees in the sidebar
											else if ($userRole == "viewer")
												{
													echo "<h2>Viewer:</h2>\n";
													echo "	<ul id=\"sidebar\">\n";
													echo "	    <li><a href=\"#\" class=\"viewerBanner\"><span></span></a></li>\n";
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
														if (!empty($loadedCampaign))
															{
																#echo $loadedCampaign;
																echo "<h2>Camp. Mgmt:</h2>\n";
																echo "	<ul id=\"sidebar\">\n";
																echo "	    <li>Modify Campaign Settings</li>\n";
																echo "	    <li>Modify Airfields</li>\n";
																echo "  </ul>\n";
															}
														else
															{
																#echo $loadedCampaign;
																echo "<h2>Camp. Mgmt:</h2>\n";
																echo "	<ul id=\"sidebar\">\n";
																echo "	    <li>Create New Campaign</li>\n";
																echo "	    <li>Change Campaign Status</li>\n";
																echo "  </ul>\n";
															}
														
													}
												if ($userRole == "commander")
													{
														if (!empty($loadedCampaign))
															{
																echo "<h2>$loadedCampaign</h2>\n";
																echo "	<ul id=\"sidebar\">\n";
																echo "	    <li><a href=\"airfieldSelect.php\" class=\"airfieldBanner\"><span></span></a></li>\n";
																echo "  </ul>\n";
															}
													}
											}
										# was the pressed button Home?
										if ($btn == "home")
											{	
												if ($userRole == "administrator")
													{
														echo "<h2>Home:</h2>\n";
														echo "	<ul id=\"sidebar\">\n";
														echo "	    <li></li>\n";														
														echo "  </ul>\n";
													}
												if ($userRole == "commander")
													{
														echo "<h2>Home:</h2>\n";
														echo "	<ul id=\"sidebar\">\n";
														echo "	    <li></li>\n";														
														echo "  </ul>\n";
													}
												if ($userRole == "viewer")
													{
														echo "<h2>Home:</h2>\n";
														echo "	<ul id=\"sidebar\">\n";
														echo "	    <li></li>\n";
													echo "  </ul>\n";
													}
											}											
									}
								else
								{
									# there is a user logged on but no button was pressed so this is the default view
									echo "<h1>Choose:</h1>\n";	
								}
							}
					else
						{
							# there is no user logged on and no button was pressed so this is the default view
							echo "<h1>Info:</h1>\n";
						}
            ?>
            
        </div>