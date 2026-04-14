<h1>
<?php
echo "Bonjour le monde ! <br>";

$couleur = "vert";

if ($couleur == "bleu") {
    echo "Vous aimez le bleu<br>";
} elseif ($couleur == "rouge") {
    echo "Vous aimez le rouge<br>";
} elseif ($couleur == "vert") {
    echo "Vous aimez le vert<br>";
} else {
    echo "Vous n'aimez ni le bleu, ni le rouge, ni le vert<br>";
}
?>
</h1>

<h3>Exercice 2</h3>

<h4>
<?php
function applique_tva($prix, $taux = 20) {
    $montant_ttc = $prix * (1 + $taux / 100);

    return "Le montant TTC pour le prix $prix est de : $montant_ttc €<hr>";
}

echo applique_tva(100);
echo applique_tva(500);

// avec taux personnalisé
echo applique_tva(100, 10);
?>
</h4>

<h3>Exercice 3</h3>

<?php
function meteo($saison, $temperature) {

    
    if ($saison == "printemps") {
        $debut = "Nous sommes au " . $saison;
    } else {
        $debut = "Nous sommes en " . $saison;
    }

   
    if ($temperature > 1 || $temperature < -1) {
        $deg = "degrés";
    } else {
        $deg = "degré";
    }

    return $debut . " et il fait " . $temperature . " " . $deg . "<hr>";
}
echo meteo("printemps", 15);
echo meteo("été", 25);
echo meteo("hiver", -1);

?>