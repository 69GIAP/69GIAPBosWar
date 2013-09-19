
<!-- The variable I hand over with the link is stored to the SESSION["btn"] variable and defines the look of the sidebar -->
<ul id="navigation">
    <!-- determine if the user sees a menu depending on SSSION userrole -->
    <?php include 'includes/hideNavigation.php'; ?> 
</ul>
<ul id="register">
    <!-- determine if the user sees a register button depending on SESSION username -->
    <?php include 'includes/registerButton.php'; ?>       
    <!-- determine if the user sees a login or logout button depending on an active session -->
    <?php include 'includes/loginButton.php'; ?>
</ul>