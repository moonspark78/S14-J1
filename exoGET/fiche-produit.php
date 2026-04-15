<?php
session_start();

$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$produitTrouve = null;

foreach ($_SESSION['produits'] as $p) {
    if ($p['id'] == $id) {
        $produitTrouve = $p;
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

<?php if ($produitTrouve != null) { ?>

    <div class="card">
        <img src="<?php echo $produitTrouve['image']; ?>" class="card-img-top">

        <div class="card-body">
            <h3><?php echo $produitTrouve['nom']; ?></h3>
            <p><?php echo $produitTrouve['description']; ?></p>

            <a href="boutique.php" class="btn btn-secondary">Retour</a>
        </div>
    </div>

<?php } else { ?>

    <div>
        Produit introuvable
    </div>

<?php } ?>

</div>

</body>
</html>