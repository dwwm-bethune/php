<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableaux</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="text-center">
    <?php
        // exo 1
        function square($number) {
            return $number * $number;
        }

        echo 'Le carré de 5 est '.square(5).' <br />'; // affiche 25

        // exo 2
        function areaRectangle($width, $height) {
            return $width * $height;
        }

        function areaCircle($rayon) {
            return round(pi() * square($rayon), 2);
        }

        echo 'L\'aire d\'un rectangle 5 / 10 est '.areaRectangle(5, 10).' <br />'; // affiche 50
        echo 'L\'aire d\'un cercle de rayon 5 est '.areaCircle(5).' <br />'; // affiche 78,5

        // exo 3 et exo 4
        function price($amount, $rate = 20, $withTaxes = true) {
            if (!$withTaxes) {
                return $amount / (1 + $rate / 100);
            }

            return $amount * (1 + $rate / 100); // 10 * 1.2
        }

        echo '10 ht vaut '.price(10).' ttc <br />'; // Afficher 12
        echo '10 ht vaut '.price(10, 30).' ttc <br />'; // Affiche 13 (30% de TVA)

        // true => HT vers TTC
        // false => TTC vers HT
        echo '12 ttc vaut '.price(12, 20, false).' ht <br />'; // affiche 10
        echo '10 ht vaut '.price(10, 20, true).' ht <br />'; // affiche 12
    ?>
</body>
</html>
