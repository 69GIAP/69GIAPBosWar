<?php 
# creates a new session for tracking the user is logged on 
	session_start(); 

# Incorporate the MySQL debug script.
	require ( 'includes/debug.php' );

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
	
# Include the webside header
	include ( 'includes/RofWar_header.php' );
	
# Include the navigation on top
	include ( 'includes/RofWar_navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
                <p><b>Login:</b></p>
                
                <fieldset class="boswar">
                    <form  name="login"  action="RofWar_login.php" method="post">
                        <li> <label for="username">Your Username:<br></label>
                        <input type="text" name="username" id="username" size="24" maxlength="50" />
                        </li>
                         <li> <label for="password">Your Password:<br></label>
                        <input type="password" name="password" id="password" size="24" maxlength="50" />
                        </li>

                        <li><label for="submit"></label>
                        <button type="submit" id="submit">Login</button>
                        </li>
                    </form>
				</fieldset>
                
            </div>
    
        </div>

<?php
	# Include the general sidebar
	include ( 'includes/RofWar_sidebar.php' );
?>	

		<div id="clearing"></div>
	</div>

<?php
	# Include the footer
	include ( 'includes/RofWar_footer.php' );
?>