<?php
session_start();


if (!isset($_SESSION['produits'])) {
    $_SESSION['produits'] = [
        ['id' => 1, 'nom' => 'Laptop', 'description' => 'Un puissant laptop.', 'categorie' => 'Electronique', 'image' => 'https://picsum.photos/200'],
        ['id' => 2, 'nom' => 'T-shirt', 'description' => 'T-shirt en coton.', 'categorie' => 'Vêtements', 'image' => 'https://picsum.photos/200'],
        ['id' => 3, 'nom' => 'Tablette', 'description' => 'Tablette rapide.', 'categorie' => 'Electronique', 'image' => 'https://picsum.photos/200'],
    ];
}


$categorie = $_GET['categorie'] ?? "";

$produits = $_SESSION['produits'];
?>

<h2>Boutique</h2>

<a href="boutique.php">Tous</a>
<a href="?categorie=Electronique">Electronique</a>
<a href="?categorie=Vêtements">Vêtements</a>
<hr>

<?php foreach ($produits as $produit) { ?>

    <?php
    if ($categorie != "" && $produit['categorie'] != $categorie) {
        continue;
    }?>
    <div>
    <img src="<?= $produit['image'] ?>" width="100"><br>
    <b><?= $produit['nom'] ?></b><br>
        <?= $produit['description'] ?><br>
        <a href="fiche-produit.php?id=<?= $produit['id'] ?>">Voir</a>
    </div>
    <hr>

<?php } ?>