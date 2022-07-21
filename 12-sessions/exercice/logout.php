<?php

require 'config/helpers.php';

// Si un utilisateur est connecté, on le déconnecte
if (user()) {
    unset($_SESSION['user']);
}

// On redirige vers l'accueil
header('Location: index.php');
