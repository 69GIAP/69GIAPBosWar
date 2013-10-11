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
				
                	# This redirects the user to the Login screen if he tries to press a button and is not logged on
					include ( 'includes/errorNotLoggedOn.php' );
					
				?>
                    <form id="loginForm" name="login" action="uploadFile.php" method="post" enctype="multipart/form-data">
                        <h1 id="h1Form">Upload</h1>
                        <fieldset id="inputs">
                       		<input type="file" name="file" id="file" >
                        </fieldset>
                        <fieldset id="actions">
                        	<input type="submit" id="loginSubmit" name="submit" value="Submit">
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
