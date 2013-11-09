<?php
// getRolename.php
// given Role ID, get Role Name
// =69.GIAP=MYATA
// Nov 9, 2013
// BOSWAR version 1.0 

// define the function 
function get_rolename($RoleID) {
global $dbc; // link to campaign db

	$query = "SELECT role 
				FROM users_roles 
				WHERE role_id = '$RoleID';";
	if($result = $dbc->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->role);
		}
	} else {
		die('getRolename query error [' . $dbc->error . ']');
	}
		// free result set
	$result->free();
}
?>
