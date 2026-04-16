<?php
session_start();


if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$erreurs = [];
$success = "";


$pseudo = $_POST["pseudo"] ?? "";
$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";
$confirm = $_POST["confirm"] ?? "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (strlen($pseudo) < 3) {
        $erreurs[] = "Pseudo trop court";
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "Email invalide";
    }

    
    if (strlen($password) < 6) {
        $erreurs[] = "Mot de passe trop court";
    }

    
    if ($password != $confirm) {
        $erreurs[] = "Les mots de passe ne correspondent pas";
    }

    
    foreach ($_SESSION['users'] as $user) {
        if ($user['pseudo'] == $pseudo) {
            $erreurs[] = "Pseudo déjà pris";
        }
    }

    
    if (empty($erreurs)) {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $_SESSION['users'][] = [
            "pseudo" => $pseudo,
            "email" => $email,
            "password" => $hash
        ];

        $success = "Inscription réussie !";
    }
}
?>

<form method="POST">
    <input type="text" name="pseudo" placeholder="Pseudo" value="<?= $pseudo ?>"><br>
    <input type="text" name="email" placeholder="Email" value="<?= $email ?>"><br>
    <input type="password" name="password" placeholder="Mot de passe"><br>
    <input type="password" name="confirm" placeholder="Confirmer mot de passe"><br>
    <button type="submit">S'inscrire</button>

</form>

<?php

foreach ($erreurs as $e) {
    echo $e . "<br>";
}


if ($success) {
    echo $success;
}
?>