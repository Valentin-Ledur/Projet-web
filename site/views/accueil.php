<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Couture for Fun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include "../views/header.php"; ?>
    <div class="container full-width-container mt-4">
        <div class="row row1 container-fluid">
            <div class="col-md-8">
                <div class="m-auto">
                    <h1>Explorez l'art de la couture avec Couture For Fun.</h1>
                    <p>Que vous souhaitiez perfectionner vos compétences en couture, obtenir un devis pour une retouche ou simplement vous immerger dans le monde créatif de la couture, Couture For Fun est là pour vous. Découvrez nos cours passionnants, demandez un devis dès aujourd'hui et joignez-vous à nous pour une aventure couture passionnante.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3 mt-3">
                    <img src="../img/accueil1.jpg" class="img-fluid" alt="Image 2">
                </div>
            </div>
        </div>
        <div class="row row1 container-fluid">
            <div class="col-md-4">
                <div class="mb-3 mt-3">
                    <img src="../img/accueil2.png" class="img-fluid" alt="Image 2">
                </div>
            </div>
            <div class="col-md-8">
                <div class="m-auto">
                    <h1>Des cours de couture pour tous les niveaux.</h1>
                    <p>Que vous soyez débutant ou que vous ayez déjà de l'expérience en couture, nos cours sont adaptés à tous les niveaux. Apprenez les techniques de base ou perfectionnez vos compétences avancées avec nos instructeurs experts.</p>
                </div>
            </div>
        </div>
        <div class="row row1 container-fluid">
            <div class="col-md-8">
                <div class="m-auto">
                    <h1>Plongez dans le monde de la couture avec nous.</h1>
                    <p>Couture For Fun est bien plus qu'un simple studio de couture. C'est une communauté créative où le plaisir de la couture rencontre le savoir-faire artisanal. Rejoignez-nous et découvrez le plaisir de créer vos propres vêtements uniques et personnalisés.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3 mt-3">
                    <img src="../img/accueil3.png" class="img-fluid" alt="Image 2">
                </div>
            </div>
        </div>
        <div class="row row1 container-fluid">
            <div class="col-md-4">
                <div class="mb-3 mt-3">
                    <img src="../img/accueil4.png" class="img-fluid" alt="Image 2">
                </div>
            </div>
            <div class="col-md-8">
                <div class="m-auto">
                    <h1>Obtenez des devis personnalisés pour vos projets de couture.</h1>
                    <p>Nos experts en couture sont là pour répondre à vos besoins. Demandez un devis pour des retouches sur mesure ou pour la création d'une pièce unique selon vos spécifications. Nous sommes là pour rendre votre vision de la mode réelle.</p>
                </div>
            </div>
        </div>
        <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) : ?>
        <div class="m-3">
            <div class="container-fluid full-width-container border p-3 rounded" id="commentaires">
                <h2 class="text-center">Laissez un avis !</h2>
                <div class="mb-3">
                    <form method="post" action="../controllers/com_process.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur:</label>
                            <input name="username" type="text" class="form-control" id="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Commentaire:</label>
                            <textarea name="comment" class="form-control" id="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter un commentaire</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div>
            <h2 class="text-center">Avis Clients</h2>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    require "../config/config.php";
                    // Boucle pour afficher trois diapositives dans le carrousel
                    for ($i = 0; $i < 3; $i++) {
                        // Sélectionner un commentaire aléatoire de la base de données
                        $res = $connexion->query("SELECT nom_utilisateur, commentaire, DATE_FORMAT(date, '%d/%m/%Y') AS european_date FROM review ORDER BY RAND() LIMIT 1");
                        $commentaire = $res->fetch(PDO::FETCH_ASSOC);

                        // Vérifier si c'est la première diapositive, la marquer comme active
                        $active = ($i == 0) ? 'active' : '';

                        // Afficher le contenu de la diapositive avec le commentaire aléatoire
                        echo '<div class="carousel-item ' . $active . '">
                                <div class="border p-3 m-3 rounded">
                                    <h5>' . $commentaire["nom_utilisateur"] . '</h5>
                                    <p>' . $commentaire["commentaire"] . '</p>
                                    <p> Le ' . $commentaire["european_date"] . '</p>
                                </div>
                            </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php include "../views/footer.php"; ?>
<script type="text/javascript" src="../js/accueil.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
