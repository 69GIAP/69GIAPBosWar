<?php 

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
		
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );


?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
				<?php
					# include connect2CampaignFunction.php
					include ( 'functions/connect2Campaign.php' );
		
					# use it to get remaining variables
					$query = "SELECT * from campaign_settings where camp_db = '$loadedCampaign'";  
		 
					if(!$result = $dbc->query($query)) {
						die('There was an error running the query [' . $dbc->error . ']');
					}
		
					if ($result = mysqli_query($dbc, $query)) {
						/* fetch associative array */
						while ($obj = mysqli_fetch_object($result)) {
							$campaign	=($obj->campaign);
							$camp_host	=($obj->camp_host);
							$camp_user	=($obj->camp_user);
							$camp_passwd=($obj->camp_passwd);
							$camp_status_id=($obj->status);
							
							# get campaign status
							$sql="SELECT campaign_status FROM campaign_status where id = $camp_status_id";
							if ($result = mysqli_query($dbc, $sql)) {
							/* fetch associative array */
							while ($obj = mysqli_fetch_object($result)) {
								$camp_status=($obj->campaign_status);
								}
							}
						}
					} 
									
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
					
					# initialise variables
					echo "<h1>Setup of New Campaign</h1>";
					# start form
					echo "<form id=\"campaignMgmtForm\" name=\"campaignSetup\" action=\"CampaignMgmtConfirm.php?btn=campMgmt\" method=\"post\">\n";
					
					echo "<br>This is a job for the campaign administrator who should have basic skills in the Mission Editor. - OK<br>\n";
					echo "<br>Before doing this you must have logged in with administrator rights, created a campaign database and connected to that campaign database. - OK<br>\n";
					echo "<br>You can open the Mission Editor in a separate window to help this process - OK<br>\n";
					
					echo "<p>First we define the map upon which the campaign will be run in the Mission editor.</p>\n";
					echo "<p>In the Mission Editor choose file menu, New, right click with mouse on map and select Properties. This will open the mission properties window.<br>\n";
					echo "Enter a name for the mission, preferably the same as that you chose for the campaign. Avoid special characters, do not make it a pure numeric start with an alpha character and be consistent in use of upper and lower case.<br>\n";
					echo "Mission type should be Deathmatch.</p>\n";
					
					echo "<p>Now we must select the Map. Currently in ROF there are two main campaign maps, the <b>Western Front map</b> and the <b>Channel map</b>. 
					Then there are also two small dogfight maps: <b>df3xlake</b> and <b>df5x5verdun</b>.<br>\n";
					echo "For Landscape info, Height Map, Textures, Forests, GUI Map, Season you need to select an appropriate matching set in the Mission editor.<br>\n"; 
					echo "In the Mission Editor file menu, save as giving it a name for the campaign plus\"_template\" and placing it in the /data/Multiplayer/Dogfight/ directory.<br>\n";
					
					
					echo "<p>Next we have  to tell which map was chosen to our campaign manager so select the map button you have chosen:</p>\n";	
								
					echo "	<fieldset id=\"inputs\">\n";
					echo "		<h3>Campaign Map</h3>\n";
					echo "		<select name=\"newCampStatus\" id=\"database\">\n";
					# the input from here will update the campaign fields in cam_param or campaign_statistics whatever
					# SELECT MAP
					include 'includes/getCampaignMap.php'; 
					echo "		</select>\n";
					echo "	</fieldset>\n";
										
					/*
					echo '<br>Select Campaign Map<br>';
					echo '<br>Western Front :Button: <br>';
					echo '<br>Channel :Button:<br>';
					echo '<br>df3x3lake :Button:<br>';
					echo '<br>df5x5verdun :Button:<br>';
					*/
					
					
					echo "<p>We will now populate our map with airfields. In the mission editor select Import from file, go to:<br>\n";
					echo "<b>directory /data/Template/</b><br>\n";
					echo "Select the base-no-trunc file that corresponds to your map. <br>\n";
					echo "The Western front map uses Base-no-trunc the Channel map uses base-no-trunc-channel the dogfight maps have merged base files. <br>\n";
					echo "Loading in these files can take a while, patience. </p>\n";
					
					echo "<p>We now need to define who is fighting who. So back in the Mission editor, Mission Properties, click on Countries.<br>\n";
					echo "Our Campaign manager has been designed to create a war between two coalitions, Allies and Central Powers.<br>\n";
					echo "While it is possible to configure other theoretical alliances like \"War dogs\" and \"Mercenaries\"<br>\n";
					echo "We did not design or test any options other than Allies and Central Powers so allocate the real countries to either coalition and ignore the rest.<br>\n";
					echo "In the Mission Editor you should use the file menu, save before coming back here to inform your Campaign Manager of the choice.</p>\n";
					
					echo "	<fieldset id=\"inputs\">\n";
					# The input from this section will update the countries/coalition table for the campaign
					# SELECT COUNTRY - CHOOSE COALITION
					include 'includes/getCountriesForCoalitionSet.php';
					echo "	</fieldset>\n";
					
					/*
					echo '<br>Coalitions....... : Allies : Central Powers<br>';
					echo '<br>France........... : Button : Button :<br>';
					echo '<br>Great Britain.... : Button : Button :<br>';
					echo '<br>USA.............. : Button : Button :<br>';
					echo '<br>Italy............ : Button : Button :<br>';
					echo '<br>Russia........... : Button : Button :<br>';
					echo '<br>Germany.......... : Button : Button :<br>';
					echo '<br>Austro-Hungary... : Button : Button :<br>';
					*/
					
					echo "<p>Next, back to the Mission editor. Make sure you are in 2D editing mode by clicking on the Arrow down ikon key at the left hand side of 
					the tool bar which you normally find at the top of the screen. It is in-between the ruler icon and the F icon.<br>\n";
					echo "You can zoom in and out using the scroll on your mouse and drag the map around holding the right mouse click.<br>\n";
					echo "The campaign maps (as opposed to the dogfight maps) are very big. If you populate the complete map with objects 
					you will probably run into performance problems in a large scale multi user mission. So we will define a sector 
					of the map within which to run our campaign. Note when you zoom in and zoom out in the editor down near the bottom right there is a value \"Grid(M)\".
					This is the size in metres of the white grid squares which will give you an idea of the scale of your map on screen.<br>\n";
					echo "To define the sector of the map we want to use we will need the bottom left and top right of a rectangle. <br>\n";
					echo "There are three dimensions to the map X is from the bottom to the top, Y is Height and Z is left to right.<br>\n"; 
					echo "Down near the bottom right of the editor you also have the X and Z values of the mouse position. So choose where you want the bottom left
					of the sector and note the X and Z values then the same for the top right of the sector.<br>\n";
					echo "Return to the Campaign manager and enter the values here. </p>\n";
					
					include ('includes/getMinMaxXZ.php');
					
					/*  
					echo '<br>Bottom left X value :000000000.00:<br>';
					echo '<br>Bottom left Z value :000000000.00:<br>';
					echo '<br>Top right X value :000000000.00:<br>';
					echo '<br>Top right Z value :000000000.00:<br>';
					
					echo '<br>BIG UPDATE BUTTON:<br>';
					echo '<br>We have now created the key parameters for the campaign so if you are happy with your inputs clich the nice big Update Button<br>';
					*/
					
					# BUTTON	
					echo "<fieldset id=\"actions\">\n";
					echo "		<button type=\"submit\" name =\"updateCampaignParameters\" id=\"loginSubmit\" value =\"1\" >Apply Configuration</button>\n";	# the value defines the action after the button was pressed
					echo "	</fieldset>\n";
					
					echo "<p>Next we will start to refine our campaign template<br>";
					# the input from here will update the campaign fields in cam_param or campaign_statistics whatever
					echo "<p>Return to the Mission editor. We now want to save just the objects that are in our sector. On the top icon bar is a button for \"OBJ FILT\" select that and make sure to \"Select All\" then OK.
					Using left mouse button drag from bottom left of our sector to top right of our sector. This will highlight all objects in our sector.
					Next File, Save selection to File, select /data/Multiplayer/Dogfight/ and save the file as campaign_name-no-trunc.
					A single left mouse click unselects. Now go to the Search and Select menu, Select All Objects in Mission and press the delete key on your keyboard. There will be a pause, patience and all the airfields etc. will dissapear.
					We can now load back in only those objects that were in our sector with File, Import from File, select /data/Multiplayer/Dogfight/ and load the file campaign_name-no-trunc.
					You should now have just the airfields in your sector plus some towns or stuff. File, Save to make sure we do not lose this.
					</p>\n";
					echo "<p>Our next step in the creation of the campaign template is to decide which Airfields will be active. Again, for performance reasons 
					we do not want every airfield in our sector to be active. So chose 3-4 for each side.
					Go back to the OBJ FILT button at the top, Clear all, then click on just Airfield, OK. Now on the map you see only airfields.
					Left Mouse Click on or box round a Central Powers airfield to highlight it. You should now have the Airfield Properties displayed. Left mouse click \"Create Linked Entity\" to declare it as an active airfield then click the > on the right of the Name: which will give you the Airfield advanced properties.
					Here set the Country: (Probably Germany?) and OK.
					Next do the same for an Allied airfield setting the Country to one of the Allied Countries.
					Continue till all active airfields are set.</p>\n";
					
					echo "<p>Next we are going to send the information  about all these airfields to our Campaign Manager. In Preparation for this you should create a directory somewhere on your computer where we will place all the .Group files which will be exchanged between the Mission Editor and the Campaign Manager for this campaign. You may be running several campaigns in parallel so make it unique to the campaign. Otherwise there will be confusion between the campaigns.
					Once ready select all the airfields then File, Save selection to File, select our campaign directory and save to the filename \"template_to_airfield.Group\".</p>\n";
					
					echo "<p>We can now load this group file into our Campaign Manager by clicking on the \"Template to Airfields\" big Button.</p>\n";
					
					# This launches inbox.sql then inbox_to_airfield
					# BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" name =\"updateCampaignParameters\" id=\"loginSubmit\" value =\"2\" >Template to Airfields</button>\n"; # the value defines the action after the button was pressed
					echo "	</fieldset>\n";
					
					echo "<p>If the airfields load in to the Campaign manager has worked correctly we can now return to the Mission Editor and 
					delete all airfields from our template and again save the template. From this point forwards in the campaign before each mission the campaign manager
					will populate the active airfields with the right quantity and type of aircraft, manage activation de-activation or capture and send a .Group file to the Mission Editor for the assembly of each mission.</p>\n";
					# after this point will be added the population of bridges into the template grouping and send to the Campaign Manager 
					# again they will be managed in the Campaign manager an sent to the Mission Editor for assembly into each mission.  



# TUSHKAS Proposals - please move to appropriate place at your convenience
# reset variable in  case they are empty
if (empty($kia_pilot)) {
	 $kia_pilot= 0;
}
if (empty($mia_pilot)) {
	 $mia_pilot= 0;
}
if (empty($cw_pilot)) {
	 $cw_pilot= 0;
}
if (empty($sw_pilot)) {
	 $sw_pilot= 0;
}
if (empty($lw_pilot)) {
	 $lw_pilot= 0;
}
if (empty($kia_gunner)) {
	 $kia_gunner= 0;
}
if (empty($cw_gunner)) {
	 $cw_gunner= 0;
}
if (empty($sw_gunner)) {
	 $sw_gunner= 0;
}
if (empty($lw_gunner)) {
	 $lw_gunner= 0;
}
if (empty($dst_airActGrnd)) {
	 $dst_airActGrnd= 0;
}
if (empty($dst_GndActGrnd)) {
	 $dst_GndActGrnd= 0;
}
if (empty($lvl_AIAc)) {
	 $lvl_AIAc= 2;
}
if (empty($lvl_AIGrnd)) {
	 $lvl_AIGrnd= 2;
}
if (empty($spd_maxGrnd)) {
	 $spd_maxGrnd= 50;
}
if (empty($spd_maxTrnspt)) {
	 $spd_maxTrnspt= 10;
}
if (empty($sprd_suplPnts)) {
	 $sprd_suplPnts= 5;
}
if (empty($time_lineup)) {
	 $time_lineup= 30;
}
if (empty($time_msn)) {
	 $time_msn= 90;
}
if (empty($time_actvtUnit)) {
	 $time_actvtUnit= 15;
}

# create the input form
echo "	<fieldset id=\"inputs\">\n";
echo "		<h2>Player Values Settings</h2>\n";
echo "		<h3>set kia_pilot</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"kia_pilot\" value='$kia_pilot' autofocus ><br>\n";
echo "		<h3>set mia_pilot</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"mia_pilot\" value='$mia_pilot' autofocus ><br>\n"; 
echo "		<h3>set critical_w_pilot</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"cw_pilot\" value='$cw_pilot' autofocus ><br>\n"; 
echo "		<h3>set serious_w_pilot</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"sw_pilot\" value='$sw_pilot' autofocus ><br>\n";
echo "		<h3>set light_w_pilot</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"lw_pilot\" value='$lw_pilot ' autofocus ><br>\n";
echo "		<h3>set kia_gunner</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"kia_gunner\" value='$kia_gunner' autofocus ><br>\n";
echo "		<h3>set critical_w_gunner</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"cw_gunner\" value='$cw_gunner' autofocus ><br>\n";
echo "		<h3>set critical_w_gunner</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"sw_gunner\" value='$sw_gunner' autofocus ><br>\n";
echo "		<h3>set light_w_gunner</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"lw_gunner\" value='$lw_gunner' autofocus ><br>\n";
# BUTTON
echo "<fieldset id=\"actions\">\n";	
echo "		<button type=\"submit\" name =\"updateCampaignParameters\" id=\"loginSubmit\" value =\"3\" >Update Scores</button>\n"; # the value defines the action after the button was pressed
echo "	</fieldset>\n";

echo "		<h2>Mission Tuning Settings</h2>\n";
echo "		<h3>set air_detect_distance in meters</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"dst_airActGrnd\" value='$dst_airActGrnd' autofocus ><br>\n";
echo "		<h3>set ground_detect_distance in meters</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"dst_GndActGrnd\" value='$dst_GndActGrnd' autofocus ><br>\n";
echo "		<h3>set AI Air level</h3>\n";
echo "		<select name=\"lvl_AIAc\" id=\"database\">\n";
echo "			<option value=\"$lvl_AIAc\" disabled selected>Select Air AI level</option>\n";
echo "			<option value=\"1\">1</option>\n";
echo "			<option value=\"2\">2</option>\n";
echo "			<option value=\"3\">3</option>\n";
echo "		</select><br>\n";
echo "		<h3>set AI Ground level</h3>\n";
echo "		<select name=\"lvl_AIGrnd\" id=\"database\">\n";
echo "			<option value=\"$lvl_AIGrnd\" disabled selected>Select Ground AI level</option>\n";
echo "			<option value=\"1\">1</option>\n";
echo "			<option value=\"2\">2</option>\n";
echo "			<option value=\"3\">3</option>\n";
echo "		</select><br>\n";

echo "		<h3>set ground_max_speed km/h</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"spd_maxGrnd\" value='$spd_maxGrnd' autofocus ><br>\n";
echo "		<h3>set ground_transport_speed in km/h</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"spd_maxTrnspt\" value='$spd_maxTrnspt' autofocus ><br>\n";
echo "		<h3>set ground_spacing</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"sprd_suplPnts\" value='$sprd_suplPnts' autofocus ><br>\n";
echo "		<h3>set lineup_minutes</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"time_lineup\" value='$time_lineup' autofocus ><br>\n";
echo "		<h3>set mission_minutes</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"time_msn\" value='$time_msn' autofocus ><br>\n";
echo "		<h3>set detect_off_time</h3>\n";
echo "		<input id=\"database\" type=\"text\" name=\"time_actvtUnit\" value='$time_actvtUnit' autofocus ><br>\n";
echo "	</fieldset>\n"; 

# BUTTON
echo "<fieldset id=\"actions\">\n";	
echo "		<button type=\"submit\" name =\"updateCampaignParameters\" id=\"loginSubmit\" value =\"4\" >Update settings</button>\n"; # the value defines the action after the button was pressed
echo "	</fieldset>\n";

					echo "</form>\n";
                ?>
            
            </div>
    
        </div>

		<?php
            # Include the general sidebar
            include ( 'includes/sidebar.php' );
        ?>	

		<div id="clearing"></div>
	</div>

<?php
	# Include the footer
	include ( 'includes/footer.php' );
?>
