<?php
session_start();


if (!isset($_SESSION['produits'])) {
    $_SESSION['produits'] = [
        ['id' => 1, 'nom' => 'Laptop', 'description' => 'Un puissant laptop.', 'categorie' => 'Electronique', 'image' => 'https://picsum.photos/300/200?nature'],
        ['id' => 2, 'nom' => 'T-shirt', 'description' => 'T-shirt en coton bio.', 'categorie' => 'Vêtements', 'image' => 'https://picsum.photos/300/200?dog'],
        ['id' => 3, 'nom' => 'Tablette', 'description' => 'Tablette légère et rapide.', 'categorie' => 'Electronique', 'image' => 'https://picsum.photos/300/200?computer'],
        ['id' => 4, 'nom' => 'Jeans', 'description' => 'Jean slim stretch.', 'categorie' => 'Vêtements', 'image' => 'https://picsum.photos/300/200?tv'],
    ];
}


$categorie = "";
if (isset($_GET['categorie'])) {
    $categorie = $_GET['categorie'];
}

$produits = $_SESSION['produits'];
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

    <h2 class="text-center mb-4">Boutique</h2>

    <div class="text-center mb-4">
        <a href="boutique.php" class="btn">Tous</a>
        <a href="?categorie=Electronique" class="btn ">Electronique</a>
        <a href="?categorie=Vêtements" class="btn ">Vêtements</a>
    </div>

    <div>

        <?php
        foreach ($produits as $produit) {

            
            if ($categorie != "" && $produit['categorie'] != $categorie) {
                continue;
            }
        ?>

            <div class="col-md-3">
                <div class="card mb-3">

                    <img src="<?php echo $produit['image']; ?>">

                    <div class="card-body">
                        <h5><?php echo $produit['nom']; ?></h5>
                        <p><?php echo $produit['description']; ?></p>

                        <a href="fiche-produit.php?id=<?php echo $produit['id']; ?>" class="btn">
                            Voir
                        </a>
                    </div>

                </div>
            </div>

        <?php } ?>

    </div>

</div>

</body>
</html>