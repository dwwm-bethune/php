<?php

// Preg Match : Cherche et trouve une correspondance
$regex = '/io/';
$string = 'Je suis Fiorella mais on m\'appelle Fiofio.';
$founds = [];

if (preg_match($regex, $string)) {
    echo 'io est présent '.preg_match_all($regex, $string, $founds).' fois.';
    var_dump($founds);
}

// Preg Filter ou Preg Replace : Remplace une correspondance
$regex = '/Jour/i';
$string = 'Bonjour, je suis Fiorella. Il fait Jour.';
$result = preg_filter($regex, 'soir', $string);

echo $result;

// Split
$regex = '/ |, |\./';
$string = 'Bonjour, je suis Fiorella.';

var_dump(array_filter(preg_split($regex, $string)));

// Classes de caractères
$regex = '/l[a\-e]/i';
$string = 'Le ou la sont ok pour la regex lb l- ld.';
$array = [];

preg_match_all($regex, $string, $array);
var_dump($array);

$regex4 = '/[\^a-zA-Z0-9é&,]/'; // Prendre [, ], / et \
$string = 'Salut [Fiorella] \0/ ^^';
$array = [];

preg_match_all($regex4, $string, $array);
var_dump($array);

$regex = '/|/';
$string = 'Je suis Fiorella mais on m\'appelle Fiofio.';

if (preg_match($regex, $string)) {
    echo 'io ou ella sont présents '.preg_match_all($regex, $string).' fois.';
}

echo '<br /><br /><br /><br /><br /><br />';

$regex1 = '/f(io)/'; // On cherche fio ou io
$regex2 = '/(fio){2}/'; // On cherche fiofio
$string = 'fiorella.io';
$array = [];

preg_match_all($regex1, $string, $array);
var_dump($array);
