<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableaux</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <h1>Bonjour Fiorella</h1>
    <?php
        $name = 'Toto'; // N'a rien à voir avec le $name dans le hello

        // On peut typer les fonctions mais c'est totalement optionnel
        function hello(string $name, int $age = 0): string {
            return 'Bonjour '.$name.', tu as '.$age.' ans';
        } ?>

        <h1 class="text-center"><?php echo strtoupper(hello('Fiorella', 2)); ?></h1>

        <?php
            function addition($n1, $n2): int|float {
                return $n1 + $n2;
            }
        ?>

        <p><?= addition(4, 8); ?></p>
        <p><?= addition(1, 3) + addition(5, 5); ?></p>
        <p>4 + 7 + 5 + 6 vaut <?= addition(addition(4, 7), addition(5, 6)); ?></p>
</body>
</html>
