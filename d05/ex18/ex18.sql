SELECT name, id_distrib FROM distrib
WHERE id_distrib IN (42,71,88,89,90) OR id_distrib BETWEEN 62 AND 69
OR name LIKE '%y%y%'
LIMIT 2,5;
