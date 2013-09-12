<?php 
# creates a new session for tracking the user is logged on 
	session_start(); 

# Incorporate the MySQL debug script.
	require ( 'includes/debug.php' );

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
                
                <!-- form for changing information in the users table -->
                <p>Please insert the ID of the user you want to modify:</p>
                <fieldset class="boswar">
                    <form name="delete" action="UserAdministrationModify.php" method="post">
                        <ul>
                            <li> <label for="id">User ID</label>
                                <input type="text" name="id" id="id" size="3" /></li>
                                
                            <li> <label for="password">New Password</label>
                                <input type="text" name="password" id="password" size="30" /></li>  
        
                                <li><label for="role">Select Role</label>
                                	 <!-- this name element defines the variable name -->
                                    <select name="role">
                                    <!-- Load the roles stored in the table roles to fill selector -->
                                    <?php	include 'includes/getUserRoles.php' ?>
                                    </select>
                                </li>
        
                            <li><label for="modify"></label>
                                <button type="modify" name="modify" value ="1" id="modify">Update Password</button>
                                
                            <label for="modify"></label>
                                <button type="modify" name="modify" value ="2" id="modify">Update Role</button>
                                                                               
                            <label for="modify"></label>
                                <button type="modify" name="modify" value ="0" id="modify">Delete</button></li>
                                                      
                        <ul>
                    </form>
                </fieldset>
                
                <?php
                    # find out which list to load
                    $link = $_GET["link"];
                    
                    # load the query according to the $_GET variable
        
                    if ($link == "A")
                    {
                        echo "Registered Administrators:";
                        $sql = "SELECT * FROM users WHERE role like \"administrator\" ORDER BY role, username";
                    }
                    else
                    if ($link == "R")
                    {
                        echo "Registered Red Admins:";
                        $sql = "SELECT * FROM users WHERE role like \"redAirAdmin\" OR role like \"redGroundAdmin\" ORDER BY role, username";
                    }
                    else
                    if ($link == "B")
                    {
                        echo "Registered Blue Admins:";
                        $sql = "SELECT * FROM users WHERE role like \"blueAirAdmin\" OR role like \"blueGroundAdmin\" ORDER BY role, username";
                    }
                    else
                    if ($link == "V")
                    {
                        echo "Registered Viewers:";
                        $sql = "SELECT * FROM users WHERE role like \"viewer\" ORDER BY role, username";
                    }
                    
                    if(!$result = $dbc->query($sql)){
                        die('<p>There was an error running the query [' . $dbc->error . ']</p>\n');
                    }
                    
                    # Print out the contents of the entry 
                    while($row = $result->fetch_assoc()) 
                     {
                        echo "<p>\n";
                        print "<b>User ID:</b> ".$row['id'] . " <br>\n";
                        print "<b>Username:</b> ".$row['username'] . " <br>\n";	
                        print "<b>Email Adress:</b> ".$row['email'] . " <br>\n";
                        print "<b>Telephone:</b> ".$row['phone'] . " <br>\n";				
                        print "<b>Role:</b> ".$row['role'] . " <br>\n";
                     }
                     
                     echo '<br>Total results: ' . $result->num_rows . " <br>\n";
        
                     echo "</p>\n";
                    
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