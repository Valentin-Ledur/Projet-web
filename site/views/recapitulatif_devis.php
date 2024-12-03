<?php
    // Démarrez la session
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif de la demande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php include "header.php"; ?>
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading text-center">Demande de devis personnalisé confirmée!</h4>
            <p class="text-center">Votre demande a été envoyée avec succès. Voici un récapitulatif des informations que vous avez fournies :</p>
            <ul>
                <li><strong>Description :</strong> <?php echo $_SESSION['description']; ?></li>
                <li><strong>Type de vêtement :</strong> <?php echo $_SESSION['type_vetement']; ?></li>
                <li><strong>Tissu :</strong> <?php echo $_SESSION['tissu']; ?></li>
                <li><strong>Taille :</strong> <?php echo $_SESSION['taille']; ?></li>
                <li><strong>Service :</strong> <?php echo $_SESSION['service']; ?></li>
                <li><strong>E-mail :</strong> <?php echo $_SESSION['email']; ?></li>
            </ul>
            <hr>
            <p class="mb-0">Nous vous répondrons dans les plus brefs délais. Merci!</p>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>

<?php 
    unset($_SESSION['description']);
    unset($_SESSION['type_vetement']);
    unset($_SESSION['tissu']);
    unset($_SESSION['taille']);
    unset($_SESSION['service']);
    unset($_SESSION['email']);
?>