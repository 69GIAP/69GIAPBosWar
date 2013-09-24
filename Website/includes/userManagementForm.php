<!-- form for changing information in the users table -->
                <h2>Please select the user you want to modify:</h2>
                <fieldset class="UserMgmt">

                    <form name="delete" action="UserManagementModify.php" method="post">
                        <ul>
                            <li><label for="userId">Select User</label>
                                <select class="UserMgmtSelectUser" name="userId">
                                    <?php include 'includes/getUserNames.php' ?>
                                </select>
							</li>
							<br />
  
                            <li><label for="password">New Password</label>
                                <input type="text" name="password" id="password" size="30" />
                                <label for="modify"></label>
                            	<button type="modify" name="modify" value ="1" >Update Password</button>
							</li>
                  
                            <li><label for="newUserRole">New Role</label>
                                <select name="newUserRole">
                                <!-- Load the roles stored in the table users_roles to fill selector -->
                                <?php	include 'includes/getUserRoles.php' ?></select>
                                
								<label for="modify"></label>
                                <button type="modify" name="modify" value ="2" >Update Role</button>
							</li>
                   
                            <li><label for="campdb">Assign/Remove User</label>
                                 <!-- this name element defines the variable name -->
                                <select name="campdb">
                                <!-- Load all active campaigns out of the campaign_settings table -->
                                <?php	include 'includes/getActiveCampaigns.php' ?></select>
							</li>
  
							<li><label for="modify"></label>
                                <button class="UserMgmtHalfButton1" type="modify" name="modify" value ="3" >Assign</button>
                            	<label for="modify"></label>
                                <button class="UserMgmtHalfButton2" type="modify" name="modify" value ="4" >Remove</button>
							</li> 
                                                                            
                            <li><label for="modify"></label>
                                <button type="modify" name="modify" value ="0" >!! Delete User !!</button>
							</li>
                                                      
                        <ul>
                    </form>
                </fieldset>
                