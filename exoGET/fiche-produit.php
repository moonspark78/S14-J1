<?php
session_start();

$id = $_GET['id'] ?? "";
$produitTrouve = null;
foreach ($_SESSION['produits'] as $p) {
    if ($p['id'] == $id) {
        $produitTrouve = $p;
  }
}
?>

<?php if ($produitTrouve) { ?>
    <h2><?php echo $produitTrouve['nom']; ?></h2>
    <img src="<?php echo $produitTrouve['image']; ?>" width="200"><br>
    <p><?php echo $produitTrouve['description']; ?></p>

    <a href="boutique.php">Retour</a>

<?php } else { ?>
    <p>Produit introuvable</p>
<?php } ?>