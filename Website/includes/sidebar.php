        <div id="side">

			<?php
			
				# check if there is a user logged on
				if (!empty($_SESSION["username"]))
					{		
							# Using a differnet  username variable due to conflicts with the below query
							$ActualUser = $_SESSION["username"];
							$query = "SELECT role FROM users WHERE username LIKE '$ActualUser' LIMIT 1";
							$result = mysqli_query($dbc, $query);
							$row 	= mysqli_fetch_object($result);
							$role	= $row->role;
							#echo "$role <br>\n";
							
						# define what a administrator sees in the sidebar
						if ($role == "administrator")
							{
								echo "<h1>Admin:</h1>\n";
								echo "	<ul id=\"sidebar\">\n";
								echo "		<li><a href=\"UserAdministration.php?link=A\" class=\"adminBanner\"><span></span></a></li>\n";
								echo "		<li><a href=\"UserAdministration.php?link=R\" class=\"sovietBanner\"><span></span></a></li>\n";
								echo "		<li><a href=\"UserAdministration.php?link=B\" class=\"centerBanner\"><span></span></a></li>\n";
								echo "		<li><a href=\"UserAdministration.php?link=V\" class=\"viewerBanner\"><span></span></a></li>\n";                               
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
						{
							# there is no user logged on so this is the default view
							echo "<h1>Statistics:</h1>\n";
						}
            ?>
            
        </div>