<?php
	# include the form to manage users
	include ( 'includes/userMgmtForm.php' );
/*
    # get the SESSION variables for the users
    # $userRole	= $_SESSION['userRole'];
	# $userId	= $_SESSION['user_id'];	
    
    # load the query according to the user role
    if ($userRole == "administrator")
    {
        echo "<h3>Registered Users:</h3>\n";
        $sql = "SELECT * FROM users u  
				LEFT JOIN campaign_users c 
				ON u.user_id = c.user_id
				JOIN users_roles r
				ON u.role_id = r.role_id
				ORDER BY  u.username, r.role_id, c.camp_db";
    }
    else if ($userRole == "commander")
    {
        echo "<h3>Registered Commanders:</h3>\n";
        $sql = "SELECT * FROM users u  
				LEFT JOIN campaign_users c 
				ON u.user_id = c.user_id
				JOIN users_roles r
				ON u.role_id = r.role_id
				AND u.role_id = 2
				ORDER BY  u.username, r.role_id, c.camp_db";
    }
    
    if(!$result = $dbc->query($sql)){
        die('<p>There was an error running the query [' . $dbc->error . ']</p>\n');
    }
    
    # Print out the contents of the entry 
    while($row = $result->fetch_assoc()) 
     {
        print "<div class=\"userRecordFrame\"><p>\n";
        print "<b>Username:</b> ".$row['username'] . " <br>\n";	
        print "<b>Email Adress:</b> ".$row['email'] . " <br>\n";
        print "<b>Telephone:</b> ".$row['phone'] . " <br>\n";				
        print "<b>Role:</b> ".$row['role'] . " <br>\n";
        print "<b>Campaign DB:</b> ".$row['camp_db'] . " <br>\n";
        print "<b>Coalition:</b> ".$row['CoalID'] . " <br>\n</div>\n";		
     }
     
     echo '<br>Total results: ' . $result->num_rows . " <br>\n";

     echo "</p>\n";
 */

?>