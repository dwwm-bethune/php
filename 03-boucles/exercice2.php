<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <div>
    <?php for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < $i + 1; $j++) {
            echo '<span class="mx-1">🍣</span>';
        }
        echo '<br />';
    } ?>
    </div>
</body>
</html>
