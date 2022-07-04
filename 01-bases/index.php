<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le PHP</title>
</head>
<body>
    <h1>Introduction PHP</h1>
    <?php
        // L'instruction echo permet d'afficher du texte
        echo 'Hello PHP <br />';
        echo "<h2>Tu vas bien ?</h2> \n";
        // \n permet de passer à la ligne
        echo 'J\'affiche un "texte" <br />';
        // On peut bien sûr échapper les quotes

        $age = 30; // Un entier (integer)
        $monkeyEatBanana = true; // Booléen
        $price = 2.99; // Réel (float)
        $city = 'Béthune'; // Chaine (string)

        // Concaténation
        echo 'J\'ai '.$age.' ans et je vais à '.$city.' <br />';
        // Raccourci pour la concaténation avec l'interpolation
        // de variables
        echo "La variable \$price contient $price. <br />";
    ?>

    <a href="hello.php">Dire bonjour</a>
</body>
</html>
