<?php
# test insert backslash with and without mysql_real_escape_string
# =69.GIAP=TUSHKA
# Sept 19, 2013
# actually the backslash doesn't trigger an error, but doesn't get into the
# database.  I needed the "'" to trigger the error.  :)
# Also note the use of a temporary table
# it goes away when the connection is closed

# make connection
require ( '../connect_db.php' );

mysqli_query($dbc, "CREATE TEMPORARY TABLE tmp_users LIKE users");

$username = "==69\GIAP==0'TUSHKA";

/* this query will fail, cause we didn't escape $username */
if (!mysqli_query($dbc, "INSERT into tmp_users (username) VALUES ('$username')")) {
    printf("Error: %s<br>\n", mysqli_sqlstate($dbc));
}

$username = mysqli_real_escape_string($dbc, $username);

/* this query with escaped $username will work */
if (mysqli_query($dbc, "INSERT into tmp_users (username) VALUES ('$username')")) {
    printf("%d Row inserted.\n", mysqli_affected_rows($dbc));
}

mysqli_close($dbc);
?>

