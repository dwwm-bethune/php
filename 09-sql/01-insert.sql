-- Requête pour vider une table et remettre les ids à 0
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE category;
SET FOREIGN_KEY_CHECKS = 1;

-- Ajouter une donnée dans la table category
INSERT INTO category (name) VALUES ('Films de gangsters');

-- On peut en ajouter plusieurs
INSERT INTO `category` (`name`) VALUES ('Action'),
('Horreur'),
('Science-fiction'),
('Thriller');

-- Ajout des films
INSERT INTO `movie` (`title`, `released_at`, `description`, `duration`, `cover`, `category_id`) VALUES
('Le Parrain', '1972-01-01', 'Lorem ipsum', 186, 'le-parrain.jpg', 1),
('Scarface', '1983-01-01', 'Lorem ipsum', 120, 'scarface.jpg', 1),
('Les Affranchis', '1990-01-01', 'Lorem ipsum', 145, 'les-affranchis.jpg', 1),
('Heat', '1995-01-01', 'Lorem ipsum', 146, 'heat.jpg', 1),
('Die Hard', '1988-01-01', 'Lorem ipsum', 124, 'die-hard.jpg', 2);

-- Ajout des acteurs
INSERT INTO `actor` (`name`, `firstname`, `birthday`) VALUES
('Pacino', 'Al', '1940-04-25'),
('Brando', 'Marlon', '1924-04-03'),
('de Niro', 'Robert', '1943-08-17'),
('Willis', 'Bruce', '1955-03-19'),
('Liotta', 'Ray', '1954-12-18');
