<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <?php
        // Pour ouvrir un fichier
        $file = fopen('log.txt', 'a+');

        // Pour écrire dans le fichier
        fwrite($file, "Salut le fichier\n");
        fclose($file); // On ferme le fichier pour "optimisation"

        // Raccourci pour écrire ce qui est avant
        if (!empty($_POST)) {
            $date = date('Y-m-d H:i:s');
            $message = $_POST['message'];
            file_put_contents('log.txt', "[".$date."] $message \n", FILE_APPEND);
        }

        // Pour lire dans le fichier
        // Filesize permet de trouver la taille d'un fichier
        $file = fopen('log.txt', 'r');
        $content = fread($file, filesize('log.txt'));
        fclose($file);
        // Raccourci
        $content = file_get_contents('log.txt');
        // On peut transformer le contenu du fichier en tableau
        $lines = explode("\n", $content);
    ?>

    <form action="" method="post">
        <input type="text" name="message">
        <button>Log</button>
    </form>

    <h2>Le fichier de log a été modifié le <?= date('d/m/Y à H:i:s', filemtime('log.txt')); ?></h2>

    <ul>
        <?php foreach ($lines as $line) { ?>
        <li><?= $line; ?></li>
        <?php } ?>
    </ul>

    <?php
        // On peut aussi lire le contenu d'un dossier
        $directory = opendir('..');

        while ($dir = readdir($directory)) {
            echo "<li>$dir</li>";
        }
    ?>
</body>
</html>
