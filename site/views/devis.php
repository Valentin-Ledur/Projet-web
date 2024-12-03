<?php 
    // Inclure le fichier de configuration de la base de données
    require_once "../config/config.php";

    // Démarrez la session
    session_start(); 

    // Vérifiez si l'utilisateur est connecté
    $email = "";
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        // Récupérez l'e-mail de l'utilisateur à partir de la base de données
        try {
            // Préparez la requête SQL pour récupérer l'e-mail à partir du nom d'utilisateur
            $stmt = $connexion->prepare("SELECT email FROM utilisateur WHERE nom_utilisateur = :username");
            // Exécutez la requête en liant le paramètre :username avec la valeur du nom d'utilisateur stocké dans la session
            $stmt->execute([':username' => $_SESSION['username']]);
            // Récupérez l'e-mail à partir du résultat de la requête
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            // Vérifiez si un e-mail a été trouvé
            if ($result) {
                $email = $result['email'];
            } else {
                // Gérez le cas où l'e-mail n'est pas trouvé
                echo "L'e-mail de l'utilisateur n'a pas été trouvé.";
            }
        } catch (PDOException $e) {
            // Gérez les erreurs de requête SQL
            echo "Erreur lors de la récupération de l'e-mail : " . $e->getMessage();
        }
    }
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
        <h1 class="text-center">Devis personnalisé</h1>
        <div class="mb-3">
            <form method="post" action="../controllers/devis_process.php">
                <label for="description" class="form-label">Description :</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="type_vetement" class="form-label">Type de vêtement :</label>
                <input type="text" class="form-control" id="type_vetement" name="type_vetement" required>
            </div>
            <div class="mb-3">
                <label for="tissu" class="form-label">Tissu :</label>
                <input type="text" class="form-control" id="tissu" name="tissu" required>
            </div>
            <div class="mb-3">
                <label for="taille" class="form-label">Taille :</label>
                <input type="text" class="form-control" id="taille" name="taille" required>
            </div>
            <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail :</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
            </div>
            <?php else: ?>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <?php endif; ?>
            <div class="mb-3">
                <label class="form-label">Service :</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="ourlets" name="service" value="ourlets" required>
                    <label class="form-check-label" for="ourlets">Ourlets</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="retouches" name="service" value="retouches" required>
                    <label class="form-check-label" for="retouches">Retouches</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="ourlets_retouches" name="service" value="ourlets_retouches" required>
                    <label class="form-check-label" for="ourlets_retouches">Ourlets + Retouches</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</body>
<?php include "footer.php"; ?>
</html>
