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

                <form id="loginForm" name="login" action="UserMgmtLoginCheck.php" method="post">
                    <h1 id="h1Form">Log In</h1>
                    <fieldset id="inputs">
                        <input id="username" type="text" name="username" placeholder="Username" autofocus required>   
                        <input id="password1" type="password"  name="password" placeholder="Password" required>
                    </fieldset>
                    <fieldset id="actions">
                        <input type="submit" id="loginSubmit" value="LOG IN">
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
	# Close the dbc connection
	mysqli_close($dbc);

	# Include the footer
	include ( 'includes/footer.php' );
?>
