
INSERT into version (simulation, dbVersion, buildDate, description, remark, revisor)
SELECT 'RoF', '0.1.0.10', NOW(), 'Alpha Phase: Version ', 'campaing configuration tracking introduced that required tables; GitHub: be70091878532f365ce0dac64b9a78cbacd59522 ', 'MYATA';

INSERT into version (simulation, dbVersion, buildDate, description, remark, revisor)
SELECT 'BoS', '0.0.0.10', NOW(), 'Alpha Phase: Version ', 'sidebar was synched with RoF sidebar', 'MYATA';

SELECT * FROM boswar_db.version
order by simulation, buildDate ;
