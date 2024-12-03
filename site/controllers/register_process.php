<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclure le fichier config pour établir la connexion à la base de données
require "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "register") {
        // Récupérer les données du formulaire
        $email = $_POST["email"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Hachage du mot de passe
        $hashedPassword = hash('sha256', $password);

        try {
            // Vérifier si l'utilisateur existe déjà
            $stmt = $connexion->prepare("SELECT * FROM UTILISATEUR WHERE nom_utilisateur = :username OR email = :email");
            $stmt->execute([':username' => $username, ':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Vérifier si le nom d'utilisateur ou l'e-mail est déjà utilisé
                if ($user['nom_utilisateur'] == $username) {
                    echo "<p>Le nom d'utilisateur est déjà utilisé.</p>";
                }
                if ($user['email'] == $email) {
                    echo "<p>L'adresse e-mail est déjà utilisée.</p>";
                }
                // Inclure le formulaire d'inscription
                include_once "../views/login.php";
            } else {
                // Insérer le nouvel utilisateur dans la base de données
                $stmt = $connexion->prepare("INSERT INTO UTILISATEUR (email, nom, prenom, nom_utilisateur, mot_de_passe) VALUES (:email, :nom, :prenom, :username, :password)");
                $stmt->execute([
                    ':email' => $email,
                    ':nom' => $nom,
                    ':prenom' => $prenom,
                    ':username' => $username,
                    ':password' => $hashedPassword
                ]);

                // Démarrer la session et enregistrer les informations de l'utilisateur
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;

                // Rediriger l'utilisateur vers la page d'accueil après l'inscription
                header("Location: ../views/accueil.php");
                exit();
            }
        } catch (PDOException $e) {
            echo "Échec de la connexion au serveur : " . $e->getMessage();
        }
    }
}
?>