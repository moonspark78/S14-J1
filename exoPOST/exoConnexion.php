<?php

session_start();

$loginError = ""; 
$loginSuccess = "";


if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

// Verif du post, donc le if global request method etc 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
// Ensuite récupération pseudo et password du post 
    $pseudo = $_POST["pseudo"] ?? "";
    $password = $_POST["password"] ?? "";

    $userFound = null;

    // Trouver si le user existe avec une boucle sur les users (dans la session)
    foreach ($_SESSION['users'] as $user) {
        if ($user["pseudo"] == $pseudo) {
            $userFound = $user;
        }
    }

    // Une fois le users trouvé, on compare le mot de passe avec password_verify
    if ($userFound && password_verify($password, $userFound["password"])) {

// Si password_verify me donne true alors le password est bon !
        $_SESSION["connected_user"] = $userFound;
        $loginSuccess = "Connexion réussie";

    } else {
        $loginError = "Pseudo ou mot de passe incorrect"; 
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">

            <h1>Connexion</h1>

            <?php if ($loginError): ?>
                <div class="alert alert-danger"><?= $loginError ?></div>
            <?php endif; ?>

            <?php if ($loginSuccess): ?>
                <div class="alert alert-success"><?= $loginSuccess ?></div>
            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">
                    <label>Pseudo</label>
                    <input type="text" name="pseudo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Mot de passe</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-primary">Se connecter</button>

            </form>

        </div>
    </div>
      <?php var_dump($_SESSION);?>

</div>

</body>
</html>