<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclure le fichier config pour établir la connexion à la base de données
require "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Démarrer la session pour accéder aux données de session
    session_start();

    // Récupérer le nom d'utilisateur à partir de la session
    $username = $_SESSION['username'];

    // Gestion de l'inscription au cours.
    $cours = $_POST["cours"];

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

        // Boucle pour inscrire l'utilisateur à chaque cours sélectionné
        foreach ($cours as $c) {
            // Vérifier si l'utilisateur est déjà inscrit à ce cours
            $stmt = $connexion->prepare("SELECT * FROM cours WHERE identifiant = :id AND cours = :cours");
            $stmt->execute([':id' => $id['identifiant'], ':cours' => $c]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                include_once "../views/erreur_inscription.php";
            } else {
                // Insérer le nouvel utilisateur dans la base de données
                $insertStmt = $connexion->prepare("INSERT INTO cours (identifiant, cours, date) VALUES (:id, :cours, :date)");
                $insertStmt->execute([
                    ':id' => $id['identifiant'],
                    ':cours' => $c,
                    ':date' => date('Y/m/d'), // Format de date pour MySQL
                ]);

                if ($insertStmt) {
                    include_once "../views/confirmation_inscription.php";
                } else {
                    // Afficher un message d'erreur en cas d'échec de l'insertion
                    echo "<p>Une erreur est survenue lors de l'inscription au cours.</p>";
                }
            }
        }
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la base de données
        echo "Échec de la connexion au serveur : " . $e->getMessage();
    }
}
?>
