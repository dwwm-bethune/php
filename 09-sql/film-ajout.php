<?php
    require 'config/db.php';

    function sanitize($value) {
        // " <script>toto</script>  " devient "&lt;script&gt;toto&lt;/script&gt;"
        // La fonction strip_tags retire complètement la balise
        return trim(htmlspecialchars($value));
    }

    // Récupèrer les catégories
    $categories = $db->query('SELECT * FROM category')->fetchAll();

    // Récupère les valeurs du formulaire et on vérifie s'il est soumis
    $title = sanitize($_POST['title'] ?? null);
    $releasedAt = sanitize($_POST['released_at'] ?? null);
    $description = sanitize($_POST['description'] ?? null);
    $duration = sanitize($_POST['duration'] ?? null);
    $cover = sanitize($_POST['cover'] ?? null);
    $category = intval(sanitize($_POST['category'] ?? null)); // '1; DROP' devient 1
    $errors = [];
    $success = false;

    // Vérifier qu'on a soumis le formulaire
    if (!empty($_POST)) {
        if (strlen($title) < 2) {
            $errors['title'] = 'Le titre est trop court.';
        } else if (strlen($title) > 255) {
            $errors['title'] = 'Le titre est trop long.';
        }

        // Vérification de la date : 2022-02-01
        $date = explode('-', $releasedAt);
        if (!checkdate((int) ($date[1] ?? 0), (int) ($date[2] ?? 0), (int) ($date[0] ?? 0))) {
            $errors['released_at'] = 'La date n\'est pas valide';
        }

        if (strlen($description) <= 5) {
            $errors['description'] = 'La description est trop courte.';
        }

        if ($duration < 1 || $duration > 999) {
            $errors['duration'] = 'La durée n\'est pas valide';
        }

        // Vérification de la catégorie
        $exists = $db->query('SELECT COUNT(id) FROM category WHERE id = '.$category)->fetchColumn();
        if (!$exists) {
            $errors['category'] = 'La catégorie est invalide.';
        }

        if (empty($errors)) {
            // Requête SQL pour insérer le film
            $query = $db->prepare('INSERT INTO movie (title, released_at, description, duration, cover, category_id)
                VALUES (:title, :released_at, :description, :duration, :cover, :category_id)');
            $success = $query->execute([
                ':title' => $title,
                ':released_at' => $releasedAt,
                ':description' => $description,
                ':duration' => $duration,
                ':cover' => $cover,
                ':category_id' => $category,
            ]);
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un film</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <div class="max-w-5xl mx-auto">
        <h1 class="text-3xl text-center">Ajouter un film</h1>

        <?php if (!empty($errors)) { ?>
            <div class="bg-red-300 p-5 rounded border border-red-800 text-red-800 my-4">
                <?php foreach ($errors as $error) { ?>
                    <p><?= $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($success) { ?>
            <h2 class="text-green-500">Le film a été ajouté.</h2>
        <?php } ?>

        <form action="" method="post" class="w-1/2 mx-auto">
            <div class="mb-3">
                <label for="title" class="block">Titre</label>
                <input class="w-full" type="text" name="title" id="title">
            </div>
            <div class="mb-3">
                <label for="released_at" class="block">Date de sortie</label>
                <input class="w-full" type="date" name="released_at" id="released_at">
            </div>
            <div class="mb-3">
                <label for="description" class="block">Description</label>
                <textarea class="w-full" name="description" id="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="duration" class="block">Durée</label>
                <input class="w-full" type="text" name="duration" id="duration">
            </div>
            <div class="mb-3">
                <label for="cover" class="block">Image</label>
                <!-- @todo Upload de l'image -->
                <input class="w-full" type="text" name="cover" id="cover">
            </div>
            <div class="mb-3">
                <label for="category" class="block">Catégorie</label>
                <!-- Transformer le input en select avec chaque catégorie en option -->
                <!-- Pour avoir les catégories, il faudra faire un select en BDD -->
                <!-- On récupère un tableau, on le parcours et on affiche autant d'options que de catégorie -->
                <!-- On affiche le nom de la catégorie et l'id dans l'option -->
                <select class="w-full" name="category" id="category">
                    <option value="" disabled selected>Choisir une catégorie...</option>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <button class="bg-blue-400 hover:bg-blue-600 px-4 py-2 text-white rounded-lg shadow">Ajouter un film</button>
        </form>
    </div>
</body>
</html>
