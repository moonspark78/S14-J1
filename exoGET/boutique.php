<?php
session_start();

// Initialisation des produits
$_SESSION['produits'] = [
    ['id' => 1, 'nom' => 'Laptop', 'description' => 'Un puissant laptop.', 'categorie' => 'Electronique', 'image' => 'https://picsum.photos/300/200?nature'],
    ['id' => 2, 'nom' => 'T-shirt', 'description' => 'T-shirt en coton bio.', 'categorie' => 'Vêtements', 'image' => 'https://picsum.photos/300/200?dog'],
    ['id' => 3, 'nom' => 'Tablette', 'description' => 'Tablette légère et rapide.', 'categorie' => 'Electronique', 'image' => 'https://picsum.photos/300/200?computer'],
    ['id' => 4, 'nom' => 'Jeans', 'description' => 'Jean slim stretch.', 'categorie' => 'Vêtements', 'image' => 'https://picsum.photos/300/200?tv'],
];

// Récupération du filtre
$categorie = $_GET['categorie'] ?? null;

// Filtrage
$produits = $_SESSION['produits'];

if ($categorie) {
    $produits = array_filter($produits, function($p) use ($categorie) {
        return $p['categorie'] === $categorie;
    });
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Boutique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1 class="text-center mb-4">🛍️ Boutique</h1>

    
    <div class="text-center mb-4">
        <a href="boutique.php" class="btn btn-secondary m-1">Tous</a>
        <a href="?categorie=Electronique" class="btn btn-primary m-1">Electronique</a>
        <a href="?categorie=Vêtements" class="btn btn-success m-1">Vêtements</a>
    </div>

    
    <div class="row">
        <?php foreach ($produits as $produit): ?>
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="<?= $produit['image'] ?>" class="card-img-top">

                    <div class="card-body">
                        <h5><?= $produit['nom'] ?></h5>
                        <p><?= $produit['description'] ?></p>
                        <p><strong><?= $produit['categorie'] ?></strong></p>

                        <a href="fiche-produit.php?id=<?= $produit['id'] ?>" class="btn btn-dark">
                            Voir produit
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

</body>
</html>