<?php

/**
 * Ici, je peux définir des variables ou des fonctions que je
 * peux réutiliser sur toutes mes pages.
 */

/**
 * Permet de récupèrer le nom de la page actuelle.
 */
function pageName() {
    return basename($_SERVER['REQUEST_URI'], '.php');
}
