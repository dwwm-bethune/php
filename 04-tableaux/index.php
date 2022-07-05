<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableaux</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <h2>Les tableaux numériques</h2>

    <?php
        $drinks = ['Monster', 'Coca-cola', 'Orangina'];

        // Afficher Orangina ?
        echo $drinks[2];

        // Comment ajouter une boisson au tableau ?
        $drinks[] = 'Ice Tea';

        // Comment afficher toutes les boissons ?
        var_dump($drinks);
    ?>

    <ul>
    <?php foreach ($drinks as $index => $drink) { ?>
        <li><?= $index.' : '.$drink; ?></li>
    <?php } ?>
    </ul>

    <h2>Les tableaux associatifs</h2>

    <?php
        // Un tableau associatif possède des indexs que l'on définit nous-même.
        // Un index est unique. On n'est pas obligé de définir tous les indexs.
        $fruits = [
            'rouge' => 'Fraise',
            'jaune' => 'Banane',
            'Cerise',
            'orange' => 'Orange',
            'Pomme',
        ];

        // Afficher Banane ?
        echo $fruits['jaune'];

        var_dump($fruits);
    ?>

    <ul>
    <?php foreach ($fruits as $color => $fruit) { ?>
        <li><?= $color.' : '.$fruit; ?></li>
    <?php } ?>
    </ul>

    <h2>Les tableaux multidimensionnels</h2>

    <?php
        // Tableau à 3 dimensions...
        $utilisateurs = [
            [
                'name' => 'Mota',
                'firstname' => 'Fiorella',
                'phone' => '0600000000',
                'addresses' => ['Hulluch', 'Lens'],
            ],
            [
                'name' => 'Mota',
                'firstname' => 'Marina',
                'phone' => '0600000000',
                'addresses' => ['Hulluch'],
            ]
        ];

        // Comment afficher Fiorella Mota vit à Hulluch et Lens.  
    ?>
    <p><?= $utilisateurs[0]['firstname'].' '.$utilisateurs[0]['name'] ?> vit à <?= $utilisateurs[0]['addresses'][0].' et '.$utilisateurs[0]['addresses'][1]; ?></p>

    <!-- Comment afficher tous les utilisateurs avec toutes leurs adresses -->
    <?php foreach ($utilisateurs as $index => $utilisateur) { ?>
        <h1><?= $utilisateur['firstname'].' '.$utilisateur['name']; ?> vit à :</h1>

        <ul>
            <?php foreach ($utilisateur['addresses'] as $address) { ?>
                <li><?= $address; ?></li>
            <?php } ?>
        </ul>

        <?php if ($index == count($utilisateurs) - 1) { ?>
            <p>DERNIER !</p>
        <?php } ?>
    <?php } ?>

    <h3>Nous avons <?= count($utilisateurs); ?> utilisateurs.</h3>
</body>
</html>
