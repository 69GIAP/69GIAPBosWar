<?php 

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
					
					# include getCampaignVariables.php
					include ('includes/getCampaignVariables.php');
					
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					// get the airfield Name 
					$airfieldName = $_SESSION['airfieldName'];
					// check to see if 'existing' was the selected option
					if ($airfieldName) { // $airfieldName if not empty
					// split 'existing' into 1 parts at the '+'
					$Part = explode('+',$airfieldName,4);
					$airfieldName		= $Part[0];
					}
					
					# check if ther is already an entry inthe airfields_models table
					$query1 = "SELECT airfield_Name FROM airfields_Models WHERE airfield_Name = '$airfieldName' ;";
					
					if(!$result = $camp_link->query($query1)){
						die('There was an error running the query ' . $camp_link->error);
					}
					if ($result->num_rows > 0) {
						$exists = 1;
					} else {
						$exists = 0;
					}
					
					# initialize $query
					$query1 = '';
					
					# get POST variables
					foreach ($_POST as $param_name => $param_val) {

					# determine if airfield was activated by checkbox
					if ($param_name != $airfieldName && $param_val == 1) {
						# activate airfield base on airfield id
						$query1 .= "UPDATE airfields SET airfield_enabled = $param_val WHERE id = $param_name ;";
						# create an entry into the airfields_models table
						if ($exists != 1) {
							$query1 .= "INSERT INTO airfields_models (airfield_Name, airfield_Coalition) VALUES ('$airfieldName', $param_val);";
						}
						
					}
					# determine if airfield was deactivated by checkbox
					elseif ($param_name != $airfieldName && $param_val == 0){
						# deactivate airfield base on airfield id
						$query1 .= "UPDATE airfields SET airfield_enabled = $param_val WHERE id = $param_name ;";
						# remove all entries from the airfields_models table
						$query1 .= "DELETE from airfields_models WHERE airfield_Name like '$airfieldName' ;";
						
					}
					# change airfield coalition
					elseif ($param_name = $airfieldName) {
						# update new coalition in base table
						$query1 .= "UPDATE airfields SET airfield_Coalition = '$param_val' WHERE airfield_Name like '$param_name' ;";
						# remove all entries from the airfields_models table
						$query1 .= "UPDATE airfields_models SET airfield_Coalition = '$param_val' WHERE airfield_Name like '$param_name' ;";

					}
				}

				/* execute multi query */
				if ($camp_link->multi_query($query1)) {
					do {
						/* store first result set */
						if ($result = $camp_link->store_result()) {
							// do nothing as we don't expect feedback
							$result->free();
						}
					// need to include more_results to avoid strict checking warning
					} while ($camp_link->more_results() && $camp_link->next_result());
				}
				if ($camp_link->errno) { 
					echo "airfieldMgmgrStatusModify.php multi_query execution ended prematurely.<br>\n";
					echo $query1."<br>";
					var_dump($camp_link->error); 

				}
				else {
					
					header ("Location: airfieldMgmtChange.php?btn=campStp&airfieldName=$airfieldName");
				}
	   
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
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
