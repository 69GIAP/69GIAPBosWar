
INSERT into version (simulation, dbVersion, buildDate, description)
SELECT 'RoF', '0.1.0.3','2013-11-30 14:30:00', 'Alpha Phase: Version ';

SELECT * FROM boswar_db.version
order by simulation, buildDate ;
