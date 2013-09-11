<?php 
# creates a new session for tracking the user is logged on 
	session_start(); 

# Incorporate the MySQL debug script.
	require ( 'includes/debug.php' );

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );

# header information
	include 'includes/header.php';
?>

            <ul id="navigation">
              <li><a href="#" class="menu1"><span></span></a></li>
              <li><a href="#" class="menu2"><span></span></a></li>
            </ul>
            <ul id="register">
              <li><a href="registerForm.php" class="register"><span></span></a></li>
              <li><a href="loginForm.php" class="login"><span></span></a></li>
            </ul>
        </div>
          
        <div id="left"></div>
         
        <?php 
		
        # open container
        echo "<div id=\"content\">\n";

        $username = $_POST["username"]; 
        $email = $_POST["email"]; 
        $password = $_POST["password"]; 
        $password2 = $_POST["password2"]; 
        $phone = $_POST["phone"]; 
		        
        if($password != $password2 OR $password == "" OR $username == "") 
            {
            echo "<p><b>Input Error!</b><br> Please fill all form fields correctly. <br></p>\n";
            echo "<form action=\"registerForm.php\" >\n";
            echo "<input type=\"submit\" value=\"Back\">\n";
            echo "</form>\n";
            
        # close html document properly before exit
            echo "</div>\n";
			
			include 'includes/footer.php';
            
			exit; 
            }
        # encrypt pasword   
        $password = md5($password); 
        
        # check datasets stored in the table to varify uniquness of new user
		$query = "SELECT id FROM users WHERE username LIKE '$username' ";        
		$result = mysqli_query($dbc, $query); 
		
        $values = mysqli_num_rows($result); 
        
        # if user does not exists a new entry will be stored to the table
        if($values == 0) 
            {
            $role = "viewer";
            
            $entry = "INSERT INTO users (username, password, email, phone, role) VALUES ('$username', '$password', '$email', '$phone', '$role')"; 
            $entries = mysqli_query($dbc, $entry); 
        
        # check if user was added correctly
            if($entries == true) 
                {
                echo "<p>User <b>$username</b> has been created.</p>\n";
                echo "<form action=\"loginForm.php\" >\n";
                echo "<input type=\"submit\" value=\"Login\">\n";
                echo "</form>\n";
                } 
            else 
                { 
                echo "<p>Error adding the user.</p>\n"; 
                echo "<form action=\"registerForm.php\" >\n";
                echo "<input type=\"submit\" value=\"Back\">\n";
                echo "</form>\n";			
                } 
            } 
        else 
            { 
            echo "<p>Username aready used.<br>\n";
            echo "<form action=\"registerForm.php\" >\n";
            echo "<input type=\"submit\" value=\"Back\">\n";
            echo "</form>\n"; 
            }
            
        # close container
        echo "</div>\n";	 
        
        ?>
        
<?php include 'includes/footer.php'; ?>