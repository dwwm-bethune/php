<?php
    require 'config/db.php';
    require 'config/helpers.php';

    // Récupère les valeurs du formulaire
    $name = post('name');
    $message = post('message');
    $errors = [];
    $success = false;

    if (isSubmit()) {
        if (empty($name)) {
            $errors['name'] = 'Le nom est invalide.';
        }

        if (strlen($message) < 15) {
            $errors['message'] = 'Le message est invalide.';
        }

        if (empty($errors)) {
            $success = insert('INSERT INTO contacts (name, message, created_at) VALUES (:name, :message, :created_at)', [
                'name' => $name,
                'message' => $message,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    $contacts = select('SELECT * FROM contacts');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <div class="max-w-5xl mx-auto my-8">
        <h1 class="text-3xl text-center mb-8">Nous contacter</h1>

        <?php if (!empty($errors)) { ?>
            <div class="bg-red-300 p-5 rounded border border-red-800 text-red-800 my-4">
                <?php foreach ($errors as $error) { ?>
                    <p><?= $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($success) { ?>
            <h2 class="text-green-500">Le message de <?= $name; ?> a été ajouté.</h2>
        <?php } ?>

        <form action="" method="post">
            <div class="flex gap-3 justify-between">
                <div class="w-1/3">
                    <label for="name" class="block">Nom</label>
                    <input class="w-full" type="text" name="name" id="name">
                </div>
                <div class="w-1/3">
                    <label for="message" class="block">Message</label>
                    <textarea class="w-full" name="message" id="message"></textarea>
                </div>
                <div class="w-1/3">
                    <label for="message" class="block">&nbsp;</label>
                    <button class="bg-emerald-300 hover:bg-emerald-500 text-emerald-800 hover:text-emerald-100 duration-500 rounded-md px-6 py-2">
                        Envoyer
                    </button>
                </div>
            </div>
        </form>

        <hr class="my-8" />

        <div class="flex">
            <?php
                foreach ($contacts as $contact) { ?>
                    <div class="w-1/4">
                        <h3>Contact <?php echo $contact['id']; ?></h3>
                        <p><?php echo $contact['name']; ?></p>
                        <p><?php echo $contact['message']; ?></p>
                        <p><?php echo $contact['created_at']; ?></p>
                    </div>
                <?php }
            ?>
        </div>
    </div>
</body>
</html>
