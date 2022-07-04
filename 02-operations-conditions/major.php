<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Majeur</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="text-center my-4">
    <?php
        $age = 16;

        if ($age >= 18) { ?>
        <p class="text-green-500">Vous êtes majeur</p>
    <?php } else if ($age >= 16 && $age < 18) { ?>
        <p class="text-orange-200">Vous êtes presque majeur</p>
    <?php } else if ($age >= 14) { ?>
        <p class="text-blue-400">Vous êtes jeune</p>
    <?php } else { ?>
        <p class="text-red-400">Vous êtes trop jeune</p>
    <?php } ?>
</body>
</html>
