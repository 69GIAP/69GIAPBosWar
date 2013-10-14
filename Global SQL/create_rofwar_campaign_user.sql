/* 
   create_rofwar_campaign_user.sql
   =69.GIAP=TUSHKA
   Oct 11, 2013
   for testing: run this only after importing the four example campaign
   databases 
   Updated Oct 13, 2013 with DROP USER statement in case of preexisting user
   and a preceeding GRANT USAGE (harmless) on same user to ensure one exists
   Note: the DROP privilege for a campaign db user may only be needed for 
   testing, not production. It was added by =69.GIAP=MYATA
*/

GRANT USAGE ON *.* TO 'rofwar'@'localhost';
DROP USER 'rofwar'@'localhost';
CREATE USER 'rofwar'@'localhost';
SET PASSWORD FOR 'rofwar'@'localhost' = PASSWORD('rofwar');
GRANT FILE ON *.* TO 'rofwar'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE, DROP ON bloody_april.* TO 'rofwar'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE, DROP ON flanders_eagles.* TO 'rofwar'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE, DROP ON skies_of_the_empires.* TO 'rofwar'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE, DROP ON `1916`.* TO 'rofwar'@'localhost';
FLUSH PRIVILEGES;
