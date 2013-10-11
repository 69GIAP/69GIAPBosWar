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
					
				
                	echo "<h3>Stenkas Test</h3>";
                    echo "<li><a href=\"CampaignGroupFileTESTS.php?state=1\">testdataintocol_10.php</a></li>";
                    echo "<li><a href=\"CampaignGroupFileTESTS.php?state=2\">testdataintostatic.php</a></li>";
                    echo "<li><a href=\"CampaignGroupFileTESTS.php?state=3\">col_10_to_template.php</a></li>";
                    echo "<li><a href=\"CampaignGroupFileTESTS.php?state=4\">template_to_col_10.php</a></li>";
                    echo "<li><a href=\"CampaignGroupFileTESTS.php?state=5\">Col_10_to_m1.php</a></li>";
                    echo "<li><a href=\"CampaignGroupFileTESTS.php?state=6\">Mission_to_editor.php </a></li>";
                    echo "<li><a href=\"CampaignGroupFileTESTS.php?state=7\">mission_back.php</a></li>";
                    echo "<li><a href=\"CampaignGroupFileTESTS.php?state=8\">Mission_write.php</a></li>";
                ?>	<h3>Group File Upload script</h3>
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
