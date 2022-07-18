<?php
// On définit une variable pour chaque champs afin de les retrouver facilement
$email = $_POST['email'] ?? null;
$subject = $_POST['subject'] ?? null;
$message = $_POST['message'] ?? null;
$civility = $_POST['civility'] ?? null;

// On prépare les erreurs et le succès
$success = false;
$errors = [];

$subjects = [
    'stage' => 'Proposition de stage',
    'job' => 'Proposition d\'emploi',
    'project' => 'Demande de projet',
];

// On vérifie que le formulaire est soumis
if (!empty($_POST)) {
    // On vérifie les champs
    if (empty($email)) {
        $errors['email'] = 'L\'email est obligatoire.';
    }

    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'L\'email est invalide.';
    }

    if (strlen($message) < 15) {
        $errors['message'] = 'Le message doit faire 15 caractères.';
    }

    // BONUS: Vérifier le sujet (par rapport à un tableau)
    // En gros, on veut vérifier que le sujet saisi est dans le tableau
    if (!$subject || !in_array($subject, ['stage', 'job', 'project'])) {
        $errors['subject'] = 'Le sujet est invalide.';
    }

    if ($civility != 'mme' && $civility != 'mr') {
        $errors['civility'] = 'La civilité est invalide.';
    }

    // Quand le formulaire est valide
    if (empty($errors)) {
        $success = true;
    }
}

require __DIR__.'/partials/header.php'; ?>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container my-5">
            <?php if (!empty($errors)) { ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error) { ?>
                        <p class="m-0"><?= $error; ?></p>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if ($success) { ?>

            <div class="alert alert-success">
                <p>Bonjour <?= $email; ?></p>
                <p>Sujet: <?= $subjects[$subject]; ?></p>
                <p>Message: <?= $message; ?></p>
                <p class="m-0">Civilité: <?= $civility; ?></p>
            </div>

            <?php } else { ?>

            <form method="post" action="">
                <div class="d-flex justify-content-between gap-3">
                    <div class="w-50">
                        <label for="email">Email</label>
                        <input class="form-control <?= isset($errors['email']) ? 'border border-danger' : ''; ?>" type="text" name="email" id="email" value="<?= $email; ?>">

                        <?php if (isset($errors['email'])) { ?>
                            <span class="text-danger"><?= $errors['email']; ?></span>
                        <?php } ?>
                    </div>
                    <div class="w-50">
                        <label for="subject">Sujet</label>
                        <select class="form-select <?= isset($errors['subject']) ? 'border border-danger' : ''; ?>" name="subject" id="subject">
                            <option disabled selected>Choisir un sujet</option>
                            <option <?= $subject == 'stage' ? 'selected' : '' ; ?> value="stage">Proposition de stage</option>
                            <option <?= $subject == 'job' ? 'selected' : '' ; ?> value="job">Proposition d'emploi</option>
                            <option <?= $subject == 'project' ? 'selected' : '' ; ?> value="project">Demande de projet</option>
                        </select>

                        <?php if (isset($errors['subject'])) { ?>
                            <span class="text-danger"><?= $errors['subject']; ?></span>
                        <?php } ?>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="message">Message</label>
                    <textarea class="form-control <?= isset($errors['message']) ? 'border border-danger' : ''; ?>" name="message" id="message" rows="5"><?= $message; ?></textarea>

                    <?php if (isset($errors['message'])) { ?>
                        <span class="text-danger"><?= $errors['message']; ?></span>
                    <?php } ?>
                </div>

                <div class="mt-3">
                    <p>Civilité</p>

                    <div class="d-flex gap-3 mt-2">
                        <div class="d-flex align-items-center">
                            <input <?= $civility == 'mme' ? 'checked' : '' ; ?> id="mme" name="civility" type="radio" class="<?= isset($errors['civility']) ? 'border border-danger' : ''; ?>" value="mme">
                            <label for="mme" class="ms-3">Mme</label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input <?= $civility == 'mr' ? 'checked' : '' ; ?> id="mr" name="civility" type="radio" class="<?= isset($errors['civility']) ? 'border border-danger' : ''; ?>" value="mr">
                            <label for="mr" class="ms-3">Mr</label>
                        </div>
                    </div>

                    <?php if (isset($errors['civility'])) { ?>
                        <span class="text-danger"><?= $errors['civility']; ?></span>
                    <?php } ?>
                </div>

                <div class="mt-3 text-center">
                    <button class="btn btn-primary">Envoyer</button>
                </div>
            </form>

            <?php } ?>
        </div>
    </main>

<?php require __DIR__.'/partials/footer.php'; ?>
