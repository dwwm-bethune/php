-- Inner Join avancé

-- On peut faire une sous requête dans le join
SELECT * FROM actor a
LEFT JOIN (SELECT * FROM movie_has_actor mha LEFT JOIN movie m ON mha.movie_id = m.id) mha ON a.id = mha.actor_id
WHERE movie_id = 1;

-- On peut enchainer les joins
SELECT * FROM movie m
INNER JOIN movie_has_actor mha ON m.id = mha.movie_id
INNER JOIN actor a ON a.id = mha.actor_id
WHERE movie_id = 1;

-- 1. Ecrire une requête permettant de trouver tous les films dans lesquels
-- Al Pacino a joué. Il faudra également la catégorie de chacun des films.
SELECT * FROM movie m
INNER JOIN movie_has_actor mha ON mha.movie_id = m.id
INNER JOIN actor a ON mha.actor_id = a.id
WHERE a.name = 'Pacino' AND a.firstname = 'Al';

-- 2. Afficher les acteurs qui ont joués dans la catégorie Action
-- DISTINCT permet d'avoir des résultats distincts
SELECT DISTINCT a.id, a.name, a.firstname FROM actor a
INNER JOIN movie_has_actor mha ON mha.actor_id = a.id
INNER JOIN movie m ON mha.movie_id = m.id
INNER JOIN category c ON m.category_id = c.id
WHERE c.name = 'Action';
