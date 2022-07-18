<?php require __DIR__.'/partials/header.php'; ?>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Révisions</h1>

            <h2>Conditions</h2>
            <?php
                $heure = $_GET['heure'] ?? 13;

                echo "A $heure heures, ";

                if ($heure >= 5 && $heure < 12) {
                    echo 'c\'est le matin.';
                } elseif ($heure >= 12 && $heure < 18) {
                    echo 'c\'est l\'après midi.';
                } elseif ($heure >= 18 && $heure < 21) {
                    echo 'c\'est le soir.';
                } else {
                    echo 'c\'est la nuit.';
                }
            ?>

            <?php
                $isLogged = $_GET['logged'] ?? false;
            ?>

            <?php if (!$isLogged) { ?>
            <a class="btn btn-success" href="revisions.php?logged=1">Connexion</a>
            <?php } else { ?>
            <a class="btn btn-danger" href="revisions.php?logged=0">Déconnexion</a>
            <?php } ?>

            <h1>Boucles</h1>

            <?php
                echo '<h2>for</h2>';
                for ($i = 62000; $i <= 62100; $i++) {
                    echo $i.' - ';
                }

                echo '<h2>while</h2>';
                $i = 62100;
                while ($i <= 62200) {
                    echo $i++.' - ';
                }

                echo '<h2>foreach</h2>';
                foreach (range(62200, 62300) as $zip) {
                    echo $zip.' - ';
                }

                echo '<br><br>';

                $nombreATrouver = 435;
                $nombreEssais = 0;
                $dejaTeste = [];

                do {
                    $test = rand(0, 1000);

                    // Si le nombre n'est pas déjà sorti, on l'ajoute au tableau et on
                    // incrémente le nombre d'essais
                    if (!in_array($test, $dejaTeste)) {
                        $dejaTeste[] = $test; // On ajoute le nombre donné dans le tableau
                        $nombreEssais++;
                    }
                } while ($nombreATrouver != $test);

                echo 'PHP a trouvé le nombre '.$nombreATrouver.' en '.$nombreEssais.' fois';
            ?>

            <h1>Tableaux</h1>

            <?php
                $vehicules = [
                    ['marque' => 'Renault', 'modele' => 'Megane', 'prix' => 5000],
                    ['marque' => 'BMW', 'modele' => 'X2', 'prix' => 17000],
                    ['marque' => 'Alfa Roméo', 'modele' => '147', 'prix' => 6500],
                    ['marque' => 'Peugeot', 'modele' => '308', 'prix' => 12000],
                ];
            ?>

            <table class="table table-striped">
                <thead> <!-- Légende du tableau -->
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Prix</th>
                </thead>

                <?php foreach ($vehicules as $index => $vehicule) { ?>
                <tr>
                    <td><?php echo $vehicule['marque']; ?></td>
                    <td><?php echo $vehicule['modele']; ?></td>
                    <td><?php echo number_format($vehicule['prix'], 2, ',', ' '); ?> €</td>
                </tr>
                <?php } ?>
            </table>

            <br><br>

            <?php
                $vendeurs = [
                    'André' => ['Megane' => 0, 'Clio' => 3, 'Captur' => 0], // 60000
                    'Joe' => ['Megane' => 2, 'Clio' => 3, 'Captur' => 1], // 160000
                    'Eric' => ['Megane' => 1, 'Clio' => 1, 'Captur' => 1], // 90000
                ];

                $nbMeganes = 0;
                $nbClio = 0;
                $nbCaptur = 0;

                foreach ($vendeurs as $vendeur => $ventes) {
                    $nbMeganes += $ventes['Megane']; // $vendeurs['André']['Megane'];
                    $nbClio += $ventes['Clio'];
                    $nbCaptur += $ventes['Captur'];
                    $ca = $ventes['Megane'] * 30000 + $ventes['Clio'] * 20000 + $ventes['Captur'] * 40000;
                    echo $vendeur.' a vendu '.array_sum($ventes).' voitures pour '.$ca.'<br>';
                }

                // Autre solution...
                // echo array_sum(array_column($vendeurs, 'Megane')); // array_sum([0, 2, 1]);

                echo 'La mégane a été vendue '.$nbMeganes.' fois <br>';
                echo 'La clio a été vendue '.$nbClio.' fois <br>';
                echo 'La captur a été vendue '.$nbCaptur.' fois <br>';
            ?>

            <h1>Fonctions</h1>

            <?php
                function moyenne($tableau) {
                    return array_sum($tableau) / count($tableau);
                }

                echo 'La moyenne de '.implode(', ', [1, 2, 3]).' est '.moyenne([1, 2, 3]); // 2s

                echo '<br><br>';

                function html($contenu, $balise) {
                    if (!in_array($balise, ['h1', 'h2', 'p'])) {
                        $balise = 'p';
                    }

                    return "<$balise>$contenu</$balise>";
                }

                echo html('Salut', 'h2');
            ?>
        </div>
    </main>

<?php require __DIR__.'/partials/footer.php'; ?>
