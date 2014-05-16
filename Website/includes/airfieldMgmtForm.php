<?php
	# include connect2CampaignFunction.php
	include ( 'functions/connect2Campaign.php' );

	# include getCampaignVariables.php
	include ( 'includes/getCampaignVariables.php' );

	# use this information to connect to campaign 
	$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
	
	unset($_SESSION['airfieldName']);
	
?>
			<!-- form for changing information in the users table -->
                <h3>Please select the airfield you want to modify:</h3>                
                    <?php
						  # we need the if because this page is used from 2 main menu loactions and the look of the side menu would change
                    if ($btn == 'campStp') {
							 echo " <form id=\"loginForm\" name=\"delete\" action=\"airfieldMgmtChange.php?btn=campStp&sde=campAf\" method=\"post\">\n";
						  }
						  if ($btn == 'preMsn') {
							  echo "<form id=\"loginForm\" name=\"delete\" action=\"airfieldMgmtChange.php?btn=preMsn&sde=campAf\" method=\"post\">\n";
						  }
						  echo "	<fieldset id=\"inputs\">\n";

                    echo "	    <select id=\"airfield\" type=\"text\" name=\"airfieldName\" autofocus required>\n";

							$userCoalId = $_SESSION['userCoalId'];

							# display list filtered by user role
							if ($userRole == 'administrator') {
								
								# build select drop down
								echo "<option value=\"\" disabled selected>Select Airfield</option>\n";
								
								$state='Active';
								include 'includes/getAirfieldList.php' ;
								$state='Inactive';
								include 'includes/getAirfieldList.php' ;
							}
							if ($userRole == 'commander') {
								
								# build select drop down
								echo "<option value=\"\" disabled selected>Select Airfield</option>\n";
								
								$state='Active';
								include 'includes/getAirfieldList.php' ;
							}
							?>
                        </select>   
                    </fieldset>
                    
                    <fieldset id="actions">
                        <input type="submit" id="loginSubmit" value="Load Airfield Data">
                    </fieldset>
                </form>