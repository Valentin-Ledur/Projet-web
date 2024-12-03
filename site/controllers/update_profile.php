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

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];

    // Requête SQL pour sélectionner le mot de passe actuel de l'utilisateur
    $sql_select_password = "SELECT mot_de_passe FROM utilisateur WHERE nom_utilisateur = :nom_utilisateur";

    try {
        // Préparer et exécuter la requête SQL pour sélectionner le mot de passe
        $stmt_select_password = $connexion->prepare($sql_select_password);
        $stmt_select_password->bindParam(':nom_utilisateur', $_SESSION["username"]);
        $stmt_select_password->execute();
        $row = $stmt_select_password->fetch(PDO::FETCH_ASSOC);

        // Vérifier si le mot de passe actuel est correct
        if (password_verify($current_password, $row['mot_de_passe'])) {
            // Le mot de passe actuel est correct, procéder à la mise à jour des informations de l'utilisateur
            // Préparer la requête SQL pour mettre à jour les informations de l'utilisateur
            $sql_update_user = "UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email";

            // Vérifier si un nouveau mot de passe a été fourni
            if (!empty($new_password)) {
                // Hasher le nouveau mot de passe avec password_hash
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $sql_update_user .= ", mot_de_passe = :mot_de_passe";
            }

            $sql_update_user .= " WHERE nom_utilisateur = :nom_utilisateur";

            // Préparer et exécuter la requête SQL pour mettre à jour les informations de l'utilisateur
            $stmt_update_user = $connexion->prepare($sql_update_user);
            $stmt_update_user->bindParam(':nom', $nom);
            $stmt_update_user->bindParam(':prenom', $prenom);
            $stmt_update_user->bindParam(':email', $email);
            $stmt_update_user->bindParam(':nom_utilisateur', $_SESSION["username"]);

            // Si un nouveau mot de passe a été fourni, l'ajouter à la requête
            if (!empty($new_password)) {
                $stmt_update_user->bindParam(':mot_de_passe', $hashed_password);
            }

            $stmt_update_user->execute();

            // Rediriger l'utilisateur vers la page de profil avec un message de succès
            header("location: ../views/profil.php?success=1");
            exit;
        } else {
            // Mot de passe actuel incorrect, redirection vers la page de profil avec un message d'erreur
            header("location: ../views/profil.php?error=current_password");
            exit;
        }
    } catch (PDOException $e) {
        // Gérer les erreurs de la base de données
        echo "Erreur lors de la mise à jour du profil : " . $e->getMessage();
    }
}
?>
