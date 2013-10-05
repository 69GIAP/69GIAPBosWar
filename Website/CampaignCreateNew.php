<?php 

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );

# clear some SESSION variables
#	unset ($_SESSION['camp_db']);
#	unset ($_SESSION['airfieldName']);
		
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );


?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
				<?php ?>
                    <ul id="sidebar">
                        <p>Create initial template - execute script col_10_to_template.php</p>
                        <li><a href="missionplanningPackage/col_10_to_template.php" class="campConnect"><span></span></a></li>
                        
                        <p>Planner has moved items to starting position. Load <b>template_allies_back.Group</b> file with template_to_col_10.php</p>                    
                        <li><a href="missionplanningPackage/template_to_col_10.php" class="campConnect"><span></span></a></li>
                        
                        <p>Copy information into new table (fallback savety) with Col_10_to_m1.php</p>                    
                        <li><a href="missionplanningPackage/Col_10_to_m1.php" class="campConnect"><span></span></a></li>                    
    
                        <p>Create the first mission file <b>allied_m1.Group</b> out of the new table with Mission_1_to_allied_M1.php <br />
                        With its help the planner can now plan waypoints.</p>                    
                        <li><a href="missionplanningPackage/Mission_1_to_allied_M1.php" class="campConnect"><span></span></a></li>
    
                        <p>Read back the information out of <b>allied_m1_back.Group</b> with allied_m1_back.php.</p>                    
                        <li><a href="missionplanningPackage/allied_m1_back.php" class="campConnect"><span></span></a></li> 
    
                        <p>Once all mission planners returned their files we generate the mission file <b>allied_m1_final.Group</b> with Mission_1_allied_write.php.</p>                    
                        <li><a href="missionplanningPackage/Mission_1_allied_write.php" class="campConnect"><span></span></a></li>   
	                </ul>                                   
                <?php ?>
            
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
