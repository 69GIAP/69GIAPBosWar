# V1.0
# Stenka 10/9/13
# Php to preprocess a mission file
<?php
# require is connecting user peter to stalingrad1 database
# here
require('../connect_db.php');
$stringer = '  Model = "graphics\\windsock.mgm";';
$Model = substr(strrchr($stringer, "\\"), 1);
$Model = substr($Model,0,-6);
echo '<br>result:'.$Model;
