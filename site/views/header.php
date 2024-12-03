<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid p-0">
                <!-- Couture For Fun à gauche -->
                <a class="navbar-brand" href="../views/accueil.php">
                    <img src="../img/logo.png" alt="Couture for fun Logo">
                </a>
                <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mt-2 p-1" id="navbarNav">
                    <ul class="navbar-nav">
                        <!-- Les éléments à gauche -->
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="../views/cours.php">Inscription aux cours</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="../views/devis.php">Faire un devis</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="../views/contact.php">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Les éléments à droite -->
                        <?php
                            if (session_status() === PHP_SESSION_NONE) {
                                session_start();
                            }
                            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                                echo '<li class="nav-item ms-2">';
                                echo '<a class="nav-link" href="../controllers/logout_process.php">Déconnexion</a>';
                                echo '</li>';
                                echo '<li class="nav-item ms-2">';
                                echo '<a class="nav-link" href="../views/profil.php">' . $_SESSION["username"] . '</a>';
                                echo '</li>';
                            } else {
                                echo '<li class="nav-item ms-2">';
                                echo '<a class="nav-link" href="../views/login.php">Connexion / Créer un compte</a>';
                                echo '</li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
