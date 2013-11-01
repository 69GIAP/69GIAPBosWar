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

					# include getCampaignVariables.php
					include ( 'includes/getCampaignVariables.php' );
	
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					# initialise variables
					echo "<h1>Setup/Initialize $campaign Campaign</h1>";
					# start form
					echo "<form id=\"campaignMgmtSetupForm\" name=\"campaignSetup\" action=\"CampaignMgmtSetupConfirm.php?btn=campMgmt\" method=\"post\">\n";
					
					
					echo "<h3>Preliminaries</h3>\n";
					echo "<p>You should create a directory somewhere on your computer where we will place all the template and .Group files which will be exchanged between the mission editor and the BOSWAR campaign manager for this campaign.<br /> You may be running multiple campaigns in parallel so make it unique to the campaign, e.g. $campaign-groups.<br /> Otherwise there could be confusion between the campaigns.<br /> We will refer to this directory as your \"campaign groups directory\".</p>\n";
					echo "<p>In the BOSWAR campaign manager (while connected to your campaign ($campaign), select \"User Management\" from the upper menu bar.<br /> Scroll down to \"Choose the default folder for your Group Files:\" and enter the full path and folder name there, then click \"Save\".  Ignore the trailing slash.</p>\n";
					echo "<br>Next we work on setting up the campaign in the mission editor.<br />\n";
					echo "<br>You can open the mission editor in a separate window to carry out this process.<br>\n";
					echo "<p>To start a new mission click 'File' and 'New' in the upper left.</p>\n";
					echo "<p>If the 'Mission Properties' window is not open, right click with your mouse on the map and select Properties. This will open the 'Mission Properties' window.</p>\n";
 
					echo "<p>Enter a name for the mission, preferably the same as that you chose for the campaign ($campaign). Avoid special characters, preferably start with an alpha character and be consistent in use of upper and lower case.</p>\n";
					
					echo "<h3>The Campaign Map</h3>\n";
					echo "<p>Now we must select the Map. Currently in ROF there are two main campaign maps, the <b>Western Front map (05.01.18, etc)</b> and the <b>Channel map</b>.  Then there are also two small dogfight maps: <b>df3xlake</b> and <b>df5x5verdun</b>.</p>\n";
					echo "<p>Select whichever GUI map and season best suits your campaign.</p>\n";
					echo "<p>Then for Landscape info, Height Map, Textures, and Forests you need to select an appropriate matching set in the mission editor.<br>\n"; 
					$campaign_template = "$campaign"."_template";
					echo "<p>In the mission editor File menu, select 'Save As...', giving it a file name for the campaign plus\"_template\" (e.g. $campaign_template.Mission) and saving it to your campaign groups directory.</p>\n";
					// we should be able to determine the map from the GuiMap line in the Options section of the Mission file... just a SMOP.  :)
					/*
					echo "<p>Next we have  to tell which map was chosen to our campaign manager so select the map button you have chosen:</p>\n";	
								
					echo "	<fieldset id=\"inputs\">\n";
					echo "		<h3>Campaign Map</h3>\n";
					echo "		<select name=\"newCampStatus\" id=\"database\">\n";
					# the input from here will update the campaign fields in cam_param or campaign_statistics whatever
					# SELECT MAP
					include 'includes/getCampaignMap.php'; 
					echo "		</select>\n";
					echo "	</fieldset>\n";
										
					echo '<br>Select Campaign Map<br>';
					echo '<br>Western Front :Button: <br>';
					echo '<br>Channel :Button:<br>';
					echo '<br>df3x3lake :Button:<br>';
					echo '<br>df5x5verdun :Button:<br>';
					*/

					echo "<h3>The Opposing Sides</h3>\n";
					echo "<p>We now need to define who is fighting whom. So back in the mission editor in 'Mission Properties', click on 'Countries'.</p>\n";
					echo "<p>Our BOSWAR campaign manager has been designed to create a war between two coalitions, e.g. Allies (Entente) and Central Powers.<br>\n";
					echo "While it is possible to configure other theoretical alliances like \"War dogs\" and \"Mercenaries\"<br>\n";
					echo "We did not design or test any options other than Allies (Entente) and Central Powers so allocate the real countries to either coalition and ignore the rest.<br>\n";
					echo "In the mission editor you should use the File menu, Save, before coming back here.</p>\n";
					
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
					
					echo "<h3>Import the infrastructure</h3>\n";
					echo "<p>We will now populate our template with all defined infrastructure (including, most importantly, the airfields).</p>\n" ;
					echo "<p>In the mission editor 'File' menu select 'Import From File...', go to: <b>directory /data/Template/</b></p>\n";
					echo "<p>Select the base-no-trunc file that corresponds to your map. </p>\n";
					echo "<p>The Western front map uses Base-no-trunc the Channel map uses base-no-trunc-channel the dogfight maps have merged base files. \n";
					echo "Loading in these files can take a while, be patient. Refresh your beverage, relieve yourself, check the forums, watch several yourtube videos, and generally wait until the 'Please wait until operation is finished' popup disappears. If the load hangs near the end, quit and reload the file which should now be a quick process.</p>\n";
					echo "<p>Save the mission before continuing.</p>\n";
					
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
					echo "<h3>Define the Influence Areas</h3>\n";
					echo "<p>Next, go into 2D editing mode by clicking on the Arrow down icon key at the left hand side of 
					the tool bar which you normally find at the top of the screen. It is in-between the ruler icon and the F icon.<br>\n";
					echo "You can zoom in and out using the scroll on your mouse and drag the map around holding the right mouse click.<br>\n";
					echo "The campaign maps (as opposed to the dogfight maps) are very big. If you populate the complete map with objects 
					you will probably run into performance problems in a large scale multi user mission.  To avoid such problems we will define a smaller sector 
					of the map within which to run our campaign. Note when you zoom in and zoom out in the editor down near the bottom right there is a value \"Grid(M)\".
					This is the size in metres of the white grid squares which will give you an idea of the scale of your map on screen.</p\n";

?>
<p>We will now define the influence areas for our campaign.</p>
<p>The simplest case is two influence areas... one for each opposing side, and that is what we will go through here, but we also support multiple influence areas should you wish to use them. The combat area includes all defined influence areas.  Areas that are outside of defined influence areas are deemed neutral.</p>

<p>To define the first influence area:<br \>
* select the ">>MCUs<<" box in the upper right of the mission editor.<br />
* Scroll down the list and select "Translator:Influence Area".<br \>
* Left click to place this on the map within the area you have choosen to be, say, German territory.<br />
* Select the influence area icon with another left click.<br />
* Right click on the influence area icon and select "Selected Object Menu".<br />
* Select "Edit Influence Area".<br />
* This will create a blue triangle with a yellow circle at one apex which you can drag with your mouse (holding down the left mouse button) to move the end of the influence area.<br />
* To select another end to edit, double click on that end.<br />
* You will probably want at least one more corner to form a trapezoid.<br />
* To add another point to move, use CTRL+left mouse click on a boundary line.<br />
* Note that the boundary of an influence area should not cross itself.<br />
* Move the ends to form a boundary around the area you want to define.<br />
* To stop editing, right click on the influence area and select "Selected Object Menu".<br />
* Select "Stop Editing Boundary".</p>

<p>To set ownership of the influence area:<br />
* Right click on the influence area and select "Advanced Properties..."<br /> 
* select the country you want to be the owner of this area (e.g. Germany)<br />
* click "OK".
* Left click outside the influence area to unselect it.</p>

<p>Repeat this process to define the opposing side's influence area(s).</p>
<?php
/*
					echo "To define the sector of the map we want to use we will need the bottom left and top right of a rectangle. <br>\n";
					echo "There are three dimensions to the map X is from the bottom to the top, Y is Height and Z is left to right.<br>\n"; 
					echo "Down near the bottom right of the editor you also have the X and Z values of the mouse position. So choose where you want the bottom left
					of the sector and note the X and Z values then the same for the top right of the sector.<br>\n";
*/

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
					
					echo "<p>Save the mission before continuing.</p>\n";

					echo "<h3>Refine the Template</h3>\n";
					echo "<p>Next we will start to refine our campaign template<br>";
					# the input from here will update the campaign fields in cam_param or campaign_statistics whatever
					echo "<p>We now want to save <b>just</b> the objects that are in our sector.</p> 
					<p>On the top icon bar is a button for the object filter abbreviated as \"OBJ FILT\".  Select that, then \"Select All\" then select \"OK\".</p>
					<p>Click the bottom left of the influence areas and holding the left mouse button drag from bottom left of our sector to top right of our sector. This will highlight all objects in our sector.  Be sure this includes all the defined influence areas.  Better to be slightly generous than slightly stingy here.</p>";
					echo "<p>Next in the File menu, select \"Save selection to File\", select /data/Multiplayer/Dogfight/ and save the file as campaign_name-no-trunc (e.g. $campaign-no-trunc.Group).</p>
							<p>Left click outside the area to unselect it.</p>
						   	<p>Now go to the \"Search and Select\" menu, select \"Select All Objects in Mission\" and press the \"Delete\" key on your keyboard. There will be a pause (have patience) and all the airfields etc. will disappear.</p>
					<p>We can now load back in only those objects that were in our sector with File, Import from File, select /data/Multiplayer/Dogfight/ and load the file campaign_name-no-trunc (e.g. $campaign-no-trunc.Group).
					You should now have just the airfields in your sector plus some towns or stuff.</p> 
					<p>File, Save to make sure we do not lose this!</p>\n";

					echo "<h3>Activate Select Airfields</h3>\n";
					echo "<p>Our next step in the creation of the campaign template is to decide which Airfields will be active. Again, for performance reasons 
					we do not want every airfield in our sector to be active. So chose 3-4 for each side.
					Go back to the OBJ FILT button at the top, Clear all, then click on just Airfield, OK. Now on the map you see only airfields.
					Left Mouse Click on or box round a Central Powers airfield to highlight it. You should now have the Airfield Properties displayed. Left mouse click \"Create Linked Entity\" to declare it as an active airfield then click the > on the right of the Name: which will give you the Airfield advanced properties.
					Here set the Country: (Probably Germany?) and OK.
					Next do the same for an Allied airfield setting the Country to one of the Allied Countries.
					Continue till all active airfields are set.</p>\n";
					
					echo "<p>Next we are going to send the information  about all these airfields to our BOSWAR campaign manager.  Once ready select all the airfields then File, Save selection to File, select your campaign groups directory and save to the filename \"template_to_airfield.Group\" (e.g. .</p>\n";
					
					echo "<p>We can now load this group file into our Campaign Manager by clicking on the \"Template to Airfields\" big Button.</p>\n";
					
					# This launches inbox.sql then inbox_to_airfield
					# BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" name =\"updateCampaignParameters\" id=\"loginSubmit\" value =\"2\" >Template to Airfields</button>\n"; # the value defines the action after the button was pressed
					echo "	</fieldset>\n";
					
					echo "<p>If the airfields load into the BOSWAR campaign manager correctly we can now return to the mission editor and 
					delete all airfields from our template and again save the template. From this point forwards in the campaign before each mission the BOSWAR campaign manager
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
