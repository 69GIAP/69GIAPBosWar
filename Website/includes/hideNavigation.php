<?php 

# show the login button if the user is not logged on         

	if($userRole == "administrator") 
		{
			# show the navigation button
			#echo "<li><a href=\"loggedOn.php?btn=home\" class=\"home\"><span></span></a></li>\n";
			echo "<li><a href=\"includes/unsetCampaignSessions.php\" class=\"home\"><span></span></a></li>\n";
			echo "<li><a href=\"UserManagement.php?btn=usermgmt\" class=\"userMgmt\"><span></span></a></li>\n";
			echo "<li><a href=\"CampaignManagment.php?btn=campmgmt\" class=\"campMgmt\"><span></span></a></li>\n";
		}
	else if($userRole == "commander") 
		{
			# show the navigation button
			#echo "<li><a href=\"loggedOn.php?btn=home\" class=\"home\"><span></span></a></li>\n";
			echo "<li><a href=\"includes/unsetCampaignSessions.php\" class=\"home\"><span></span></a></li>\n";
			echo "<li><a href=\"UserManagement.php?btn=usermgmt\" class=\"userMgmt\"><span></span></a></li>\n";
			if ($loadedCampaign)
				{echo "<li><a href=\"CampaignManagment.php?btn=campmgmt\" class=\"campMgmt\"><span></span></a></li>\n";}
		}
	else
		{
			# show only the Home button navigation
			echo "<li><a href=\"indexBosWarRofWar.php?btn=home\" class=\"home\"><span></span></a></li>\n";
		}
?>