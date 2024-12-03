<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur d'inscription</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include_once "../views/header.php"; ?>
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Erreur d'inscription</h4>
            <p>Vous êtes déjà inscrit au(x) cour(s) suivant :</p>
            <ul>
                <?php
                // Afficher les cours auxquels l'utilisateur est déjà inscrit
                foreach ($cours as $c) {
                    switch ($c) {
                        case '1':
                            echo "<li>Couture pour débutants</li>";
                            break;
                        case '2':
                            echo "<li>Couture avec patrons</li>";
                            break;
                        case '3':
                            echo "<li>Couture avancée</li>";
                            break;
                        default:
                            echo "<li>Cours inconnu</li>";
                            break;
                    }
                }
                ?>
            </ul>
            <hr>
            <p class="mb-0">Pour toute question, veuillez contacter le service d'assistance.</p>
        </div>
    </div>
    <?php include_once "../views/footer.php"; ?>
</body>
</html>