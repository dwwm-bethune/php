<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <h2 class="text-center">La boucle for</h2>

    <!-- Le for est composé d'une initialisation, une condition d'exécution et un code
    à exécuter à chaque itération. -->
    <ul class="text-center flex justify-center">
    <?php for ($i = 0; $i < 10; $i++) { ?>
        <li class="mx-3"><?= $i; ?></li>
    <?php } ?>
    </ul>

    <h2 class="text-center">La boucle foreach</h2>

    <?php
        $firstnames = ['Fiorella', 'Marina', 'Matthieu'];

        foreach ($firstnames as $index => $firstname) { ?>
            <h3 class="text-blue-600 text-center">
                <?= $index.' : '.$firstname; ?>
            </h3>
        <?php }
    ?>

    <h2 class="text-center">La boucle while</h2>

    <div class="text-center">
        <?php
            $i = rand(0, 10);
            while ($i !== 5) {
                echo $i.', ';
                $i = rand(0, 10);
            }
        ?>
        <p>Fin du while à <?= $i; ?></p>
    </div>
</body>
</html>
