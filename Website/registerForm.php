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
            
                <p><b>Register:</b></p>
                 
                <fieldset class="boswar">      
                    <form name="register" action="register.php" method="post">
                        <ul>
                            <li> <label for="username">User Name:</label>
                            <input type="text" name="username" id="username" size="30" />
                            </li>
                            <li> <label for="email">Email Address:</label>
                            <input type="text" name="email" id="email" size="30" />
                            </li>
                            <li> <label for="password">Password:</label>
                            <input type="password" name="password" id="password" size="30" />
                            </li>
                            <li> <label for="password2">Repeat Password:</label>
                            <input type="password" name="password2" id="password2" size="30" />
                            </li>
                            <li> <label for="phone">Telephone Number:</label>
                            <input type="text" name="phone" id="phone" size="30" />
                            </li>                        
                            <li><label for="submit"></label>
                            <button type="submit" id="submit">Submit</button></li>
                        <ul>
                    </form>
                </fieldset>
                
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