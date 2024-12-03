<?php 
    // Démarrez la session
    session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devis personnalisé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include "../views/header.php"; ?>
    <div class="container border p-4 mt-4 mb-4 rounded">
        <div>
            <p>Nous contacter :</p>
            <p>Par email : coutureForFun@mail.com</p>
            <p>Par téléphone : 01 23 45 67 89</p>
        </div>
    </div>
    <div class="container border p-4 mt-4 mb-4 rounded">
        <div class="contact-info">
            <h1 class="text-center">Formulaire de contact</h1>
            <div class="mb-3">
                <form method="post" action="../controllers/contact_process.php">
                    <label for="question" class="form-label">Votre question :</label>
                    <textarea class="form-control" id="description" name="question" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail :</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</body>
<?php include "footer.php"; ?>
</html>
