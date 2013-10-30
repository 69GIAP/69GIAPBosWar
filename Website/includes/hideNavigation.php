<?php 

# the btn variable defines the look of the sidebar menu       

	if($userRole == "administrator") 
		{	
		if (empty($loadedCampaign))
			{
				#DISPLAY HOME, CAMPAIGN MANAGEMENT, USER MANAGEMENT
				echo "<li><a href=\"includes/unsetCampaignSessions.php?btn=home\"	class=\"home\"><span></span></a></li>\n";
				echo "<li><a href=\"CampaignPrepCreateNew.php?btn=prepCamp\" 			class=\"prepCamp\"><span></span></a></li>\n";
				echo "<li><a href=\"UserMgmt.php?btn=userMgmt\" 				class=\"userMgmt\"><span></span></a></li>\n";
			}
		else			
			{
				#DISPLAY HOME, CAMPAIGN MANAGEMENT, PRE MISSION, POST MISSION
				echo "<li><a href=\"includes/unsetCampaignSessions.php?btn=home\"	class=\"home\"><span></span></a></li>\n";
				echo "<li><a href=\"CampaignMgmt.php?btn=campMgmt\" 				class=\"campMgmt\"><span></span></a></li>\n";
				echo "<li><a href=\"CampaignMgmt.php?btn=preMsn\" 					class=\"preMsn\"><span></span></a></li>\n";
				echo "<li><a href=\"CampaignMgmt.php?btn=postMsn\" 					class=\"postMsn\"><span></span></a></li>\n";
			}
		}
	elseif($userRole == "commander") 
		{
		if (empty($loadedCampaign))
			{
				#DISPLAY HOME
				echo "<li><a href=\"includes/unsetCampaignSessions.php\" class=\"home\"><span></span></a></li>\n";
			}
		else
			{
				#DISPLAY HOME, CAMPAIGN MAMANGEMENT, USER MANAGEMENT		
				echo "<li><a href=\"includes/unsetCampaignSessions.php?btn=home\"	class=\"home\"><span></span></a></li>\n";
				echo "<li><a href=\"CampaignMgmt.php?btn=campMgmt\" 				class=\"campMgmt\"><span></span></a></li>\n"; #temporary until I include the airfield mgmt properly
				echo "<li><a href=\"UserMgmt.php?btn=userMgmt\" 					class=\"userMgmt\"><span></span></a></li>\n";
			}
		}
	elseif($userRole == "" or $userRole == "viewer") 
		{
			# show no buttons
			#echo "	<li><a href=\"indexBosWarRofWar.php?btn=home\" class=\"home\"><span></span></a></li>\n";
		}
?>
