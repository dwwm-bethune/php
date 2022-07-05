<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableaux</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <h2>Les capitales</h2>

    <?php
        $capitales = [
            'France' => 'Paris',
            'Espagne' => 'Madrid',
            'Italie' => 'Rome',
        ];

        foreach ($capitales as $country => $city) {
            echo "<p>La capitale de $country est $city.</p>";
        }
    ?>

    <h2>Population avec 20M</h2>

    <?php
        $population = [
            'France' => 67595000,
            'Suede' => 9998000,
            'Suisse' => 8417000,
            'Kosovo' => 1820631,
            'Malte' => 434403,
            'Mexique' => 122273500,
            'Allemagne' => 82800000,
        ];

        $sum = 0;
        foreach ($population as $country => $pop) {
            if ($pop >= 20 * 10 ** 6) {
                echo "<p>$country</p>";
            }

            if ($country != 'Mexique') {
                $sum += $pop;
            }
        }

        echo "<p>Population Europe : $sum</p>";
    ?>
</body>
</html>
