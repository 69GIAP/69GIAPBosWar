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
			
            <div id="navigationContainer">
            
                <ul id="navigation">
                  <li><a href="#" class="menu1"><span></span></a></li>
                  <li><a href="#" class="menu2"><span></span></a></li>
                </ul>
                <ul id="register">
                  <li><a href="registerForm.php" class="register"><span></span></a></li>

					<!-- if the user is not looged on he sees a login button -->
					<?php include 'includes/loginButton.php'; ?> 

                <li><a href="logout.php" class="logout"><span></span></a></li>  
                </ul>
            </div>
		</div>
            
        <div id="left">
            <ul id="sidebar">
                <li><a href="#" class="sovietbanner"><span></span></a></li>
                <li><a href="#" class="centerbanner"><span></span></a></li>   
            </ul>
        </div>
         
        <div id="content">
           <p>Welcome to the BOSWAR project protected area!</p>
        </div>
        
<?php include 'includes/footer.php'; ?>
