/* 
   run this after importing the four example campaign databases 
   =69.GIAP=TUSHKA
   Oct 11, 2013
*/

CREATE USER 'rofwar'@'localhost' IDENTIFIED BY 'rofwar';
GRANT FILE ON *.* TO 'rofwar'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE, DROP ON bloody_april.* TO 'rofwar'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE, DROP ON flanders_eagles.* TO 'rofwar'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE, DROP ON skies_of_the_empires.* TO 'rofwar'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE, DROP ON `1916`.* TO 'rofwar'@'localhost';
FLUSH PRIVILEGES;
