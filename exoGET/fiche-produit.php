<?php
session_start();

$id = $_GET['id'] ?? null;
$produitTrouve = null;

foreach ($_SESSION['produits'] as $produit) {
    if ($produit['id'] == $id) {
        $produitTrouve = $produit;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<?php if ($produitTrouve): ?>
    
    <div class="card">
        <img src="<?= $produitTrouve['image'] ?>" class="card-img-top">

        <div class="card-body">
            <h2><?= $produitTrouve['nom'] ?></h2>
            <p><?= $produitTrouve['description'] ?></p>
            <p><strong>Catégorie :</strong> <?= $produitTrouve['categorie'] ?></p>

            <a href="boutique.php" class="btn btn-secondary">Retour</a>
        </div>
    </div>

<?php else: ?>

    <div class="alert alert-danger">
        Produit introuvable
    </div>

<?php endif; ?>

</div>

</body>
</html>
