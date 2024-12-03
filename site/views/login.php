<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styless.css">
</head>
<body>
    <?php include "header.php"; ?>
    <div class="container">
        <div class="card-container" id="cardContainer">
            <div class="form-card front">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card mt-5">
                                <div class="card-header">
                                    <h2 class="text-center">Connexion</h2>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="../controllers/login_process.php" >
                                        <div class="form-group mt-3 mb-3">
                                            <label for="username">Nom d'utilisateur:</label>
                                            <input type="text" id="username" name="username" class="form-control" required>
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <label for="password">Mot de passe:</label>
                                            <input type="password" id="password" name="password" class="form-control" required>
                                        </div>
                                        <button type="submit" name="action" value="login" class="btn btn-primary btn-block">Se connecter</button>
                                    </form>
                                    <button id="toggleButton" class="btn btn-link btn-block">S'inscrire</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-card back">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card mt-5">
                                <div class="card-header">
                                    <h2 class="text-center">Inscription</h2>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="../controllers/register_process.php" >
                                        <div class="form-group mt-3 mb-3">
                                            <label for="email">Email :</label>
                                            <input type="email" id="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <label for="nom">Nom :</label>
                                            <input type="text" id="nom" name="nom" class="form-control" required>
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <label for="prenom">Prenom :</label>
                                            <input type="text" id="prenom" name="prenom" class="form-control" required>
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <label for="username">Nom d'utilisateur:</label>
                                            <input type="text" id="username" name="username" class="form-control" required>
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <label for="password">Mot de passe:</label>
                                            <input type="password" id="password" name="password" class="form-control" required>
                                        </div>
                                        <button type="submit" name="action" value="register" class="btn btn-primary btn-block">S'inscrire</button>
                                    </form>
                                    <button id="toggleBackButton" class="btn btn-link btn-block">Se Connecter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
    <script type="text/javascript" src="../js/login.js"></script>
</body>
</html>