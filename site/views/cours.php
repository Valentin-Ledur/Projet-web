<?php 
    // Démarrez la session
    session_start(); 
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription aux cours de couture</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include "header.php"; ?>
    <div class="container">
        <div class="row mt-5 justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Inscription aux cours de couture</h1>
                        <form method="post" action="../controllers/inscription_process.php" class="text-center" id="inscriptionForm">
                            <p class="card-text">
                                1. Couture pour débutants : pour apprendre les techniques de base, telles que l’utilisation de la machine à coudre, la réalisation d’ourlets, la pose de fermeture éclair, de boutons, etc. Le cours est tenu par Michelle Legrand, une couturière professionnelle. Il est structuré sur 4 semaines, avec des cours en ligne d’une heure par semaine.
                            </p>
                            <input type="checkbox" id="cours_1" name="cours[]" value="1">
                            <label for="cours_1">Couture pour débutants</label><br>
                            
                            <p class="card-text">
                                2. Couture avec patrons : pour apprendre à utiliser les patrons. Le cours offre des patrons de base pour des modèles de pantalons, jupes et pulls. Il est tenu par Lucas Chardons, un couturier professionnel. Il est structuré sur 6 semaines avec des cours en ligne d’une heure par semaine. 
                            </p>
                            <input type="checkbox" id="cours_2" name="cours[]" value="2">
                            <label for="cours_2">Couture avec patrons</label><br>
                            
                            <p class="card-text">
                                3. Couture avancée : pour apprendre à créer les patrons et à coudre des modèles plus difficiles. Le cours est tenu par Marion Mai, couturière professionnelle qui a travaillé dans la haute couture pendant de nombreuses années. Il est structuré sur 10 semaines avec des cours en ligne d’une heure par semaine. 
                            </p>
                            <input type="checkbox" id="cours_3" name="cours[]" value="3">
                            <label for="cours_3">Couture avancée</label><br>
                            
                            <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                            <button type="submit" class="btn btn-primary" onclick="return validateForm()">Inscription</button>
                            <?php else: ?>  
                            <a href="../views/login.php" class="btn btn-primary">Connexion</a>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <?php include "footer.php"; ?>

    <script type="text/javascript" src="../js/cours.js"></script>
</body>
</html>
