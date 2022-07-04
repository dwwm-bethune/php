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
        
    </div>
</body>
</html>
