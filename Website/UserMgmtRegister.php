<?php 

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
        
                $userName 	= 	$_POST["username"]; 
                $email 		= 	$_POST["email"]; 
                $password1 	= 	$_POST["password1"]; 
                $password2 	= 	$_POST["password2"]; 
                $phone 		= 	$_POST["phone"]; 
                        
                if($password1 != $password2 OR $password1 == "" OR $userName == "") 
                    {
                    # In case the information was feedback and a back button is created
                    echo "<p><b>Input Error!</b><br> Please fill all form fields correctly. <br></p>\n";
                    echo "<br>";
                    echo "<form action=\"UserMgmtRegisterForm.php\" >\n";
                    echo "<input type=\"submit\" value=\"Back\">\n";
                    echo "</form>\n";
                    echo "<br>";					
                    }
                else
                    {
                    # encrypt password   
                    $password = md5($password1); 
                    
                    # check datasets stored in the table to varify uniquness of new user
                    $query = "SELECT user_id FROM users WHERE username LIKE '$userName' ";        
                    $result = $dbc->query($query); 
                    
                    # if user does not exists a new entry will be stored to the table
                    if($result->num_rows == 0) 
                        {
                        $userRoleID = "3";
                        
                        $entry = "INSERT INTO users (username, password, email, phone, role_id) VALUES ('$userName', '$password', '$email', '$phone', '$userRoleID')"; 
                        $entries = $dbc->query($entry); 
                    
                    # check if user was added correctly
                        if($entries == true) 
                            {
                            # everything was fine so we see abutton for the login
                            echo "<p>User <b>$userName</b> has been created.</p>\n";
                            echo "<form action=\"UserMgmtLoginForm.php\" >\n";
                            echo "<input type=\"submit\" value=\"Login\">\n";
                            echo "</form>\n";
                            } 
                        else 
                            { 
                            # There was a problem with the transmission so we see a back button
                            echo "<p>Error adding the user.</p>\n"; 
                            echo "<form action=\"UserMgmtRegisterForm.php\" >\n";
                            echo "<input type=\"submit\" value=\"Back\">\n";
                            echo "</form>\n";			
                            } 
                        } 
                    else 
                        {
                        # The username is already in use so we get feedback due to it and a back button
                        echo "<p>Username <b>$userName</b> aready used.<br>\n";
                        echo "<form action=\"UserMgmtRegisterForm.php\" >\n";
                        echo "<input type=\"submit\" value=\"Back\">\n";
                        echo "</form>\n"; 
                        }
                    }
                    
                    $result->free();
    
            
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
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
