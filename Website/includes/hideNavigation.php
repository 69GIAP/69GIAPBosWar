<?php 

# the btn variable defines the look of the sidebar menu       

	if($userRole == "administrator") 
		{	
		if (empty($loadedCampaign))
			{
				#DISPLAY HOME, CAMPAIGN PREPARATION, USER MANAGEMENT
				if ($btn == 'home') {
					echo "<li><a href=\"includes/unsetCampaignSessions.php?btn=home\"	class=\"homeAct\"></a></li>\n";
					}
				else {
					echo "<li><a href=\"includes/unsetCampaignSessions.php?btn=home\"	class=\"home\"><span></span></a></li>\n";
				}
				if ($btn == 'prepCamp') {
					echo "<li><a href=\"CampaignPrepCreateNew.php?btn=prepCamp\" 		class=\"prepCampAct\"></a></li>\n";
					}
				else {
					echo "<li><a href=\"CampaignPrepCreateNew.php?btn=prepCamp\" 		class=\"prepCamp\"><span></span></a></li>\n";
				}
				if ($btn == 'userMgmt') {
					echo "<li><a href=\"UserMgmt.php?btn=userMgmt\"						class=\"userMgmtAct\"></a></li>\n";
					}
				else {
					echo "<li><a href=\"UserMgmt.php?btn=userMgmt\"						class=\"userMgmt\"><span></span></a></li>\n";
				}
				
				
			}
		else			
			{
				#DISPLAY HOME, CAMPAIGN SETUP, PRE MISSION, POST MISSION, USER MANAGEMENT
				if ($btn == 'home') {
					echo "<li><a href=\"includes/unsetCampaignSessions.php?btn=home\"	class=\"homeAct\"></a></li>\n";
					}
				else {
					echo "<li><a href=\"includes/unsetCampaignSessions.php?btn=home\"	class=\"home\"><span></span></a></li>\n";
				}
				if ($btn == 'campStp') {
					echo "<li><a href=\"CampaignMgmt.php?btn=campStp\" 	class=\"campStpAct\"></a></li>\n";
					}
				else {
					echo "<li><a href=\"CampaignMgmt.php?btn=campStp\" 	class=\"campStp\"><span></span></a></li>\n";
				}
				if ($btn == 'preMsn') {
					echo "<li><a href=\"CampaignMgmt.php?btn=preMsn\" 	class=\"preMsnAct\"></a></li>\n";
					}
				else {
					echo "<li><a href=\"CampaignMgmt.php?btn=preMsn\" 	class=\"preMsn\"><span></span></a></li>\n";
				}
				if ($btn == 'postMsn') {
					echo "<li><a href=\"CampaignMgmt.php?btn=postMsn\" 	class=\"postMsnAct\"></a></li>\n";
					}
				else {
					echo "<li><a href=\"CampaignMgmt.php?btn=postMsn\" 	class=\"postMsn\"><span></span></a></li>\n";
				}
				if ($btn == 'userMgmt') {
					echo "<li><a href=\"UserMgmt.php?btn=userMgmt\"		class=\"userMgmtAct\"></a></li>\n";
					}
				else {
					echo "<li><a href=\"UserMgmt.php?btn=userMgmt\"		class=\"userMgmt\"><span></span></a></li>\n";
				}
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
				#DISPLAY HOME, CAMPAIGN SETUP, USER MANAGEMENT		
				echo "<li><a href=\"includes/unsetCampaignSessions.php?btn=home\"	class=\"home\"><span></span></a></li>\n";
				echo "<li><a href=\"CampaignMgmt.php?btn=campStp\" 					class=\"campStp\"><span></span></a></li>\n"; #temporary until I include the airfield mgmt properly
				echo "<li><a href=\"UserMgmt.php?btn=userMgmt\" 					class=\"userMgmt\"><span></span></a></li>\n";
			}
		}
	elseif($userRole == "" or $userRole == "viewer") 
		{
			# show no buttons
			#echo "	<li><a href=\"indexBosWarRofWar.php?btn=home\" class=\"home\"><span></span></a></li>\n";
		}
?>
