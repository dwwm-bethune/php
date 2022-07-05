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
        $students = [
            0 => [
                'nom' => 'Matthieu',
                'notes' => [10, 8, 16, 20, 17, 16, 15, 2]
            ],
            1 => [
                'nom' => 'Thomas',
                'notes' => [4, 18, 12, 15, 13, 7]
            ],
            2 => [
                'nom' => 'Jean',
                'notes' => [17, 14, 6, 2, 16, 18, 9]
            ],
            3 => [
                'nom' => 'Enzo',
                'notes' => [1, 20, 6, 2, 1, 8, 9]
            ]
        ];
    ?>

    <h2 class="font-bold">Afficher la liste de tous les éléves avec leurs notes.</h2>

    <?php foreach ($students as $student) { ?>
        <h1>
            <?= $student['nom']; ?> a eu

            <?php foreach ($student['notes'] as $index => $note) {
                echo $note;

                // Afficher la virgule, le et ou rien.
                if ($index == count($student['notes']) - 2) {
                    echo ' et ';
                } else if ($index < count($student['notes']) - 1) {
                    echo ', ';
                }
            } ?>
        </h1>
    <?php } ?>

    <h2 class="font-bold">Calculer la moyenne de Jean. On part de $eleves[2]["notes"]</h2>

    <!-- array_sum fait la somme de toutes les valeurs d'un tableau -->
    <?php $average = array_sum($students[2]['notes']) / count($students[2]['notes']); ?>

    <h1>La moyenne de Jean est <?= round($average, 2); ?></h1>

    <h2 class="font-bold">Combien d'élèves ont la moyenne ?</h2>

    <?php
        $numberAverage = 0;
        foreach ($students as $student) {
            $average = array_sum($student['notes']) / count($student['notes']);

            echo '<p>'.$student['nom'];
        
            if ($average >= 10) {
                $numberAverage++; // Augmente de 1 le nombre de moyenne
                echo ' a la moyenne.</p>';
            } else {
                echo " n'a pas la moyenne.</p>";
            }
        }
    ?>

    <h1>Nombre d'éléves avec la moyenne : <?= $numberAverage; ?></h1>

    <h2 class="font-bold">Quel(s) éléve(s) a(ont) la meilleure note ?</h2>

    <?php
        // Trouver la meilleure note
        // [10, 8, 16, 20, 17, 16, 15, 2]
        $best = 0;
        foreach ($students as $student) {
            foreach ($student['notes'] as $note) {
                if ($note > $best) {
                    $best = $note;
                }
            }
        }

        // Trouver qui a cette meilleure note
        foreach ($students as $student) {
            foreach ($student['notes'] as $note) {
                if ($note == $best) {
                    echo '<p>'.$student['nom'].' a la meilleure note : '.$best.'</p>';
                    break; // Arrête le foreach des notes de l'élève
                }
            }
        }
    ?>

    <h2 class="font-bold">Qui a eu au moins un 20 ?</h2>

    <?php
        $has20 = false;
        foreach ($students as $student) {
            foreach ($student['notes'] as $student) {
                if ($note == 20) {
                    $has20 = true;
                    break 2; // break 2 arrête les 2 foreach
                }
            }
        }

        if ($has20) {
            echo "Quelqu'un a eu 20";
        } else {
            echo "Personne n'a eu 20";
        }
    ?>
</body>
</html>
