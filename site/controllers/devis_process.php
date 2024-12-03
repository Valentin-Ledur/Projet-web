<?php
session_start(); 

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $description = $_POST["description"];
    $typeVetement = $_POST["type_vetement"];
    $tissu = $_POST["tissu"];
    $taille = $_POST["taille"];
    $email = $_POST["email"];
    $service = $_POST["service"];

    // Stockez les données du formulaire dans des variables de session
    $_SESSION['description'] = $_POST['description'];
    $_SESSION['type_vetement'] = $_POST['type_vetement'];
    $_SESSION['tissu'] = $_POST['tissu'];
    $_SESSION['taille'] = $_POST['taille'];
    $_SESSION['service'] = $_POST['service'];
    $_SESSION['email'] = $_POST['email'];

    // Construire le corps de l'e-mail
    $subject = "Récapitulatif du devis personnalisé";
    $message = "Description : $description\n";
    $message .= "Type de vêtement : $typeVetement\n";
    $message .= "Tissu : $tissu\n";
    $message .= "Taille : $taille\n";
    $message .= "E-mail : $email\n";
    $message .= "Service : $service\n";

    // Envoyer l'e-mail
    $to = "votre_email@example.com"; // Remplacez par votre adresse e-mail
    $headers = "From: $email";

    header("Location: ../views/recapitulatif_devis.php");

    if (mail($to, $subject, $message, $headers)) {
        // Redirection vers la page de récapitulatif des données envoyées
        header("Location: ../views/recapitulatif_devis.php");
        exit;
    } else {
        // Gérer les erreurs d'envoi de l'e-mail
        echo "Une erreur est survenue lors de l'envoi du récapitulatif par e-mail.";
    }
}
?>