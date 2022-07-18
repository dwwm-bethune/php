<?php

// PHP se connecte au SQL
$db = new PDO('mysql:host=localhost;port=3306;dbname=webflix', 'root', '', [
    // Paamayim Nekudotayim => Opérateur de résolution de portée ::
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // On veut un tableau associatif en résultat
]);
http://localhost/php/09-sql/
// On va écrire une requête SQL dans le PHP
$query = $db->query('SELECT * FROM movie');

// On exécute la requête pour avoir un tableau avec tous les films
$movies = $query->fetchAll(); // Tableau qu'on va parcourir...

var_dump($movies);
