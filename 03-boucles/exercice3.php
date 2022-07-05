<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <?php $table = 5; ?>

    <div class="text-center">
        <h2>Table de <?= $table; ?></h2>
        <?php for ($multiple = 1; $multiple <= 10; $multiple++) { ?>
            <p><?= $table.' x '.$multiple.' = '.$table * $multiple; ?></p>
        <?php } ?>
    </div>

    <div class="text-center flex flex-wrap">
    <?php for ($table = 1; $table <= 10; $table++) { ?>
        <div class="w-1/5 my-4">
            <h2>Table de <?= $table; ?></h2>
            <?php for ($multiple = 1; $multiple <= 10; $multiple++) { ?>
                <p><?= $table.' x '.$multiple.' = '.$table * $multiple; ?></p>
            <?php } ?>
        </div>
    <?php } ?>
    </div>
</body>
</html>
