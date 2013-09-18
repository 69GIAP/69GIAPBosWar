        <div id="side">

			<?php

				# check if there is a user logged on
				if (!empty($_SESSION["username"]))
					{		
							# get user role
							$role	= $_SESSION["userrole"];
							
							# check if a navigation button was pressed
							if (!empty($_SESSION['btn']))
								{
									# load the information into the varibale
									$btn = $_SESSION['btn'];
									
									# was the pressed button User Management?
									if ($btn == "usermgmt")
										{
											# define what a administrator sees in the sidebar
											if ($role == "administrator")
												{
													echo "<h1>Admin:</h1>\n";
													echo "	<ul id=\"sidebar\">\n";
													echo "		<li><a href=\"#\" class=\"adminBanner\"><span></span></a></li>\n";
													echo "		<li><a href=\"#\" class=\"sovietBanner\"><span></span></a></li>\n";
													echo "		<li><a href=\"#\" class=\"centerBanner\"><span></span></a></li>\n";
													echo "		<li><a href=\"#\" class=\"viewerBanner\"><span></span></a></li>\n";                               
													echo "	</ul>\n";
												}
											# define what a redAirAdmin or redGroundAdmin sees in the sidebar
											else if ($role == "redAirAdmin" OR $role == "redGroundAdmin")
												{
													echo "<h1>Red Admin:</h1>\n";
													echo "	<ul id=\"sidebar\">\n";
													echo "		<li><a href=\"#\" class=\"redAirBanner\"><span></span></a></li>\n";
													echo "		<li><a href=\"#\" class=\"redGroundBanner\"><span></span></a></li>\n";
													echo "	</ul>\n";
												}
											# define what a blueAirAdmin or redGroundAdmin sees in the sidebar
											else if ($role == "blueAirAdmin" OR $role == "blueGroundAdmin")
												{
													echo "<h1>Blue Admin:</h1>\n";
													echo "	<ul id=\"sidebar\">\n";
													echo "		<li><a href=\"#\" class=\"blueAirBanner\"><span></span></a></li>\n";
													echo "		<li><a href=\"#\" class=\"blueGroundBanner\"><span></span></a></li>\n";
													echo "	</ul>\n";
												}
											# define what a viewer sees in the sidebar
											else if ($role == "viewer")
												{
													echo "<h1>Viewer:</h1>\n";
													echo "	<ul id=\"sidebar\">\n";
													echo "	    <li><a href=\"#\" class=\"viewerBanner\"><span></span></a></li>\n";
													echo "  </ul>\n";
												}
											}
										else
										
										# was the pressed button Campaign Management?
										if ($btn == "campmgmt")
											{	
												if ($role == "administrator")
													{
														echo "<h1>Camp. Mgmt:</h1>\n";
														echo "	<ul id=\"sidebar\">\n";
														echo "	    <li>New Campaign</li>\n";
														echo "	    <li>Modify Campaign Status</li>\n";
														echo "	    <li> ... </li>\n";																						
														echo "  </ul>\n";
													}
												if ($role == "redAirAdmin" OR $role == "redGroundAdmin" OR $role == "blueAirAdmin" OR $role == "blueGroundAdmin")
													{
														echo "<h1>Camp. Mgmt:</h1>\n";
														echo "	<ul id=\"sidebar\">\n";
														echo "	    <li>Modify Campaign</li>\n";
														echo "	    <li> ... </li>\n";
														echo "	    <li> ... </li>\n";																						
														echo "  </ul>\n";
													}
											}
										# was the pressed button Campaign Management?
										if ($btn == "home")
											{	
												if ($role == "administrator")
													{
														echo "<h1>Home:</h1>\n";
														echo "	<ul id=\"sidebar\">\n";
														echo "	    <li> ... </li>\n";
														echo "	    <li> ... </li>\n";
														echo "	    <li> ... </li>\n";																						
														echo "  </ul>\n";
													}
												if ($role == "redAirAdmin" OR $role == "redGroundAdmin" OR $role == "blueAirAdmin" OR $role == "blueGroundAdmin")
													{
														echo "<h1>Home:</h1>\n";
														echo "	<ul id=\"sidebar\">\n";
														echo "	    <li> ... </li>\n";
														echo "	    <li> ... </li>\n";
														echo "	    <li> ... </li>\n";																						
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