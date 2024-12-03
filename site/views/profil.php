<?php
// Démarrer la session pour accéder aux informations de session
session_start();

// Vérifier si l'utilisateur est connecté, sinon le rediriger vers la page de connexion
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Inclure le fichier de configuration pour établir la connexion à la base de données
require "../config/config.php";

// Récupérer les informations de l'utilisateur à partir de la base de données
try {
    $stmt = $connexion->prepare("SELECT nom, prenom, email FROM UTILISATEUR WHERE nom_utilisateur = :username");
    $stmt->execute([':username' => $_SESSION["username"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si l'utilisateur n'est pas trouvé, vous pouvez rediriger ou afficher un message d'erreur
    if (!$user) {
        // Rediriger l'utilisateur ou afficher un message d'erreur
    }
} catch (PDOException $e) {
    echo "Échec de la récupération des informations de l'utilisateur : " . $e->getMessage();
    exit;
}
?>
<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Profil de <?php echo $_SESSION["username"]; ?></h1>
        
        <!-- Ajout des onglets -->
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile">Modifier le profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="courses-tab" data-bs-toggle="tab" href="#courses">Cours inscrit</a>
            </li>
        </ul>
        
        <!-- Contenu des onglets -->
        <div class="tab-content">
            <!-- Onglet Modifier le profil -->
            <div class="tab-pane fade show active" id="profile">
                <!-- Formulaire de modification de profil -->
                <form action="../controllers/update_profile.php" method="post" onsubmit="return validateForm()">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $user['nom']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $user['prenom']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe actuel</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <!-- Bouton d'envoi du formulaire -->
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>

                    <!-- Affichage du contenu conditionnel -->
                    <?php
                    // Vérifier si l'URL contient le paramètre error avec la valeur current_password
                    if (isset($_GET['error']) && $_GET['error'] === 'current_password') {
                        // Afficher du contenu conditionnel
                    ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            Le mot de passe actuel est incorrect. Veuillez réessayer.
                        </div>
                    <?php
                    }
                    ?>
                </form>
            </div>
            
            <!-- Onglet Cours inscrit -->
            <div class="tab-pane fade" id="courses">
                <!-- Insérer le contenu du cours inscrit ici -->
                <h3>Vous êtes inscrit au(x) cour(s) suivant :</h3>
                <?php
                // Récupérer l'identifiant de l'utilisateur à partir de son nom d'utilisateur
                $username = $_SESSION["username"];

                try {
                    $stmt = $connexion->prepare("SELECT cours FROM cours WHERE identifiant = (SELECT identifiant FROM utilisateur WHERE nom_utilisateur = :username)");
                    $stmt->bindParam(':username', $username);
                    $stmt->execute();
                    $coursInscrits = $stmt->fetchAll(PDO::FETCH_COLUMN);

                    if ($coursInscrits) {
                        echo "<ul>";
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
                        echo "</ul>";
                    } else {
                        echo "<p>Aucun cours inscrit pour l'utilisateur.</p>";
                    }
                } catch (PDOException $e) {
                    // Gérer les erreurs de la base de données
                    echo "Erreur lors de la récupération des cours inscrits : " . $e->getMessage();
                }
                ?>
            </div>
        </div>
        
        <!-- Lien de déconnexion -->
        <a href="../controllers/logout_process.php" class="btn btn-danger mt-3">Déconnexion</a>
    </div>
    <?php include "footer.php"; ?>
    <script type="text/javascript" src="../js/profil.js"></script>
</body>
</html>