<?php

/**
 * Fonctions sur les chaines en PHP
 */

// "Extraire" des chaines
$email = 'fiorella@boxydev.com';
$domain = substr(strstr($email, '@'), 1); // boxydev.com

echo 'Le domaine est '.$domain.'<br />'; // boxydev.com
echo 'Le domaine de 1er niveau est '.strstr($domain, '.').'<br />';
echo "L'utilisateur est ".strstr($email, '@', true).'<br />'; // fiorella

// Vérifier qu'une chaine contient quelque chose
$sentence = 'DéFaire ou ne pas faire';
// mb_ permet de prendre en compte les accents
// La phrase contient le mot faire donc on affiche la position du mot
echo mb_stripos($sentence, 'faire').'<br />';
// mb_strpos(strtolower($sentence), 'faire');
// La phrase ne contient pas le mot rien (false)
var_dump(mb_stripos($sentence, 'rien'));
echo '<br />';

// Remplacer une chaine dans une chaine
echo str_replace('boxydev', 'gmail', $email).'<br />';

// Afficher fiorella
echo substr($email, 0, 8).'<br />';

// Afficher boxydev
echo substr($email, 9, -4).'<br />';

// Afficher com
echo substr($email, -3).'<br />';

// echo strlen($email);
echo $email[8].'<br />'; // @

// Transformation de tableaux en chaines et vice versa
$countries = ['Italie', 'Portugal', 'France'];

echo '<li>'.implode('</li><li>', $countries).'</li>';

$cars = 'porsche,renault,bmw,mercedes,audi';

$carsArray = explode(',', $cars);

$carsArray = array_map(function ($car) {
    return ucfirst($car);
}, $carsArray); // On parcourt chaque élément et on le modifie

// On peut filtrer les valeurs d'un tableau
$carsArray = array_filter($carsArray, function ($car) {
    return strtolower($car) != 'audi' && strtolower($car) != 'bmw';
});

var_dump($carsArray);
echo '<br />';

// Quelques fonctions pour "protéger" les chaines
$message = '    <script>alert("Hello World")</script>    ';
$message = trim($message); // Enlève les espaces
// $message = strip_tags($message); // Supprime les balises
$message = htmlspecialchars($message); // On interprète pas les balises HTML
var_dump($message);
echo $message;
