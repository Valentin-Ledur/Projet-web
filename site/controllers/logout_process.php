<?php
// Démarrer la session pour accéder aux informations de session
session_start();

// Détruire toutes les données de session
session_destroy();

// Rediriger l'utilisateur vers une page après la déconnexion
header("Location: ../views/login.php"); // Vous pouvez remplacer "login.php" par n'importe quelle page de votre choix
exit;
?>