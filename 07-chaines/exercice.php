<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <?php
        function acronym($words) {
            // Transformer la phrase en tableau de mots
            $words = explode(' ', $words);

            $acronym = '';

            foreach ($words as $word) {
                $acronym .= strtoupper(substr($word, 0, 1));
            }

            return $acronym;

            // Parcourir le tableau
            // $acronym = array_map(function ($word) {
                // Pour chaque mot du tableau, on récupère la première lettre
            //     return strtoupper(substr($word, 0, 1));
            // }, $words);

            // return implode('', $acronym);
        }

        function conjugate($verb) {
            if (!$verb) { // si le verbe est vide, on ne fait rien
                return;
            }

            // Je récupère le radical
            $radical = substr($verb, 0, -2);

            // Préparer un tableau avec les pronoms et les terminaisons
            $subjects = [
                'Je ' => 'e',
                'Tu ' => 'es',
                'Il / Elle / On ' => 'e',
                'Nous ' => 'ons',
                'Vous ' => 'ez',
                'Ils ' => 'ent'
            ];

            // Est-ce que le radical se termine par un g ?
            if (substr($radical, -1) === 'g') {
                // Modifier la valeur d'un tableau
                $subjects['Nous '] = 'eons'; // On REMPLACE ons dans le tableau car la clé existe déjà
            }

            // Exception j'
            $vowels = ['a', 'e', 'h', 'i', 'o', 'u', 'y'];
            if (in_array(substr($radical, 0, 1), $vowels)) { // Si la première lettre est une voyelle
                unset($subjects['Je ']); // Supprime l'index Je
                $subjects = array_merge(['J\'' => 'e'], $subjects); // On ajoute le J' au début du tableau grâce à une fusion
            }

            $conjugates = [];

            // Conjuguer
            foreach ($subjects as $subject => $ending) {
                $conjugates[] = $subject.$radical.$ending;
            }

            return implode('<br />', $conjugates);
        }
    ?>

    <div class="max-w-4xl mx-auto">
        <form method="post" action="">
            <div class="flex items-center justify-between">
                <div class="w-1/2">
                    <label for="acronym" class="block">Acronyme</label>
                    <input type="text" name="acronym" id="acronym" class="w-full mt-2" value="<?= $_POST['acronym'] ?? null; ?>">
                </div>
                <div class="w-1/4 text-center">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Générer</button>
                </div>
                <div class="w-1/4 text-center">
                    <?= acronym($_POST['acronym'] ?? null); ?>
                </div>
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="w-1/2">
                    <label for="verb" class="block">Conjuguer</label>
                    <input type="text" name="verb" id="verb" class="w-full mt-2" value="<?= $_POST['verb'] ?? null; ?>">
                </div>
                <div class="w-1/4 text-center">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Générer</button>
                </div>
                <div class="w-1/4 text-center">
                    <?= conjugate($_POST['verb'] ?? null); ?>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
