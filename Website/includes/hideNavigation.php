<?php 

# show the login button if the user is not logged on         
   
	if($role != "viewer" OR $role !="") 
		{
			# show the navigation button
			echo "<li><a href=\"LoggedOn_Admin.php?btn=home\" class=\"home\"><span></span></a></li>\n";
			echo "<li><a href=\"UserManagement.php?btn=usermgmt\" class=\"userMgmt\"><span></span></a></li>\n";
			echo "<li><a href=\"CampaignManagment_Admin.php?btn=campmgmt\" class=\"campMgmt\"><span></span></a></li>\n";
		}
	else
		{
			# show only the Home button navigation
			echo "<li><a href=\"LoggedOn_Viewer.php?btn=home\" class=\"home\"><span></span></a></li>\n";
		}
?>