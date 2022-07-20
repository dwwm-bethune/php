<?php

/**
 * Permet de récupèrer facilement un champ en POST
 */
function post($field) {
    return sanitize($_POST[$field] ?? null);
}

/**
 * Permet de nettoyer une valeur
 */
function sanitize($value) {
    return trim(htmlspecialchars($value));
}

/**
 * Permet de vérifier si un formulaire est soumis.
 */
function isSubmit() {
    return !empty($_POST);
}

/**
 * Permet de faire un insert en SQL.
 */
function insert($sql, $bindings = []) {
    // global permet d'accèder à une variable extérieure à la fonction
    global $db;

    return $db->prepare($sql)->execute($bindings);
}

/**
 * Permet de faire un select en SQL.
 */
function select($sql) {
    global $db;

    return $db->query($sql)->fetchAll();
}
