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

                <form id="loginForm" name="login" action="UserMgmtRegister.php" method="post">
                    <h1 id="h1Form">Register</h1>
                    <fieldset id="inputs">
                        <input id="username" type="text" name="username" placeholder="Choose Username" autofocus required> 
                        <input id="email" type="text" name="email" placeholder="Email Address" autofocus required>                           
                        <input id="password" type="password" name="password" placeholder="Choose Password" required>
                        <input id="password" type="password" name="password2" placeholder="Repeat Password" required> 
                        <input id="phone" type="text" name="phone" placeholder="Telephone Number" required>               
                    </fieldset>
                    <fieldset id="actions">
                        <input type="submit" id="loginSubmit" value="Submit">
                    </fieldset>
                </form>                
                
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