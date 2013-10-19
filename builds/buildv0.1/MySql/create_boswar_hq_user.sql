/*
   import this sql file to create a user for the boswar_db
   Then use this user in connect_db.php
   =69.GIAP=TUSHKA
   Oct 11, 2013
*/

GRANT SELECT , INSERT , UPDATE , DELETE , CREATE , DROP ,
RELOAD , FILE , CREATE USER ON * . *
TO  'boswar_hq'@'localhost' IDENTIFIED BY 'boswar_password'
WITH GRANT OPTION ;
