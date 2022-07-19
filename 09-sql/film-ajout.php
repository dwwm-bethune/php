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

        <form action="" method="post">
            <div class="mb-3">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="mb-3">
                <label for="released_at">Date de sortie</label>
                <input type="date" name="released_at" id="released_at">
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="duration">Durée</label>
                <input type="text" name="duration" id="duration">
            </div>
            <div class="mb-3">
                <label for="cover">Image</label>
                <input type="text" name="cover" id="cover">
            </div>
            <div class="mb-3">
                <label for="category">Catégorie</label>
                <!-- Transformer le input en select avec chaque catégorie en option -->
                <!-- Pour avoir les catégories, il faudra faire un select en BDD -->
                <!-- On récupère un tableau, on le parcoure et on affiche autant d'options que de catégorie -->
                <!-- On affiche le nom de la catégorie et l'id dans l'option -->
                <input type="text" name="category" id="category">
            </div>
        </form>
    </div>
</body>
</html>
