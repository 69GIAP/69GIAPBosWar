<!-- form for changing information in the users table -->
                <h3>Please select the user you want to modify:</h3>
                <fieldset class="UserMgmt">
                    <form name="delete" action="UserManagementModify.php" method="post">
                        <ul>
                            <li><label for="userid">Select User</label>
                                <select name="userid">
                                    <?php include 'includes/getUserNames.php' ?>
                                </select>
                            </li>
                                
                            <li><label for="password">New Password</label>
                                <input type="text" name="password" id="password" size="30" />
                                <label for="modify"></label>
                            	<button type="modify" name="modify" value ="1" >Update Password</button></li>
        
                            <li><label for="role">Select Role</label>
                                 <!-- this name element defines the variable name -->
                                <select name="role">
                                <!-- Load the roles stored in the table roles to fill selector -->
                                <?php	include 'includes/getUserRoles.php' ?></select>
                                
								<label for="modify"></label>
                                <button type="modify" name="modify" value ="2" >Update Role</button></li>
                            
                            <li><label for="campdb">Assign Campaign</label>
                                 <!-- this name element defines the variable name -->
                                <select name="campdb">
                                <!-- Load all active campaigns out of the campaign_settings table -->
                                <?php	include 'includes/getActiveCampaigns.php' ?></select>
                                
                                <label for="modify"></label>
                                <button type="modify" name="modify" value ="3" >Assign to Campaign</button></li>
                                
							<li><label for="remCampdb">Remove User From Campaign</label>
                                 <!-- this name element defines the variable name -->
                                <select name="remCampdb">
                                <!-- Load all active campaigns out of the campaign_settings table -->
                                <?php	include 'includes/getActiveCampaigns.php' ?></select>
                                
                                <label for="modify"></label>
                                <button type="modify" name="modify" value ="4" >Remove from Campaign</button></li> 
                                                                               
                            <li><label for="modify"></label>
                                <button type="modify" name="modify" value ="0" >!! Delete User !!</button></li>
                                                      
                        <ul>
                    </form>
                </fieldset>