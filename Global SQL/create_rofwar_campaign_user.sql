/* 
   create_rofwar_campaign_user.sql
   =69.GIAP=TUSHKA
   Oct 11, 2013
   for testing: run this only after importing the four example campaign
   databases 
   Updated Oct 13, 2013
   Note: the DROP privilege for a campaign db user may only be needed for 
   testing, not production. It was added by =69.GIAP=MYATA
   CREATE privilege is needed as STENKAs process copies mission related data into seperate mission tables
   for the sake of rollback
*/

GRANT FILE ON *.* TO 'rofwar'@'localhost';
SET PASSWORD FOR 'rofwar'@'localhost' = PASSWORD('rofwar');
GRANT SELECT, INSERT, UPDATE, DELETE, DROP, CREATE ON bloody_april.* TO 'rofwar'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE, DROP, CREATE ON flanders_eagles.* TO 'rofwar'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE, DROP, CREATE ON skies_of_the_empires.* TO 'rofwar'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE, DROP, CREATE ON `1916`.* TO 'rofwar'@'localhost';
FLUSH PRIVILEGES;
