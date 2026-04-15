<?php
session_start();

$user = null;
$action = $_GET['action'] ?? 'voir';
$id = $_GET['id'] ?? null;

if (!isset($_SESSION['users'])) {
    header("Location: gestionUsers.php");
    exit;
}


if ($id) {
    foreach ($_SESSION['users'] as $u) {
        if ($u['id'] == $id) {
            $user = $u;
            break;
        }
    }
}


if ($action === 'confirm_suppression' && $id) {
    foreach ($_SESSION['users'] as $key => $u) {
        if ($u['id'] == $id) {
            unset($_SESSION['users'][$key]);
            break;
        }
    }
    $_SESSION['users'] = array_values($_SESSION['users']);
    header("Location: gestionUsers.php");
    exit;
}


if ($action === 'modifier' && $_SERVER["REQUEST_METHOD"] === "POST" && $id) {
    foreach ($_SESSION['users'] as &$u) {
        if ($u['id'] == $id) {
            $u['nom'] = $_POST['nom'];
            $u['email'] = $_POST['email'];
            break;
        }
    }
    header("Location: gestionUsers.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

<?php if ($user): ?>

    <?php if ($action === 'voir'): ?>

        <h3>Utilisateur</h3>
        <p>ID: <?= $user['id'] ?></p>
        <p>Nom: <?= $user['nom'] ?></p>
        <p>Email: <?= $user['email'] ?></p>

        <a href="gestionUsers.php" class="btn btn-secondary">Retour</a>

    <?php elseif ($action === 'modifier'): ?>

        <h3>Modifier</h3>

        <form method="POST">
            <input class="form-control mb-2" name="nom" value="<?= $user['nom'] ?>">
            <input class="form-control mb-2" name="email" value="<?= $user['email'] ?>">
            <button class="btn btn-primary">OK</button>
        </form>

    <?php elseif ($action === 'supprimer'): ?>

        <h3>Supprimer ?</h3>
        <p><?= $user['nom'] ?></p>

        <a href="?action=confirm_suppression&id=<?= $user['id'] ?>" class="btn btn-danger">
            Confirmer
        </a>

        <a href="gestionUsers.php" class="btn btn-secondary">Annuler</a>

    <?php endif; ?>

<?php else: ?>

    <div class="alert alert-danger">Utilisateur introuvable</div>

<?php endif; ?>

</div>

</body>
</html>