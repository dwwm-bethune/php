<?php

// Configuration BDD
define('DB_HOST', 'localhost');
define('DB_NAME', 'reviews');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// PHP se connecte au SQL s'il y arrive sinon on renvoie une erreur
try {
    $db = new PDO('mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME, DB_USER, DB_PASSWORD, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (Exception $exception) {
    echo '<h1>'.$exception->getMessage().'</h1>';
    die; // On arrête le code PHP
}
