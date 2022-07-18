-- Récupère tous les films
SELECT * FROM `movie`;
SELECT * FROM `actor`;
SELECT * FROM `category`;
-- Récupère tous les films dans la catégorie "Films de gangster"
SELECT * FROM `movie` WHERE category_id = 1;
-- Récupère tous les films dans la catégorie "Films de gangster" qui sont sortis avant 1990
SELECT * FROM `movie` WHERE category_id = 1 AND released_at < '1990-01-01';
-- Récupère tous les films du plus récent au plus vieux
SELECT * FROM `movie` ORDER BY released_at DESC;
-- Récupère les films dans l'ordre aléatoire
SELECT * FROM `movie` ORDER BY RAND();
-- Récupère les 5 premiers films à partir du 4ème
SELECT * FROM `movie` LIMIT 3, 5; -- LIMIT 5 OFFSET 3;
-- Récupère le film le plus récent
SELECT * FROM `movie` ORDER BY released_at DESC LIMIT 1;
-- Récupère le film le plus ancien
SELECT * FROM `movie` ORDER BY released_at ASC LIMIT 1;
-- Récupère les acteurs nés avant 1960
SELECT * FROM `actor` WHERE birthday < '1960-01-01';

-- Exercice update et delete
INSERT INTO `actor` (`name`, `firstname`, `birthday`) VALUES ('Milou', 'Tintin', '1999-12-25');
INSERT INTO `movie` (`title`, `released_at`, `description`, `duration`, `cover`, `category_id`) VALUES ('Avengers Endgame', '2009-01-01', 'Lorem ipsum', 220, 'endgame.jpg', 2);
DELETE FROM actor WHERE firstname = 'Tintin' AND name = 'Milou';
UPDATE movie SET released_at = '2019-04-24' WHERE title = 'Avengers Endgame';
UPDATE movie SET released_at = '2019-02-19' WHERE title = 'Deadpool 2';
