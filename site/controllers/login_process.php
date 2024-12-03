<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclure le fichier config pour établir la connexion à la base de données
require "../config/config.php";

session_start(); // Démarrer la session

// Vérifier si l'utilisateur est déjà connecté, le rediriger vers la page d'accueil
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../views/accueil.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    if ($_POST["action"] == "login") {
        // Gestion de la connexion
        $username = $_POST["username"];
        $password = $_POST["password"];

        try {
            // Vérifier si l'utilisateur existe et que le mot de passe est correct
            $stmt = $connexion->prepare("SELECT * FROM UTILISATEUR WHERE nom_utilisateur = :username");
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && hash('sha256', $password) == $user['mot_de_passe']) {
                // Authentification réussie, enregistrer les informations de l'utilisateur dans la session
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
                header("location: ../views/accueil.php"); // Redirection vers la page d'accueil après connexion réussie
                exit;
            } else {
                echo "<p>Identifiants incorrects.</p>";
            }

        } catch (PDOException $e) {
            echo "Échec de la connexion au serveur : " . $e->getMessage();
        }
        $connexion = NULL; // Fermeture de la connexion
    }
}
?>