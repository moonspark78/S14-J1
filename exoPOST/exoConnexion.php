<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pseudo = $_POST["pseudo"] ?? "";
    $password = $_POST["password"] ?? "";

    $userFound = null;

    foreach ($_SESSION['users'] as $user) {
        if ($user["pseudo"] == $pseudo) {
            $userFound = $user;
        }
    }

    if ($userFound && password_verify($password, $userFound["password"])) {

        $_SESSION["connected_user"] = $userFound;
        $message = "Connexion réussie";

    } else {
        $message = "Pseudo ou mot de passe incorrect";
    }
}
?>

<form method="POST">

    <input type="text" name="pseudo" placeholder="Pseudo"><br>

    <input type="password" name="password" placeholder="Mot de passe"><br>

    <button>Se connecter</button>

</form>

<p><?= $message ?></p>