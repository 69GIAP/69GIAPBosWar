<?php 
# Stenka 21/11/13 adding hints and text corrections
# Stenka 14/5/14 change or rwststion for BOS
# Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
		
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

					echo "<h1>$campaign Campaign Mission Editor Setup</h1>";
					
					# initialise variables
					$query = "SELECT * from campaign_settings;";
					if(!$result = $camp_link->query($query)) {
						die('CampaignMgmtSetup.php query error [' . $camp_link->error . ']');
					}
		
					if ($result = $camp_link->query($query)) {
						/* fetch associative array */
						while ($obj = $result->fetch_object()) {
								$map=($obj->map);
						}
					}
					$result->free();

					# start form
					echo "<form id=\"campaignMgmtSetupForm\" name=\"campaignSetup\" action=\"CampaignMgmtUpload.php?btn=campStp&sde=campSet\" method=\"post\">\n";

					echo "<p>This is a job for the campaign administrator who should have basic skills in the Mission Editor, but don't worry.  We will lead you step-by-step.</p>\n";

					
					echo "<h3>Preliminaries</h3>\n";

					echo "<p>First you should create a directory somewhere on your computer where you will save any .Mission template and .Group files which will be exchanged between the mission editor and the BOSWAR campaign manager for this campaign.  Because you may be running multiple campaigns in parallel it must be unique to the campaign.  Otherwise there could be confusion between the campaigns.<br />
						<br>Name this directory: <b>$abbrv-groups</b>.<br />
						<br>We will refer to this directory as your \"campaign groups directory\".</p>\n";

					echo "<p>Next we work on setting up the campaign in the mission editor (RoF Editor in this case).</p>\n";
					echo "<p>We recommend that you open the mission editor in a separate window to carry out this process.  Continue when ready.</p>\n";
					echo "<p>Start a new mission by clicking \"File\" and \"New\" in the upper left.</p>\n";
					echo "<p>If the \"Mission Properties\" window is not open, right click with your mouse on the map and select \"Properties\". This will open the \"Mission Properties\" window.</p>\n";
 
					echo "<p>Enter a name for the mission, preferably using or including your campign abbreviation ($abbrv). Avoid special characters and be consistent in use of upper and lower case.</p>\n";

					echo "<p>Select a date and time for the first mission.</p>\n";
					echo "<p>Mission type should be 'Deathmatch'.</p>\n";
					
					echo "<h3>The Campaign Map</h3>\n";

					echo "<p>You selected the \"$map\"map when you configured the $campaign campaign.</p>\n";  
					echo "<p>Now we must select this map in the mission editor.</p>\n";
					
					if($map == 'Western Front') {
						echo "<p>In the mission editor the \"Western Front\" GUI map has three versions:\n";
						echo "<ul class=\"commonList\">\n";
						echo "	<li>winter (05.01.1918)</li>\n";
						echo "	<li>spring/summer (15.07.1918)\n";
						echo "	<li>autumn (19.10.1918).\n";
						echo "</ul></p>\n";
						
						echo "<p>Select one of these GUI maps and a matching season for your campaign.</p>\n";
						echo "<p>Then for Landscape info: (Height Map, Textures, and Forests) you need to select an appropriate matching set.  Make all three either \"landscape\", \"landscape_autumn\" or \"landscape_winter\", as appropriate.</p>\n"; 
						} 
					elseif($map == 'Channel') {
						echo "<p>In the mission editor the \"Channel\" GUI map has a single version: channel_summer</p>\n";
						echo "<p>Select it and a matching season for your campaign.</p>\n";
						echo "<p>Then for Landscape info: (Height Map, Textures, and Forests) you need to select an appropriate matching set.  Make all three \"landscape_channel\".</p>\n"; 
						} 
					elseif($map == 'Verdun') {
						echo "<p>In the mission editor the \"Verdun\" GUI map has three versions: autumn (df5x5verdun_autumn), summer (df5x5verdun_summer) and winter (df5x5verdun_winter).</p>\n";
						echo "<p>Select one of these GUI maps and a matching season for your campaign.</p>\n";
						echo "<p>Then for Landscape info: (Height Map, Textures, and Forests) you need to select an appropriate matching set.  Make all three the landscape that matches your GUI map choice.</p>\n"; 
						} 
					elseif($map == 'Lake') {
						echo "<p>In the mission editor the \"Lake\" GUI map has three versions: autumn (df3x3lake_autumn), summer (df3x3lake_summer) and winter (df3x3lake_winter).</p>\n";
						echo "<p>Select one of these GUI maps and a matching season for your campaign.</p>\n";
						echo "<p>Then for Landscape info: (Height Map, Textures, and Forests) you need to select an appropriate matching set.  Make all three the landscape that matches your GUI map choice.</p>\n"; 
						} 
					elseif($map == 'Stalingrad') {
						echo "<p>In the mission editor the \"Stalingrad\" GUI map has no name (so leave it blank), but the files that define it are found in the graphics/stalin_w sub-directory.</p>\n";
						echo "<p>For Landscape info: (Height Map, Textures, and Forests) you need to select the stalin_w files height.hini, textures.tini and trees\woods.wds respectively.</p>\n"; 
						} 
					else {
						echo "<p>We have not yet created a locations file for the \"$map\" map.</p>\n";
					}
					// we should be able to determine the map from the GuiMap line in the Options section of the Mission file... just a SMOP.  :)
					
					echo "<p>Click 'Apply' in the Mission Properties screen, giving it the file name  <b>$abbrv-template.Mission</b> and saving it to your <b>$abbrv-groups</b> directory.</p>\n";

					echo "<h3>The Opposing Sides</h3>\n";

					echo "<p>We now need to define who is fighting whom. So back in the mission editor select \"Mission Properties\" and click on \"Countries\".</p>\n";
					if ($sim =="RoF") {
						echo "<p>Our BOSWAR campaign manager has been designed to create a war between two coalitions, e.g. Allies (Entente) and Central Powers.<br>\n";
						echo "While it is possible to configure other theoretical alliances like \"War dogs\" and \"Mercenaries\" we did not design or test any options other than Allies and Central Powers; so allocate the real countries to either coalition and ignore the rest.<br>\n";
					} else { // must be BoS
						echo "<p> Our BOSWAR campaign manager has been designed to create a war between two coalitions, e.g Soviets (Russia) and Germany.  This is the nature of the Battle of Stalingrad, so accept the default assignments.<br>\n";
					}
					echo "In the mission editor you should use \"File\", \"Save\", before coming back here.</p>\n";
					
					echo "<h3>Import Infrastructure</h3>\n";

					echo "<p>We will now populate our template with infrastructure (including, most importantly, the airfields).</p>\n" ;
					echo "<p>In the mission editor \"File\" menu select \"Import From File...\" and go to: directory <b>Rise of Flight/data/Template/</b></p>\n";
					if($map == 'Western Front') {
						echo "<p>Select the Base-no-trunc.Group file.  This file holds the airfields and some other infrastructure for the Western Front map.  Press \"Open\" and wait for the file to load.</p>\n";
						echo "<p>Then select the Base-for-trunc.Group file.  This file holds the remaining infrastructure (including bridges) for the Western Front map.</p>\n";
						
						}
					elseif($map == 'Channel') {
						echo "<p>Select the Base-no-trunc-channel.Group file.  This file holds the airfields and some other infrastructure for the Channel map.  Press \"Open\" and wait for the file to load.</p>\n";
						echo "<p>Then select the Base-for-trunc-channel.Group file.  This file holds the airfields and some other infrastructure for the Channel map.</p>\n";
						}
					elseif($map == 'Verdun') {
						echo "<p>Select the Base_DF5x5Verdun.Group file.  This file holds the airfields and all other infrastructure for the Verdun dogfight map.  Press \"Open\" and wait for the file to load.</p>\n";
						}
					elseif($map == 'Lake') {
						echo "<p>Select the Base_DF3x3Lake.Group file.  This file holds the airfields and all other infrastructure for the Lake dogfight map.  Press \"Open\" and wait for the file to load.</p>\n";
						}
					else {
						echo "<p>We have not yet created a locations file for the \"$map\" map.</p>\n";
					}
					
					echo "<p>Loading these files (especially the large \"for-trunc\" ones) can take a while, be patient. Wait until the 'Please wait until operation is finished' popup disappears. If the load hangs near the end, quit and reload the file which should now be a quick process.</p>\n";
					echo "<p>Save your (now much larger) template mission file before continuing.</p>\n";
					
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
<p>The simplest case is two influence areas... one for each opposing side, and that is what we will go through here, but we also support multiple influence areas should you wish to use them. The combat area includes all defined influence areas.  Areas that are outside of defined influence areas are deemed neutral.
Hint : if your screen is a bit crowded with ikons go to your object filter and switch off most stuff except for Airfields and MCU Translators.</p>

<p>To define the first influence area:<br \>
<ul class="commonList">
    <li>select the ">>MCUs<<" box in the upper right of the mission editor.</li>
    <li>Scroll down the list and select "Translator:Influence Area".</li>
    <li>Left click to place this on the map within the area you have choosen to be, say, German territory.</li>
    <li>Select the influence area icon with another left click.</li>
    <li>Right click on the influence area icon and select "Selected Object Menu".</li>
    <li>Select "Edit Influence Area Boundary".</li>
    <li>This will create a blue triangle with a yellow circle at one apex which you can drag with your mouse (holding down the left mouse button).</li>
    <li>To select another end to edit, double click on that end.</li>
    <li>You will probably want at least one more corner to form a trapezoid.  (Try to use no more than 6-8 corners per area.  More complex areas may cause performance problems.)</li>
    <li>To add another point to move, use CTRL+left mouse click on a boundary line that is attached to the yellow circle.</li>
    <li>Note that the boundary of an influence area should not cross itself.</li>
    <li>Move the ends to form a boundary around the area you want to define.</li>
    <li>To stop editing, right click on the influence area and select "Selected Object Menu".</li>
    <li>Select "Stop Editing Boundary".</li>
</ul>

<p>To set ownership of the influence area:</p>
<ul class="commonList">
    <li>Right click on the influence area and select "Advanced Properties..."</li> 
    <li>select the country you want to be the owner of this area (e.g. Germany)</li>
    <li>click "OK".</li>
    <li>Left click outside the influence area icon to unselect it.</li>
</ul>

<p>Repeat this process to define the opposing side's influence area(s).</p>
			<?php
			
			echo "<p>Save the template mission before continuing.</p>\n";

			echo "<h3>Refine the Template</h3>\n";

			echo "<p>Next we will start to refine our campaign template.<br>";
			echo "<p>We now want to save <b>just</b> the objects that are in our sector.</p>\n"; 
			echo "<p>On the top icon bar is a button for the object filter abbreviated as \"OBJ FILT\".  Select that, then \"Select All\" then select \"OK\".</p>\n";
			echo "<p>Click the bottom left of the influence areas and holding the left mouse button drag from bottom left of our sector to top right of our sector. This will highlight all objects in our sector.  Be sure this includes all the defined influence areas.  Better to be slightly generous than slightly stingy here.</p>\n";
			echo "<p>Next in the File menu, select \"Save selection to File\", navigate back to your <b>$abbrv-groups</b> directory, give this file the File Name <b>$abbrv-sector.Group</b>, and Save as type \"Group Files\", then click \"Save\".</p>\n";
			echo "<p>Left click outside the area to unselect it.</p>\n";
			echo "<p>Now go to the \"Search and Select\" menu, select \"Select All Objects in Mission\" then press the \"Delete\" key on your keyboard. There will be a pause (have patience) and all the airfields etc. will disappear.</p>\n";
			echo "<p>We can now load back in only those objects that were in our sector with File, Import from File, select your <b>$abbrv-groups</b> directory and load the file <b>$abbrv-sector.Group</b>.
			You should now have just the infrastructure for your sector.</p>\n"; 
			echo "<p>\"File\", \"Save\" to make sure we do not lose this!</p>\n";

			echo "<h3>Activate Select Airfields</h3>\n";

			echo "<p>The next step in the creation of the campaign template is to decide which Airfields will be active. Again, for performance reasons we do not want every airfield in our sector to be active. So chose 3-4 for each side.</p>\n";
			echo "<p>Go back to the object filter (OBJ FILT button) at the top, click on \"Clear All\" then click on \"Airfield\" (a checkmark will appear) and \"OK\".  Now on the map you should see airfields only.</p>\n";
			echo "<p>Left Mouse Click on or box round a Central Powers airfield to highlight it. You should now have the Airfield Properties displayed. Left mouse click \"Create Linked Entity\" to declare it as an active airfield.<br>(Multiple airields may be selected by using Ctrl + left click to speed this step up)</p>\n"; 
			echo "<p>Then click the \">\" on the right of \"Name:\" which will give you the Airfield advanced properties.  Here set the Country: (Probably Germany) and click OK.  Next do the same for an Allied airfield setting the Country to one of the Allied Countries.</p>
				<p>Continue until all active airfields are set.</p>\n";
# addition of supply and control points
			echo "<h3>Supply Points</h3>\n";
			if ($sim == "RoF")
			{
			echo "<p>When new vehicles arrive on the map they will arrive at a Supply point. This will normally be near a road on the edge of the map or near a railway line. We will use the \"rwstation\" block as a token for a supply point.
					First in the Mission Editor go to object filter and \"Select All\". Then select \"Blocks\" on the right of the screen, then \"rwstation\" and position it where you want on the map.
					\"Create Linked Entity\" and set the \"Country\" in \"Advanced Properties\". Then continue until you have enough supply points on each side. We <b>must</b> have at least one for each coalition.<br></p>\n";
			}
			else
			{
			echo "<p>When new vehicles arrive on the map they will arrive at a Supply point. This will normally be near a road on the edge of the map or near a railway line. We will use the \"rwstation\" block as a token for a supply point.
					First in the Mission Editor go to object filter and \"Select All\". Then select \"Blocks\" on the right of the screen, then \"rwstation_s2\" and position it where you want on the map.
					\"Create Linked Entity\" and set the \"Country\" in \"Advanced Properties\". Then continue until you have enough supply points on each side. We <b>must</b> have at least one for each coalition.<br></p>\n";
			}			
					echo "<h3>Control Points</h3>\n";
			echo "<p>Campaigns may be purely points based or based on set objectives to be captured or held. Such an optional objective is called a \"Control Point\". We will use the \"flag\" Flag as a token for a Control Point.
					To set a Control Point, select \"Flags\" on the right of the screen, then \"flag\" and position it where you want on the map.
					\"Create Linked Entity\" and set the \"Country\" in  \"Advanced Properties\".  Continue as needed.<br></p>\n";
			
# end addition supply control					
			echo "<h3>Save the template Mission file</h3>\n";
			echo "<p>Once you have defined all the \"vital points\" you need, use \"File\", \"Save\" to save the entire template mission file, which now contains Influence Areas, activated airfields, supply points, any control points, bridges, cities, towns, villages, etc.</p>\n";
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
