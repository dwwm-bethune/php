<?php
    $pageUrl = basename($_SERVER['REQUEST_URI'], '.php');
?>
<!DOCTYPE html>
<html lang="fr" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>Sticky Footer Navbar Template · Bootstrap v5.2</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="d-flex flex-column h-100">
        <header>
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Include</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link <?= $pageUrl == 'index' ? 'active': ''; ?>" href="index.php">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageUrl == 'contact' ? 'active': ''; ?>" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageUrl == 'revisions' ? 'active': ''; ?>" href="revisions.php">Révisions</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Recherche">
                            <button class="btn btn-outline-success">Recherche</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
