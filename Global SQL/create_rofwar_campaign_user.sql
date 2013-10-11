// create_rofwar_campaign_user.sql
// =69.GIAP=TUSHKA
// Oct 10, 2012
// run this only after importing the four example campaign databases
// bloody_april, flanders_eagles, skies_of_the_empires and 1916.
// if one or more is missing you will get errors.
// or comment out the ones you did not import before running this.
CREATE USER 'boswar'@'localhost' IDENTIFIED BY 'boswar';
GRANT FILE ON *.* TO 'boswar'@'localhost';
GRANT ALL ON `bloody_april`.* TO 'boswar'@'localhost';
GRANT ALL ON `flanders_eagles`.* TO 'boswar'@'localhost';
GRANT ALL ON `skies_of_the_empires`.* TO 'boswar'@'localhost';
GRANT ALL ON `1916`.* TO 'boswar'@'localhost';
