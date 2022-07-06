<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitcoin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <div class="max-w-4xl mx-auto">
        <?php
            $amount = (float) ($_POST['amount'] ?? null);
            $currency = $_POST['currency'] ?? null;

            if (!empty($_POST)) { // Vérifie que le formulaire est soumis
                $rate = 19567.89;

                // BONUS API
                // file_get_contents() permet de récupérer le contenu d'une URL (API par exemple)
                // @ devant le code permet de mettre en silence les erreurs qu'on pourrait avoir en appellant l'API...
                // json_decode transforme une chaine de caractères JSON en tableau PHP
                // $response = @file_get_contents('https://api.nomics.com/v1/currencies/ticker?key=5128ba9ab4a8d842465058e59a50447bdc32342c&ids=BTC');
                // $response = json_decode($response, true);
                // $rate = $response[0]['price'] ?? 19567.89;
                
                // number_format permet de formater correctement un nombre
                // 24567.89 => 24 967,89
                // echo number_format(24567.89, 2, ',', ' ');

                if ($currency == 'eur') {
                    $result = number_format($amount / $rate, 7); // 1 euro vaut 0,0000506 bitcoins
                    echo "$amount euros valent $result bitcoins.";
                } else if ($currency == 'bit') {
                    $result = number_format($amount * $rate, 2, ',', ' '); // 25 678,76
                    echo "$amount bitcoins valent $result euros.";
                }
            }
        ?>

        <form method="post" action="" class="text-center">
            <div class="mb-6">
                <label for="amount">Montant</label>
                <input type="text" name="amount" id="amount" value="<?= $amount; ?>">
            </div>

            <div class="mb-6">
                <label for="currency">Devise</label>
                <select name="currency" id="currency">
                    <option <?= $currency == 'eur' ? 'selected' : ''; ?> value="eur">Euros vers Bitcoins</option>
                    <option <?= $currency == 'bit' ? 'selected' : ''; ?> value="bit">Bitcoins vers Euros</option>
                </select>
            </div>

            <button class="bg-blue-600 px-3 py-2 rounded text-blue-200">Convertir</button>
        </form>

        <?php
            
        ?>
    </div>
</body>
</html>
