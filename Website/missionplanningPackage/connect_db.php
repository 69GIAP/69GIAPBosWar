<?php
$camp_link=mysqli_connect
('localhost','peter','bartok','stalingrad1_db')
OR die
(mysqli_connect_error());
mysqli_set_charset($camp_link,'utf8');