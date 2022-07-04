<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="text-center">
    <h2>1. Ecrire une boucle qui affiche les nombres de 10 à 1</h2>

    <?php for ($i = 10; $i >= 1; $i--) { ?>
        <span><?= $i; ?></span>
    <?php } ?>

    <h2>2. Ecrire une boucle qui affiche uniquement les nombres pairs entre 1 et 100</h2>

    <?php for ($i = 1; $i <= 100; $i++) {
        if ($i % 2 == 0) { ?>
            <span><?= $i; ?></span>
        <?php }
    } ?>

    <h2>3. Ecrire le code permettant de trouver le PGCD de 2 nombres</h2>

    <?php
    // tant que a ≠ b
    //     si a > b alors
    //        a := a − b
    //     sinon
    //        b := b − a

    $a = 96;
    $b = 36;

    while ($a != $b) {
        if ($a > $b) {
            $a = $a - $b;
        } else {
            $b = $b - $a;
        }
    } ?>

    <h3>Le PGCD de 96 et 36 est <?= $a; ?></h3>

    <h2>4. Coder le jeu du FizzBuzz ⭐</h2>

    <?php for ($i = 1; $i <= 100; $i++) {
        if ($i % 15 == 0) {
            echo "<p>FizzBuzz ($i)</p>";
        } elseif ($i % 5 == 0) {
            echo "<p>Buzz ($i)</p>";
        } elseif ($i % 3 == 0) {
            echo "<p>Fizz ($i)</p>";
        } else {
            echo "<p>$i</p>";
        }
    } ?>
</body>
</html>
