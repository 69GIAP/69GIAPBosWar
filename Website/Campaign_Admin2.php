<?php 
# creates a new session for tracking the user is logged on 
	session_start(); 

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
	
# Incorporate the MySQL debug script.
	require ( 'includes/debug.php' );

# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

#  include connect2_db.php (defines connect_campaign())
	include ( 'includes/connect2campaign.php' );

?>

	<div id="wrapper">

        <div id="container">
	    <div id="content">
        	
               <h2>Campaign Admin2</h2>
				<?php
                    # This redirects the user to the Login screen if he gets here and is not logged on
                    include ( 'includes/errorNotLoggedOn.php' );
					
                    # get campaign database name from previous POST.
                       $_SESSION['loadedCampaign'] = $_POST["db"];
					   $camp_db = $_SESSION['loadedCampaign'];
					   echo "<p>The chosen campaign is stored to the SESSION variable \$_SESSION['campain'] and can be reused from now on to work with it.</p>\n";
					   echo "<p>Currectly the variable is filled with <b>$camp_db</b>.</p>\n";
                
                    # use it to get remaining variables
                    $query = "SELECT * from campaign_settings where camp_db = '$camp_db'";   
                    if(!$result = $dbc->query($query)) 
						{
                        	die('There was an error running the query [' . $dbc->error . ']');
                        }
                    
                    if ($result = mysqli_query($dbc, $query)) 
						{
                            /* fetch associative array */
                            while ($obj = mysqli_fetch_object($result)) 
								{
									$camp_host	=($obj->camp_host);
									$camp_user	=($obj->camp_user);
									$camp_passwd	=($obj->camp_passwd);
								}
						} 
                
                    # use this information to connect to campaign 
                    $camp_link = connect_campaign("$camp_host","$camp_user","$camp_passwd","$camp_db");
                
                    # do whatever is needed from the campaign database
                    
                    # Close the camp_link connection
                    mysqli_close($camp_link);
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
	# Close the dbc connection
	mysqli_close($dbc);

	# Include the footer
	include ( "includes/footer.php" );
?>
