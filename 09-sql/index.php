<?php

require 'config/db.php';

// On va écrire une requête SQL dans le PHP
$query = $db->query('SELECT * FROM movie');

// On exécute la requête pour avoir un tableau avec tous les films
$movies = $query->fetchAll(); // Tableau qu'on va parcourir...

var_dump($movies);
