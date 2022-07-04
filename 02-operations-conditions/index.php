<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <h2 class="text-center text-3xl">Opérations en PHP</h2>

    <?php
        $nombre1 = 3;
        $nombre2 = 4;
        $nombre3 = 5;

        $resultat1 = $nombre1 + $nombre2;
    ?>

    <div class="bg-gray-200 max-w-lg mx-auto p-4 text-center">
        <p>3 + 4 = <?php echo $resultat1; ?></p>
        <p>4 x 5 = <?php echo $nombre2 * $nombre3; ?></p>
        <?php // Arrondir un nombre à 2 chiffres après la virgule ?>
        <p>5 / 3 = <?php echo round($nombre3 / $nombre1, 2); ?></p>
        <p>5 % 3 = <?= 5 % 3; ?></p>
        <p>2 <sup>3</sup> = <?php echo 2 ** 3; ?></p>
    </div>

    <h2 class="text-center">Opérateurs d'incrémentation</h2>

    <div class="bg-gray-200 max-w-lg mx-auto p-4 text-center">
        <p>Résultat1 + 3 = <?php echo $resultat1 += 3; ?></p>
        <p>Résultat ++ = <?php echo $resultat1++; ?></p>
        <p><?php echo $resultat1; ?></p>
        <p>
            <?php
                $sentence = 'Hello';
                $sentence .= ' Fiorella';
                echo $sentence;
            ?>
        </p>
    </div>

    <h2 class="text-center">Comparaisons en PHP</h2>

    <div class="bg-gray-200 max-w-lg mx-auto p-4 text-center">
        <!-- En PHP, on a la fonction var_dump qui va nous aider à debug -->
        <p>Est-ce que nombre1 == 3 ? <?php var_dump($nombre1 == '3a'); ?></p>
        <!-- == compare la valeur et === compare la valeur et le type --> 
        <p>Est-ce que nombre1 === '3' ? <?php var_dump($nombre1 === '3'); ?></p>

        <?php
            $isLogged = true;

            if ($isLogged) {
                echo 'Vous êtes connecté';
            } else {
                echo 'Vous n\'êtes pas connecté';
            }
        ?>
    </div>

    <h2 class="text-center">Conditions en PHP</h2>

    <div class="bg-gray-200 max-w-lg mx-auto p-4 text-center">
        <?php
            // Pour aller au restaurant, on doit avoir le vaccin ou un test PCR
            $isVaccinated = false;
            $isTested = true;

            if ($isVaccinated || $isTested) { ?>
                <p class="text-green-500">Je vais au restaurant</p>
            <?php } else { ?>
                <p class="text-red-500">Je ne peux pas aller au restaurant</p>
            <?php }

            // Si on a aucune des deux conditions
            if (!$isVaccinated && !$isTested) { ?>
                <p class="text-blue-500">Il va falloir quelque chose</p>
            <?php } elseif (!$isVaccinated && $isTested) { ?>
                <p class="text-blue-500">Faire le vaccin</p>
            <?php }

            echo $a;
            echo 1 / 0;
            echo 'toto';
            echo 'ça marche ?';
        ?>
    </div>
</body>
</html>
