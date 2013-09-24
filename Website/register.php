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
		
				$userName 	= 	$_POST["username"]; 
				$email 		= 	$_POST["email"]; 
				$password 	= 	$_POST["password"]; 
				$password2 	= 	$_POST["password2"]; 
				$phone 		= 	$_POST["phone"]; 
						
				if($password != $password2 OR $password == "" OR $userName == "") 
					{
					# In case the information was feedback and a back button is created
					echo "<p><b>Input Error!</b><br> Please fill all form fields correctly. <br></p>\n";
					echo "<br>";
					echo "<form action=\"registerForm.php\" >\n";
					echo "<input type=\"submit\" value=\"Back\">\n";
					echo "</form>\n";
					echo "<br>";					
					}
				else
					{
					# encrypt password   
					$password = md5($password); 
					
					# check datasets stored in the table to varify uniquness of new user
					$query = "SELECT user_id FROM users WHERE username LIKE '$userName' ";        
					$result = mysqli_query($dbc, $query); 
					
					$values = mysqli_num_rows($result); 
					
					# if user does not exists a new entry will be stored to the table
					if($values == 0) 
						{
						$userRole = "viewer";
						
						$entry = "INSERT INTO users (username, password, email, phone, role_id) VALUES ('$userName', '$password', '$email', '$phone', '$userRole')"; 
						$entries = mysqli_query($dbc, $entry); 
					
					# check if user was added correctly
						if($entries == true) 
							{
							# everything was fine so we see abutton for the login
							echo "<p>User <b>$userName</b> has been created.</p>\n";
							echo "<form action=\"loginForm.php\" >\n";
							echo "<input type=\"submit\" value=\"Login\">\n";
							echo "</form>\n";
							} 
						else 
							{ 
							# There was a problem with the transmission so we see a back button
							echo "<p>Error adding the user.</p>\n"; 
							echo "<form action=\"registerForm.php\" >\n";
							echo "<input type=\"submit\" value=\"Back\">\n";
							echo "</form>\n";			
							} 
						} 
					else 
						{
						# The username is already in use so we get feedback due to it and a back button
						echo "<p>Username <b>$userName</b> aready used.<br>\n";
						echo "<form action=\"registerForm.php\" >\n";
						echo "<input type=\"submit\" value=\"Back\">\n";
						echo "</form>\n"; 
						}
					}
					
					mysqli_free_result($result);
	
					mysqli_close($dbc);
			
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