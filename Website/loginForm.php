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
        
        <div id="content">
            <p><b>Login:</b></p>
            <form action="login.php" method="post">
                Your Username:<br>
                <input type="text" size="24" maxlength="50"
                name="username"><br>    
                Your Password:<br>
                <input type="password" size="24" maxlength="50"
                name="password"><br><br>
                
                <input type="submit" value="Login">
            </form>
        </div>
        
<?php include 'includes/footer.php'; ?>
