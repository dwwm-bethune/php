<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <?php
        $prices = [
            'Harry Potter' => ['value' => 'Harry Potter', 'price' => 1],
            'Batman' => ['value' => 'Batman', 'price' => 2],
            'Pokemon' => ['value' => 'Pokemon', 'price' => 3],
        ];

        if (!empty($_POST)) {
            $email = $_POST['email'] ?? null;
            $products = $_POST['products'] ?? [];

            $contenu = $email.' a commandé le '.date('d/m/Y H:i:s').': '.implode(', ', $products)."\n";
            file_put_contents('orders.txt', $contenu, FILE_APPEND);
        }

        $orders = explode("\n", file_get_contents('orders.txt'));
    ?>

    <div class="max-w-5xl mx-auto">
        <h1 class="text-3xl text-center">Commande</h1>

        <form action="" method="post" class="w-1/2 mx-auto">
            <div class="mb-3">
                <label for="email" class="block">Email</label>
                <input class="w-full" type="text" name="email" id="email">
            </div>

            <div class="mb-3">
                <label class="block">Produits</label>
                <?php foreach ($prices as $index => $price) { ?>
                <input type="checkbox" name="products[]" id="product-<?= $index; ?>" value="<?= $price['value']; ?>">
                <label for="product-<?= $index; ?>" class="mx-3"><?= $price['value']; ?> <?= $price['price']; ?></label>
                <?php } ?>
            </div>

            <button class="w-full bg-blue-400 hover:bg-blue-600 px-4 py-2 text-white rounded-lg shadow">Commander</button>
        </form>

        <?php if (!empty(array_filter($orders))) { ?>
            <h2 class="text-center mt-5 text-xl font-bold">Liste des commandes</h2>
            <ul class="text-center">
                <?php
                $total = 0;
                foreach (array_filter($orders) as $order) {
                    $totalOrder = 0;
                    $products = explode(', ', substr(strstr($order, ': '), 2));
                    foreach ($products as $product) {
                        $totalOrder += $prices[$product]['price'];
                    }
                    $total += $totalOrder;
                    ?>
                    <li>
                        <?= $order; ?> (<?= $totalOrder; ?> €)
                    </li>
                <?php } ?>
            </ul>
            <h2 class="text-center">Total des commandes: <?= $total; ?> €</h2>
        <?php } ?>
    </div>
</body>
</html>
