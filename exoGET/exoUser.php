<?php
session_start();

// Si pas de session → retour liste
if (empty($_SESSION['users'])) {
    header("Location: gestionUsers.php");
    exit;
}

// 🔥 SUPPRESSION
if (isset($_GET['action']) && $_GET['action'] === 'confirm_suppression' && isset($_GET['id'])) {

    foreach ($_SESSION['users'] as $key => $user) {
        if ($user['id'] == $_GET['id']) {
            unset($_SESSION['users'][$key]);
        }
    }

    $_SESSION['users'] = array_values($_SESSION['users']);

    header("Location: exoGestionUsers.php");
    exit;
}

// 🔥 MODIFICATION
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_GET['action'] === "modifier") {

    foreach ($_SESSION['users'] as &$user) {
        if ($user['id'] == $_GET['id']) {
            $user['nom'] = $_POST['nom'];
            $user['email'] = $_POST['email'];
        }
    }

    header("Location: exoGestionUsers.php");
    exit;
}

// Récup user
$user = null;

if (isset($_GET['id'])) {
    foreach ($_SESSION['users'] as $u) {
        if ($u['id'] == $_GET['id']) {
            $user = $u;
        }
    }
}

$action = $_GET['action'] ?? 'voir';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Action utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container my-5">

<?php if ($user): ?>

    <?php if ($action === 'voir'): ?>

        <h2>Informations utilisateur</h2>
        <ul class="list-group mb-3">
            <li class="list-group-item">ID : <?= $user['id']; ?></li>
            <li class="list-group-item">Nom : <?= $user['nom']; ?></li>
            <li class="list-group-item">Email : <?= $user['email']; ?></li>
        </ul>

        <a href="exoGestionUsers.php" class="btn btn-secondary">Retour</a>

    <?php elseif ($action === 'modifier'): ?>

        <h2>Modifier utilisateur</h2>

        <form method="POST">
            <input type="text" name="nom" class="form-control mb-2" value="<?= $user['nom']; ?>">
            <input type="email" name="email" class="form-control mb-2" value="<?= $user['email']; ?>">
            <button class="btn btn-primary">Enregistrer</button>
            <a href="exoGestionUsers.php" class="btn btn-secondary">Annuler</a>
        </form>

    <?php elseif ($action === 'supprimer'): ?>

        <h2>Supprimer l'utilisateur</h2>

        <p>
            Êtes-vous sûr de vouloir supprimer 
            <strong><?= $user['nom']; ?></strong> (ID : <?= $user['id']; ?>) ?
        </p>

        <a href="exoUser.php?action=confirm_suppression&id=<?= $user['id']; ?>" class="btn btn-danger">
            Confirmer la suppression
        </a>

        <a href="exoGestionUsers.php" class="btn btn-secondary">Annuler</a>

    <?php endif; ?>

<?php else: ?>

    <div class="alert alert-danger">Utilisateur introuvable</div>

<?php endif; ?>

</div>

</body>
</html>
