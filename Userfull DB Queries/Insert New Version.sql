
INSERT into version (simulation, dbVersion, buildDate, description, remark, revisor)
SELECT 'RoF', '0.1.0.11', NOW(), 'Alpha Phase: Version ', 'new aircraft assignment interface created', 'MYATA';

INSERT into version (simulation, dbVersion, buildDate, description, remark, revisor)
SELECT 'BoS', '0.0.0.10', NOW(), 'Alpha Phase: Version ', 'sidebar was synched with RoF sidebar', 'MYATA';

SELECT * FROM boswar_db.version
order by simulation, buildDate ;
