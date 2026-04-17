<?php

/*

    EXERCICE SESSION :
            Page de produits et ajout panier + page panier : 

                Etapes : 
                    - 1 Initialiser la session en lançant l'instruction session_start()
                    - 2 Créer un array $products qui contient des produits fictifs (id, name, price)
                    - 3 Afficher ces produits sur la page avec un bouton Ajout panier géré avec GET 
                    - 4 Traiter le GET pour récupérer les informations produits et l'ajouter à $_SESSION['cart'] ainsi qu'un indice "quantity"
                    - 5 Traiter le fait que ce produit est peut être déjà présent en ajoutant simplement 1 à la quantité déjà présente
                    - 6 Vérifier le contenu de la session
                    - 7 Créer une page panier.php dans laquelle seront affichés les produits présents dans le panier avec un calcul du prix en rapport à leur quantité, prix par produit, prix total 
                    - 8 Permettre de modifier la quantité produit dans le panier 
                    - 9 Permettre de supprimer un produit du panier
                    - 10 Permettre de vider le panier entier 

*/ 
?>

<?php
session_start();


$products = [
    ["id" => 1, "name" => "T-shirt", "price" => 20],
    ["id" => 2, "name" => "Pantalon", "price" => 40],
    ["id" => 3, "name" => "Chaussures", "price" => 60],
];
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    foreach ($products as $product) {
        if ($product['id'] == $id) {

            
    if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity']++;
    } else {
                
    $_SESSION['cart'][$id] = [
                    "name" => $product['name'],
                    "price" => $product['price'],
                    "quantity" => 1
                ];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Produits</title>
</head>
<body>

<h1>Liste des produits</h1>

<?php foreach ($products as $product) { ?>
    
    <div style="margin-bottom:20px;">
        <h3><?php echo $product['name']; ?></h3>
        <p>Prix : <?php echo $product['price']; ?> €</p>
        
        <a href="?add=<?php echo $product['id']; ?>">
            Ajouter au panier
        </a>
    </div>

<?php } ?>

<br>
<a href="panier.php">Voir le panier</a>

</body>
</html>