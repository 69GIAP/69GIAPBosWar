<?php 
# WIP Stenka 7/5/14
# Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
		
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );


?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
				<?php
					# include connect2CampaignFunction.php
					include ( 'functions/connect2Campaign.php' );
		
					# use it to get remaining variables
					$query = "SELECT * from campaign_settings where camp_db = '$loadedCampaign'";  
		 
					if(!$result = $dbc->query($query)) {
						die('There was an error running the query [' . $dbc->error . ']');
					}
		
					if ($result = $dbc->query($query)) {
						/* fetch associative array */
						while ($obj = $result->fetch_object()) {
							$campaign	=($obj->campaign);
							$camp_host	=($obj->camp_host);
							$camp_user	=($obj->camp_user);
							$camp_passwd=($obj->camp_passwd);
							$camp_status_id=($obj->status);
							
							# get campaign status
							$sql="SELECT campaign_status FROM campaign_status where id = $camp_status_id";
							if ($result = $dbc->query($sql)) {
							/* fetch associative array */
							while ($obj = $result->fetch_object()) {
								$camp_status=($obj->campaign_status);
								}
							}
						}
					} 
									
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
					# mission 1 has been run we are preparing for mission 2
					# we need entry of mission number in screen - here I am hardcoding it
					$mission_no = 1;
					# here I will open post_mortem and read where mission_no matches and processed = 0
					$q1 = "select * from post_mortem where mission_no = $mission_no and processed = 0";
					$r1 = mysqli_query($camp_link,$q1);
					$num = mysqli_num_rows($r1);
					if ($num > 0)
					{
						echo '<br>Records in post_mortem';
						# start a loop till end of selection							
						while ($row = mysqli_fetch_array($r1,MYSQLI_ASSOC))
						{
							$deleted = 0;
							echo '<br>'.$row['id'].'|'.$row['Name'].$row['Model'];
							# load id name and model to variables
							$current_rec = $row['id'];
							$current_Name = $row['Name'];
							$coalition = $row['coalition'];
							$Model = $row['Model'];
							# reduce quantity -1 in columns for model and name limit 1
							$q2 = "update columns set Quantity = (Quantity -1) where Model = ".'"'.$Model.'" and Name = "'.$current_Name.'" and CoalID = "'.$coalition.'" LIMIT 1';
							echo "<br>".$q2;
							$r2 = mysqli_query($camp_link,$q2);
							$deleted = (mysqli_affected_rows($camp_link));
							echo "<br>Killed ".$deleted;
							if ($deleted == 1)
							# if successful set processed = 1 in post_mortem for id
							{
							$q3 = "update post_mortem set processed = 1 where id = $current_rec";
							$r3 = mysqli_query($camp_link,$q3);
							$processed = (mysqli_affected_rows($camp_link));
							echo "<br>Processed ".$processed;
							}
							# else delete in statics for model and name limit 1
							else
							{
								$q4 = "delete from statics where static_model = ".'"'.$Model.'" and static_Name ="'.$current_Name.'" and static_coalition ="'.$coalition.'" LIMIT 1';
								echo "<br>".$q4;
								$r4 = mysqli_query($camp_link,$q4);
								$deleted = (mysqli_affected_rows($camp_link));
								echo "<br>Killed ".$deleted;
								if ($deleted == 1)
								# if successful set processed = 1 in post_mortem for id
								{
								$q5 = "update post_mortem set processed = 1 where id = $current_rec";
								$r5 = mysqli_query($camp_link,$q5);
								$processed = (mysqli_affected_rows($camp_link));
								echo "<br>Processed ".$processed;
								}
							}
							# if successful set processed = 1 in post_mortem for id					
							# end loop from post mortem
						}
					}
                ?>
                <p>Draft Menu</p>
            
            </div>
    
        </div>

		<?php
            # Include the general sidebar
            include ( 'includes/sidebar.php' );
        ?>	

		<div id="clearing"></div>
	</div>

<?php
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
