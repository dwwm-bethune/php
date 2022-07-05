<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <div class="text-center">
    <?php
        // Formater la date à partir d'un timestamp
        echo 'On est le '.date('d m Y').'<br />'; // 05 07 2022
        echo 'Il est '.date('H \h i \m s'); // 17 h 21 m 17
    ?>
    </div>

    <div class="text-center">
        <p>Timestamp: <?= time(); ?></p>
        <p>Timestamp anniversaire: <?= strtotime('18 november 1991'); ?></p>
        <p>Timestamp dans 1 mois: <?= strtotime('+ 1 month'); ?></p>
    </div>
</body>
</html>
