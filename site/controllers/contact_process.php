<?php
session_start(); 

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $question = $_POST["question"];
    $email = $_POST["email"];

    $subject = "Question client";
    $message = "Question : $question\n";

    $to = "coutureForFun@mail.com";
    $headers = "From: $email";

    header("Location: ../views/recapitulatif_contact.php");

    if (mail($to, $subject, $message, $headers)) {
        // Redirection vers la page de récapitulatif des données envoyées
        header("Location: ../views/recapitulatif_contact.php");
        exit;
    } else {
        echo "Une erreur est survenue lors de l'envoi du récapitulatif par e-mail.";
    }
}
?>