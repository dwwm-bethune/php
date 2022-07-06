<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <div class="max-w-4xl mx-auto">
        <?php
            // On définit les variables au début pour pouvoir les utiliser dans le formulaire
            $number1 = $_GET['number1'] ?? null;
            $number2 = $_GET['number2'] ?? null;
            $operator = $_GET['operator'] ?? null;

            if (!empty($_GET)) { // On vérifie que le formulaire est soumis
                // Ici, on va vérifier que $number1 et $number2 sont bien des nombres
                if (is_numeric($number1) && is_numeric($number2)) {
                    // Ici, on fait le calcul
                    if ($operator === '+') {
                        $result = $number1 + $number2;
                    } else if ($operator === '-') {
                        $result = $number1 - $number2;
                    } else if ($operator === '/' && $number2 != 0) { // $number2 est une chaine ('0' ou '2')
                        $result = $number1 / $number2;
                    } else if ($operator === '*') {
                        $result = $number1 * $number2;
                    } else {
                        echo '<div class="text-center text-red-500 my-4">Attention on ne peut pas diviser par 0.</div>';
                        $result = '??';
                    } ?>

                    <div class="text-center text-green-500 my-4">Le résultat de <?= "$number1 $operator $number2 = $result"; ?></div>
                <?php } else {
                    echo '<div class="text-center text-red-500 my-4">Veuillez vérifier vos nombres</div>';
                }
            }
        ?>

        <form method="get" action="" class="text-center">
            <div class="mb-6">
                <label for="number1">Nombre 1</label>
                <input type="text" name="number1" id="number1" value="<?= $number1; ?>">
            </div>
            <div class="mb-6">
                <label for="number2">Nombre 2</label>
                <input type="text" name="number2" id="number2" value="<?= $number2; ?>">
            </div>
            <div class="mb-6">
                <label for="operator">Opérateur</label>
                <select name="operator" id="operator">
                    <option <?= $operator == '+' ? 'selected' : ''; ?> value="+">Addition (+)</option>
                    <option <?= $operator == '-' ? 'selected' : ''; ?> value="-">Soustraction (-)</option>
                    <option <?= $operator == '/' ? 'selected' : ''; ?> value="/">Division (/)</option>
                    <option <?= $operator == '*' ? 'selected' : ''; ?> value="*">Multiplication (x)</option>
                </select>
            </div>

            <button class="bg-blue-600 px-3 py-2 rounded text-blue-200">Calculer</button>
        </form>
    </div>
</body>
</html>
