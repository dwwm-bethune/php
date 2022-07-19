-- Compter le nombre de résultats
SELECT COUNT(id) as count_actor FROM actor;

-- Valeur max, mini, moyenne et somme
SELECT MAX(duration) as maxi, MIN(duration) as mini,
       ROUND(AVG(duration)) as average_duration,
       SUM(duration) as sum_duration, NOW()
FROM movie;

-- Date de maintenant
UPDATE user SET created_at = NOW() WHERE id = 1;

-- Alias sur la table
SELECT * FROM movie m WHERE m.id = 1;

-- Sous requête SQL
SELECT title FROM movie WHERE duration = (SELECT MAX(duration) FROM movie);

-- Compter le nombre de films (avec un alias)
SELECT COUNT(id) as count_movie FROM movie;

-- Avoir la moyenne des années de sortie des films
SELECT ROUND(AVG(YEAR(released_at))) FROM movie;

-- Récupérer le film le plus récent et le plus ancien (Sous requête)
SELECT * FROM movie
WHERE released_at = (SELECT MAX(released_at) FROM movie)
OR released_at = (SELECT MIN(released_at) FROM movie);
