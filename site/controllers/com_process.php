<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclure le fichier config pour établir la connexion à la base de données
require "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gestion de l'inscription au cours.
    $username = $_POST["username"];
    $comment = $_POST["comment"];

    try {
        // Vérifier si l'utilisateur existe déjà
        $res = $connexion->prepare("SELECT identifiant FROM utilisateur WHERE nom_utilisateur = :username");
        $res->execute([':username' => $username]);
        $id = $res->fetch(PDO::FETCH_ASSOC);

        if (!$id) {
            echo "<p>L'utilisateur n'existe pas.</p>";
            include_once "../views/cours.php";
            exit(); // Arrêter l'exécution du script si l'utilisateur n'existe pas
        }

        $stmt = $connexion->prepare("SELECT * FROM review WHERE identifiant = :id");
        $stmt->execute([':id' => $id['identifiant']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "<p>Vous avez déjà laissé un avis pas fou.</p>";
            include_once "../views/accueil.php";
        } else {
            $insertStmt = $connexion->prepare("INSERT INTO review (identifiant, nom_utilisateur, commentaire, date) VALUES (:id, :nom_utilisateur, :commentaire, :date)");
            $insertStmt->execute([
                ':id' => $id["identifiant"],
                ':nom_utilisateur' => $username,
                ':commentaire' => $comment,
                ':date' => date('Y/m/d'), // Format de date pour MySQL
            ]);

            if ($insertStmt) {
                header("location: ../views/accueil.php");
                exit;
            } else {
                // Afficher un message d'erreur en cas d'échec de l'insertion
                echo "<p>Une erreur est survenue lors de la sauvegarde du commentaire.</p>";
                include_once "../views/accueil.php";
            }
        }
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la base de données
        echo "Échec de la connexion au serveur : " . $e->getMessage();
    }
}
?>