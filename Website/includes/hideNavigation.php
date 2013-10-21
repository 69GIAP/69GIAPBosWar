<?php 

# show the login button if the user is not logged on         

	if($userRole == "administrator") 
		{	
		if (empty($loadedCampaign))
			{
				# show HOME and USER MANAGEMENT
				#echo "<li><a href=\"LoggedOn.php?btn=home\" class=\"home\"><span></span></a></li>\n";
				#echo "<li><a href=\"CampaignManagment.php?btn=campmgmt\" class=\"campMgmt\"><span></span></a></li>\n";
				
				# SHOW HOME, CAMPAIGN MANAGEMENT, USER MANAGEMENT
				echo "<li><a href=\"includes/unsetCampaignSessions.php?btn=home\"	class=\"home\"><span></span></a></li>\n";
				echo "<li><a href=\"CampaignCreateNew.php?btn=prepCamp\" 			class=\"prepCamp\"><span></span></a></li>\n";
				echo "<li><a href=\"UserManagement.php?btn=userMgmt\" 				class=\"userMgmt\"><span></span></a></li>\n";
			}
		else			
			{
				# show HOME and CAMPAIGN MANAGEMENT
				#echo "<li><a href=\"includes/unsetCampaignSessions.php\" class=\"home\"><span></span></a></li>\n";	
				#echo "<li><a href=\"CampaignManagment.php?btn=campMgmt\" class=\"campMgmt\"><span></span></a></li>\n";	
						
				#show HOME, PRE MISSION, POST MISSION, CAMPAIGN MAMANGEMENT
				echo "<li><a href=\"includes/unsetCampaignSessions.php?btn=home\"	class=\"home\"><span></span></a></li>\n";
				echo "<li><a href=\"CampaignMgmt.php?btn=preMsn\" 					class=\"preMsn\"><span></span></a></li>\n";
				echo "<li><a href=\"CampaignMgmt.php?btn=postMsn\" 					class=\"postMsn\"><span></span></a></li>\n";
				echo "<li><a href=\"CampaignMgmt.php?btn=campMgmt\" 				class=\"campMgmt\"><span></span></a></li>\n";
			}
		}
	elseif($userRole == "commander") 
		{
		if (empty($loadedCampaign))
			{
				# show only the Home button navigation
				echo "<li><a href=\"includes/unsetCampaignSessions.php\" class=\"home\"><span></span></a></li>\n";
			}
		else
			{
				# show only the Home UserManagement and CampaignManagement buttons
				echo "<li><a href=\"LoggedOn.php?btn=home\" 			class=\"home\"><span></span></a></li>\n";
				echo "<li><a href=\"CampaignMgmt.php?btn=campMgmt\" 	class=\"campMgmt\"><span></span></a></li>\n";
				echo "<li><a href=\"UserManagement.php?btn=userMgmt\" 	class=\"userMgmt\"><span></span></a></li>\n";
			}
		}
	elseif($userRole == "" or $userRole == "viewer") 
		{
			# show no buttons
			#echo "	<li><a href=\"indexBosWarRofWar.php?btn=home\" class=\"home\"><span></span></a></li>\n";
		}
?>