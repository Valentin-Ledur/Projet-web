<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription au cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include_once "../views/header.php"; ?>

    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Félicitations!</h4>
            <p>Votre inscription au(x) cours suivant(s) a été confirmée :</p>
            <ul>
                <?php
                $coursInscrits = $_POST['cours'];
                foreach ($coursInscrits as $cours) {
                    switch ($cours) {
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
                            echo "<li>Erreur: Cours inconnu</li>";
                            break;
                    }
                }
                ?>
            </ul>
            <hr>
            <p class="mb-0">Merci de votre confiance. Vous recevrez bientôt plus d'informations par e-mail.</p>
        </div>
    </div>

    <?php include_once "../views/footer.php"; ?>
</body>
</html>
