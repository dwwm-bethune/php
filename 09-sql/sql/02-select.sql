-- Le SELECT permet de récupèrer les données dans une table
-- * signifie toutes les colonnes
SELECT * FROM movie;
SELECT title, duration FROM movie;

-- WHERE permet de filtrer ou de conditionner
-- On veut les films de plus de 3h
SELECT * FROM movie WHERE duration >= 180;
-- On veut afficher les films d'actions
SELECT * FROM movie WHERE category_id = 2;
-- On veut les films des années 80
SELECT * FROM movie WHERE released_at < '1990-01-01' AND released_at >= '1980-01-01';
-- On veut trier les films par durée
-- le where 1 = 1 est juste un exemple
SELECT * FROM movie WHERE 1 = 1 ORDER BY duration DESC;
-- On veut afficher 4 films aléatoires
SELECT * FROM movie WHERE 1 = 1 ORDER BY RAND() LIMIT 4;
-- Pour faire une pagination par exemple
SELECT * FROM movie ORDER BY title LIMIT 0, 2; -- OFFSET 0 LIMIT 2
SELECT * FROM movie LIMIT 2, 2; -- Page 2
SELECT * FROM movie LIMIT 4, 2; -- Page 3
