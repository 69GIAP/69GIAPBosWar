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
		
					if ($result = $dbc->query($query)) {
						/* fetch associative array */
						while ($obj = $result->fetch_object()) {
							$campaign	=($obj->campaign);
							$camp_host	=($obj->camp_host);
							$camp_user	=($obj->camp_user);
							$camp_passwd=($obj->camp_passwd);
							$camp_status_id=($obj->status);
							
							# get campaign status
							$sql="SELECT campaign_status FROM campaign_status where id = $camp_status_id";
							if ($result = $dbc->query($sql)) {
							/* fetch associative array */
							while ($obj = $result->fetch_object()) {
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
					
					echo "<br>This is a job for the campaign administrator who should have basic skills in the Mission Editor.<br>\n";
					echo "<br>By this point you have logged in with administrator rights, chosen a campaign name, created a campaign database and connected to that campaign database.<br>\n";
					echo "<br>Now that you are connected directly to your new campaign database it is time to configure it.<br>\n";
					echo "<br>There are two types of settings we need to configure - those that are not set in the mission editor, and those that are.  We start with those that are are not set in the editor.  These are set either here in the campaign database alone, or both here and in the game multiplayer options.<br />\n";
					echo "<br>We have tried to provide sensible defaults, but you may tweak these to fit your campaign and setup.<br />\n";

// include getandsetCampaignSettings.php
include ('includes/getandsetCampaignSettings.php');

					echo "<br>Next we work on setting up the campaign in the mission editor.<br />\n";
					echo "<br>You can open the Mission Editor in a separate window to help this process - OK<br>\n";
					
					echo "<p>First we define the map upon which the campaign will be run in the Mission editor.</p>\n";
					echo "<p>In the Mission Editor choose file menu, New, right click with mouse on map and select Properties. This will open the mission properties window.<br>\n";
					echo "Enter a name for the mission, preferably the same as that you chose for the campaign. Avoid special characters, do not make it a pure numeric start with an alpha character and be consistent in use of upper and lower case.<br>\n";
					echo "Mission type should be Deathmatch.</p>\n";
					
					echo "<p>Now we must select the Map. Currently in ROF there are two main campaign maps, the <b>Western Front map</b> and the <b>Channel map</b>. 
					Then there are also two small dogfight maps: <b>df3xlake</b> and <b>df5x5verdun</b>.<br>\n";
					echo "For Landscape info, Height Map, Textures, Forests, GUI Map, Season you need to select an appropriate matching set in the Mission editor.<br>\n"; 
					echo "In the Mission Editor file menu, save as giving it a name for the campaign plus\"_template\" and placing it in the /data/Multiplayer/Dogfight/ directory.<br>\n";
					
					
//					echo "<p>Next we have  to tell which map was chosen to our campaign manager so select the map button you have chosen:</p>\n";	
//								
//					echo "	<fieldset id=\"inputs\">\n";
//					echo "		<h3>Campaign Map</h3>\n";
//					echo "		<select name=\"newCampStatus\" id=\"database\">\n";
//					# the input from here will update the campaign fields in cam_param or campaign_statistics whatever
//					# SELECT MAP
//					include 'includes/getCampaignMap.php'; 
//					echo "		</select>\n";
//					echo "	</fieldset>\n";
										
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
//					echo "In the Mission Editor you should use the file menu, save before coming back here to inform your Campaign Manager of the choice.</p>\n";
					
//					echo "	<fieldset id=\"inputs\">\n";
//					# The input from this section will update the countries/coalition table for the campaign
//					# SELECT COUNTRY - CHOOSE COALITION
//					include 'includes/getCountriesForCoalitionSet.php';
//					echo "	</fieldset>\n";
					
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
echo "<p><b><font color=\"red\">NEED INSTRUCTIONS ON CONFIGURING INFLUENCE AREAS</font></b></p>\n";
?>
<p>Instructions on configuring influence areas from SC/JG_Oesau in the Rise of Flight forums:<br />
- Select the Influence Area<br />
- Right click on Influence Area and select "Selected Object Menu"<br />
- Select "Edit Influence Area"<br />
- you will note a yellow circle at one end of the triangle, you can then move the end of the influence area<br />
- To select other ends to edit, double click on each end<br />
- To end the edit, right click on Influence Area and select "Selected Object Menu"<br />
- Select "Stop Editing Boundary"</p>
<p>And SYN_Vander adds:<br />
And with CTRL+mouse click you can add more points...</p>


<?php
					echo "To define the sector of the map we want to use we will need the bottom left and top right of a rectangle. <br>\n";
					echo "There are three dimensions to the map X is from the bottom to the top, Y is Height and Z is left to right.<br>\n"; 
					echo "Down near the bottom right of the editor you also have the X and Z values of the mouse position. So choose where you want the bottom left
					of the sector and note the X and Z values then the same for the top right of the sector.<br>\n";
//					echo "Return to the Campaign manager and enter the values here. </p>\n";
//					
//					include ('includes/getMinMaxXZ.php');
					
					/*  
					echo '<br>Bottom left X value :000000000.00:<br>';
					echo '<br>Bottom left Z value :000000000.00:<br>';
					echo '<br>Top right X value :000000000.00:<br>';
					echo '<br>Top right Z value :000000000.00:<br>';
					
					echo '<br>BIG UPDATE BUTTON:<br>';
					echo '<br>We have now created the key parameters for the campaign so if you are happy with your inputs clich the nice big Update Button<br>';
					*/
					
					# BUTTON	
//					echo "<fieldset id=\"actions\">\n";
//					echo "		<button type=\"submit\" name =\"updateCampaignParameters\" id=\"loginSubmit\" value =\"1\" >Apply Configuration</button>\n";	# the value defines the action after the button was pressed
//					echo "	</fieldset>\n";
					
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

					echo "</form>\n";

					// close $camp_link
					$camp_link->close();
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
    // close $dbc
	$dbc->close();
	# Include the footer
	include ( 'includes/footer.php' );
?>
