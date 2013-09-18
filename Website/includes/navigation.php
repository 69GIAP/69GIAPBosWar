
<!-- The variable I hand over with the link is stored to the SESSION["btn"] variable and defines the look of the sidebar -->
<ul id="navigation">
    <li><a href="LoggedOn_Admin.php?btn=home" class="home"><span></span></a></li>
    <li><a href="UserManagement.php?btn=usermgmt" class="userMgmt"><span></span></a></li>
	<li><a href="CampaignManagment_Admin.php?btn=campmgmt" class="campMgmt"><span></span></a></li>
</ul>
<ul id="register">
    <!-- determine if the user sees a register button depending on SESSION username -->
    <?php include 'includes/registerButton.php'; ?>       
    <!-- determine if the user sees a login or logout button depending on an active session -->
    <?php include 'includes/loginButton.php'; ?>
</ul>