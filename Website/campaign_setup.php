<?PHP
# Stenka 19/10/13
# Administrator session for creation of a new campaign
# 
# initialise variables
echo '<h1>Setup of New Campaign</h1>';
echo '<br>This is a job for the campaign administrator who should have basic skills in the Mission Editor.<br>';
echo '<br>Before doing this you must have logged in with administrator rights, created a campaign database and connected to that campaign database.<br>';
echo '<br>You can open the Mission Editor in a separate window to help this process<br>';
echo '<br>First we define the map upon which the campaign will be run in the Mission editor<br>';
echo '<br>In the Mission Editor choose file menu, New, right click with mouse on map and select Properties. 
This will open the mission properties window.
Enter a name for the mission, preferably the same as that you chose for the campaign. Avoid special characters, do not make it a pure numeric start with an alpha character and be consistent in use of upper and lower case.
Mission type should be Deathmatch.<br>';
echo '<br>Now we must select the Map. Currently in ROF there are two main campaign maps, the Western Front map and the Channel map. 
Then there are also two small dogfight maps: df3xlake and df5x5verdun. For Landscape info, Height Map, Textures, Forests, GUI Map, Season you need to select an appropriate matching set in the Mission editor. 
In the Mission Editor file menu, save as giving it a name for the campaign plus"_template" and placing it in the /data/Multiplayer/Dogfight/ directory.<br>';
echo '<br>Next we have  to tell which map was chosen to our campaign manager so select the map button you have chosen:<br>';
echo '<br>Select Campaign Map<br>';
echo '<br>Western Front :Button: <br>';
echo '<br>Channel :Button:<br>';
echo '<br>df3x3lake :Button:<br>';
echo '<br>df5x5verdun :Button:<br>';
# the input from here will update the campaign fields in cam_param or campaign_ststistics whatever
echo '<br>We will now populate our map with airfields. In the mission editor select Import from file, go to 
directory /data/Template/ and select the base-no-trunc file that corresponds to your map. The Western front map uses Base-no-trunc the Channel map uses base-no-trunc-channel the dogfight maps have merged base files.
loading in these files can take a while, patience. 
<br>';
echo '<br>We now need to define who is fighting who. So back in the Mission editor, Mission Properties, click on Countries.
Our Campaign manager has been designed to create a war between two coalitions, Allies and Central Powers. While it is possible to configure other theoretical alliances like "War dogs" and "Mercenaries"
we did not design or test any options other than Allies and Central Powers so allocate the real countries to either coalition and ignore the rest.  In the Mission Editor you should use the file menu, save before coming back here to inform your Campaign Manager of the choice.
<br>';
echo '<br>Coalitions....... : Allies : Central Powers<br>';
echo '<br>France........... : Button : Button :<br>';
echo '<br>Great Britain.... : Button : Button :<br>';
echo '<br>USA.............. : Button : Button :<br>';
echo '<br>Italy............ : Button : Button :<br>';
echo '<br>Russia........... : Button : Button :<br>';
echo '<br>Germany.......... : Button : Button :<br>';
echo '<br>Austro-Hungary... : Button : Button :<br>';
# The input from this section will update the countries/coalition table for the campaign
echo '<br>
Next, back to the Mission editor. Make sure you are in 2D editing mode by clicking on the Arrow down ikon key at the left hand side of 
the tool bar which you normally find at the top of the screen. It is in-between the ruler ikon and the F ikon.
You can zoom in and out using the scroll on your mouse and drag the map around holding the right mouse click.
The campaign maps (as opposed to the dogfight maps) are very big. If you populate the complete map with objects 
you will probably run into performance problems in a large scale multi user mission. So we will define a sector 
of the map within which to run our campaign. Note when you zoom in and zoom out in the editor down near the bottom right there is a value "Grid(M)".
this is the size in metres of the white grid squares which will give you an idea of the scale of your map on screen.
To define the sector of the map we want to use we will need the bottom left and top right of a rectangle. 
There are three dimensions to the map X is from the bottom to the top, Y is Height and Z is left to right. 
Down near the bottom right of the editor you also have the X and Z values of the mouse position. So choose where you want the bottom left
of the sector and note the X and Z values then the same for the top right of the sector. Return to the Campaign manager and enter the values here.   
<br>';
echo '<br>Bottom left X value :000000000.00:<br>';
echo '<br>Bottom left Z value :000000000.00:<br>';
echo '<br>Top Right X value :000000000.00:<br>';
echo '<br>Top Right Z value :000000000.00:<br>';
echo '<br>BIG UPDATE BUTTON:<br>';
echo '<br>We have now created the key parameters for the campaign so if you are happy with your inputs clich the nice big Update Button<br>';

echo '<br>Next we will start to refine our campaign template<br>';
# the input from here will update the campaign fields in cam_param or campaign_statistics whatever
echo '<br>Return to the Mission editor. We now want to save just the objects that are in our sector. On the top ikon bar is a button for "OBJ FILT" select that and make sure to "Select All" then OK.
Using left mouse button drag from bottom left of our sector to top right of our sector. This will highlight all objects in our sector.
Next File, Save selection to File, select /data/Multiplayer/Dogfight/ and save the file as campaign_name-no-trunc.
A single left mouse click unselects. Now go to the Search and Select menu, Select All Objects in Mission and press the delete key on your keyboard. There will be a pause, patience and all the airfields etc. will dissapear.
We can now load back in only those objects that were in our sector with File, Import from File, select /data/Multiplayer/Dogfight/ and load the file campaign_name-no-trunc.
You should now have just the airfields in your sector plus some towns or stuff. File, Save to make sure we do not lose this.
<br>';
echo '<br>Our next step in the creation of the campaign template is to decide which Airfields will be active. Again, for performance reasons 
we do not want every airfield in our sector to be active. So chose 3-4 for each side.
Go back to the OBJ FILT button at the top, Clear all, then click on just Airfield, OK. Now on the map you see only airfields.
Left Mouse Click on or box round a Central Powers airfield to highlight it. You should now have the Airfield Properties displayed. Left mouse click "Create Linked Entity" to declare it as an active airfield then click the > on the right of the Name: which will give you the Airfield advanced properties.
Here set the Country: (Probably Germany?) and OK.
Next do the same for an Allied airfield setting the Country to one of the Allied Countries.
Continue till all active airfields are set.
<br>';
echo '<br>Next we are going to send the information  about all these airfields to our Campaign Manager. In Preparation for this you should create a directory somewhere on your computer where we will place all the .Group files which will be exchanged between the Mission Editor and the Campaign Manager for this campaign. You may be running several campaigns in parallel so make it unique to the campaign. Otherwise there will be confusion between the campaigns.
Once ready select all the airfields then File, Save selection to File, select our campaign directory and save to the filename "template_to_airfield.Group".
<br>';
echo '<br>We can now load this group file into our Campaign Manager by clicking on the "Template to Airfields" big Button.<br>';
echo '<br>BIG BUTTON called Template to Airfields<br>';
# This launches inbox.sql then inbox_to_airfield
echo 'If the airfields load in to the Campaign manager has worked correctly we can now return to the Mission Editor and 
delete all airfields from our template and again save the template. From this point forwards in the campaign before each mission the campaign manager
will populate the active airfields with the right quantity and type of aircraft, manage activation de-activation or capture and send a .Group file to the Mission Editor for the assembly of each mission.<br>';
# after this point will be added the population of bridges into the template grouping and send to the Campaign Manager 
# again they will be managed in the Campaign manager an sent to the Mission Editor for assembly into each mission.


