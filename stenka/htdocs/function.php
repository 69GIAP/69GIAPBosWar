<?php
$result = 5+5;
echo "global result = $result<br>";

function square()
{
$result = 5 * 5;
echo "local result = $result<br>";
}
function cube()
{
$result = 5 * 5 *5;
echo "local result = $result<br>";
}
echo "Global sum result = $result<br>";
square();
cube();



?>