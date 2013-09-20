<!-- form for changing information in the users table -->
                <h3>Please select the airfield you want to modify:</h3>
                <fieldset class="UserMgmt">
                    <form name="delete" action="airfieldManagementChange.php" method="post">
                        <ul>
                            <li><label for="airfieldName">Airfield Name</label>
                                <select name="airfieldName">
                                    <?php include 'includes/getAirfieldNames.php' ?>
                                </select>
                            </li>
                                                                          
                            <li><label for="modify"></label>
                                <button type="modify" name="modify" >Load Airfield Data</button></li>
                                                      
                        </ul>
                    </form>
                </fieldset>