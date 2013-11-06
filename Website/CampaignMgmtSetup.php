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
					echo "<h1>$campaign Campaign Mission Editor Setup</h1>";
					$query = "SELECT * from campaign_settings;";
					if(!$result = $dbc->query($query)) {
						die('CampaignMgmtSetup.php query error [' . $dbc->error . ']');
					}
		
					if ($result = $dbc->query($query)) {
						/* fetch associative array */
						while ($obj = $result->fetch_object()) {
								$map=($obj->map);
						}
					}
					$result->free();

					# start form
					echo "<form id=\"campaignMgmtSetupForm\" name=\"campaignSetup\" action=\"CampaignMgmtSetupConfirm.php?btn=campMgmt\" method=\"post\">\n";

					echo "<p>This is a job for the campaign administrator who should have basic skills in the Mission Editor, but don't worry.  We will lead you step-by-step.</p>\n";

					
					echo "<h3>Preliminaries</h3>\n";

					echo "<p>You should create a directory somewhere on your computer where we will place any .Mission template and .Group files which will be exchanged between the mission editor and the BOSWAR campaign manager for this campaign.<br />
						You may be running multiple campaigns in parallel it must be unique to the campaign.  Otherwise there could be confusion between the campaigns.<br />
						Name this directory: <b>$abbrv-groups</b>.<br />
						We will refer to this directory as your \"campaign groups directory\".</p>\n";

					/*
					echo "<p>In the BOSWAR campaign manager (while connected to your campaign ($campaign), select \"User Management\" from the upper menu bar.<br /> Scroll down to \"Choose the default folder for your Group Files:\" and enter the full path and folder name there, then click \"Save\".  Ignore the trailing slash.</p>\n";
					 */

					echo "<p>Next we work on setting up the campaign in the mission editor.</p>\n";
					echo "<p>You can open the mission editor in a separate window to carry out this process.</p>\n";
					echo "<p>To start a new mission click 'File' and 'New' in the upper left.</p>\n";
					echo "<p>If the \"Mission Properties\" window is not open, right click with your mouse on the map and select \"Properties\". This will open the \"Mission Properties\" window.</p>\n";
 
					echo "<p>Enter a name for the mission, preferably using or including your campign abbreviation ($abbrv). Avoid special characters and be consistent in use of upper and lower case.  Filenames are case-sensitive.</p>\n";
					
					echo "<h3>The Campaign Map</h3>\n";

					echo "<p>You selected the $map map when you configured the $campaign campaign.</p>\n";  
					echo "<p>Now we must select this map in the mission editor.</p>\n";
					if($map == 'Western Front') {
						echo "<p>In the mission editor the 'Western Front' GUI map has three versions: winter (05.01.1918), spring/summer (15.07.1918) and autumn (19.10.1918).</p>\n";
						echo "<p>Select one of these GUI maps and a matching season for your campaign.</p>\n";
					} elseif($map == 'Channel') {
						echo "<p>In the mission editor the 'Channel' GUI map has a single version: channel_summer</p>\n";
						echo "<p>Select it and a matching season for your campaign.</p>\n";
					} elseif($map == 'Verdun') {
						echo "<p>In the mission editor the 'Verdun' GUI map has three versions: autumn (df5x5verdun_autumn), summer (df5x5verdun_summer) and winter (df5x5verdun_winter).</p>\n";
						echo "<p>Select one of these GUI maps and a matching season for your campaign.</p>\n";
					} elseif($map == 'Lake') {
						echo "<p>In the mission editor the 'Lake' GUI map has three versions: autumn (df3x3lake_autumn), summer (df3x3lake_summer) and winter (df3x3lake_winter).</p>\n";
						echo "<p>Select one of these GUI maps and a matching season for your campaign.</p>\n";
					} else {
						echo "<p>We have not yet completed a locations file for the $map map.</p>\n";
					}
					echo "<p>Then for Landscape info, Height Map, Textures, and Forests you need to select an appropriate matching set.</p>\n"; 
					echo "<p>In the mission editor File menu, select 'Save As...', giving it the file name  <b>$abbrv-template.Mission</b> and saving it to your $abbrv-groups directory.</p>\n";
					// we should be able to determine the map from the GuiMap line in the Options section of the Mission file... just a SMOP.  :)

					echo "<h3>The Opposing Sides</h3>\n";

					echo "<p>We now need to define who is fighting whom. So back in the mission editor select 'Mission Properties' and click on 'Countries'.</p>\n";
					echo "<p>Our BOSWAR campaign manager has been designed to create a war between two coalitions, e.g. Allies (Entente) and Central Powers.<br>\n";
					echo "While it is possible to configure other theoretical alliances like \"War dogs\" and \"Mercenaries\" we did not design or test any options other than Allies (Entente) and Central Powers; so allocate the real countries to either coalition and ignore the rest.<br>\n";
					echo "In the mission editor you should use the File menu, Save, before coming back here.</p>\n";
					
					
					echo "<h3>Import the infrastructure</h3>\n";

					echo "<p>We will now populate our template with all defined infrastructure (including, most importantly, the airfields).</p>\n" ;
					echo "<p>In the mission editor 'File' menu select 'Import From File...', go to: <b>directory /data/Template/</b></p>\n";
					echo "<p>Select the base-no-trunc file that corresponds to your map. </p>\n";
					echo "<p>The Western front map uses Base-no-trunc the Channel map uses base-no-trunc-channel the dogfight maps have merged base files. \n";
					echo "Loading in these files can take a while, be patient. Refresh your beverage!  Wait until the 'Please wait until operation is finished' popup disappears. If the load hangs near the end, quit and reload the file which should now be a quick process.</p>\n";
					echo "<p>Save the (now much larger) template mission before continuing.</p>\n";
					
					echo "<h3>Define the Influence Areas</h3>\n";

					echo "<p>Next, go into 2D editing mode by hitting F9 or by clicking on the Arrow down icon key at the left hand side of 
					the tool bar which you normally find at the top of the screen. It is in-between the ruler icon and the F icon.<br>\n";
					echo "You can zoom in and out using the scroll on your mouse and drag the map around holding the right mouse click.<br>\n";
					echo "The campaign maps (as opposed to the dogfight maps) are very big. If you populate the complete map with objects 
					you will probably run into performance problems in a large scale multi user mission.  To avoid such problems we will define a smaller sector 
					of the map within which to run our campaign. Note when you zoom in and zoom out in the editor down near the bottom right there is a value \"Grid(M)\".
					This is the size in metres of the white grid squares which will give you an idea of the scale of your map on screen.</p>\n";

					echo "<p>We will now define the influence areas for our campaign.</p>\n";
?>
<p>The simplest case is two influence areas... one for each opposing side, and that is what we will go through here, but we also support multiple influence areas should you wish to use them. The combat area includes all defined influence areas.  Areas that are outside of defined influence areas are deemed neutral.</p>

<p>To define the first influence area:<br \>
* select the ">>MCUs<<" box in the upper right of the mission editor.<br />
* Scroll down the list and select "Translator:Influence Area".<br \>
* Left click to place this on the map within the area you have choosen to be, say, German territory.<br />
* Select the influence area icon with another left click.<br />
* Right click on the influence area icon and select "Selected Object Menu".<br />
* Select "Edit Influence Area".<br />
* This will create a blue triangle with a yellow circle at one apex which you can drag with your mouse (holding down the left mouse button).<br />
* To select another end to edit, double click on that end.<br />
* You will probably want at least one more corner to form a trapezoid.  (Try to use no more than 6-8 corners per area.  More complex areas may cause performance problems.)<br />
* To add another point to move, use CTRL+left mouse click on a boundary line that is attacked to the yellow circle.<br />
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
			
			echo "<p>Save the template mission before continuing.</p>\n";

			echo "<h3>Refine the Template</h3>\n";

			echo "<p>Next we will start to refine our campaign template.<br>";
			echo "<p>We now want to save <b>just</b> the objects that are in our sector.</p> 
			<p>On the top icon bar is a button for the object filter abbreviated as \"OBJ FILT\".  Select that, then \"Select All\" then select \"OK\".</p>
			<p>Click the bottom left of the influence areas and holding the left mouse button drag from bottom left of our sector to top right of our sector. This will highlight all objects in our sector.  Be sure this includes all the defined influence areas.  Better to be slightly generous than slightly stingy here.</p>";
			echo "<p>Next in the File menu, select \"Save selection to File\", navigate back to your $abbrv-groups directory, give this file the File Name <b>$abbrv-no-trunc.Group</b>, and as type Mission Files, and click \"Save\".</p>
					<p>Left click outside the area to unselect it.</p>
					<p>Now go to the \"Search and Select\" menu, select \"Select All Objects in Mission\" and press the \"Delete\" key on your keyboard. There will be a pause (have patience) and all the airfields etc. will disappear.</p>
			<p>We can now load back in only those objects that were in our sector with File, Import from File, select /data/Multiplayer/Dogfight/ and load the file $abbrv-no-trunc.Group.
			You should now have just the airfields in your sector plus some towns or stuff.</p> 
			<p>File, Save to make sure we do not lose this!</p>\n";

			echo "<h3>Activate Select Airfields</h3>\n";

			echo "<p>The next step in the creation of the campaign template is to decide which Airfields will be active. Again, for performance reasons we do not want every airfield in our sector to be active. So chose 3-4 for each side.</p>\n";
			echo "<p>Go back to the object filter (OBJ FILT button) at the top, Clear all, then click on Airfield and OK.  Now on the map you should see airfields only.</p>\n";
			echo "<p>Left Mouse Click on or box round a Central Powers airfield to highlight it. You should now have the Airfield Properties displayed. Left mouse click \"Create Linked Entity\" to declare it as an active airfield</p>\n"; 
			echo "<p>Then click the > on the right of the Name: which will give you the Airfield advanced properties.  Here set the Country: (Probably Germany?) and click OK. <br />
					Next do the same for an Allied airfield setting the Country to one of the Allied Countries.<br />
					Continue till all active airfields are set.</p>\n";
					
					echo "<p>Once ready \"Select All Visible Objects\" (the airfields) then \"File\", \"Save Selection to File\", select your $abbrv-groups directory and save as <b>$abbrv-template_to_airfield.Group</b>.</p>\n";
					echo "<p>Then save the entire template mission file, which now contains activated airfields.</p>\n";
					echo "<p>Once you are ready to proceed, click \"Next\"</p>\n";
					# BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" name =\"Setup\" id=\"SetupDone\" value =\"true\" >Next</button>\n"; # the value defines the action after the button was pressed
					echo "	</fieldset>\n";
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
