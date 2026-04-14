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
    function applique_tva($prix, $taux = 20)
    {
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
function meteo($saison, $temperature)
{
    return "Nous sommes "
        . ($saison == "printemps" ? "au" : "en")
        . " $saison et il fait $temperature "
        . ($temperature > 1 || $temperature < -1 ? "degrés" : "degré")
        . "<hr>";
}
echo meteo("printemps", 15);
echo meteo("été", 25);
echo meteo("hiver", -1);
echo meteo("hiver", -5);

?>

<h3>Exercice 4</h3>
<h4>Petit 1-</h4>

<?php
for ($i = 0; $i < 10; $i++) {
    echo $i;
    if ($i < 9)
        echo " - ";
}
?>

<h4>Petit 2-</h4>
<?php
for ($i = 0; $i < 10; $i++)
    for ($i = 1; $i <= 100; $i++) {
        echo $i . " ";
    }
?>
<h4>Petit 3-</h4>
<?php
for ($i = 1; $i <= 100; $i++) {
    if ($i == 50) {
        echo "<span style='color:red;'>$i</span> ";
    } else {
        echo $i . " ";
    }
}
?>
<h4>Petit 4-</h4>
<?php
for ($i = 2000; $i >= 1930; $i--) {
    echo $i . " ";
}
?>
<h4>Petit 5-</h4>
<?php
for ($i = 1; $i <= 10; $i++) {

    if ($i == 1) {
        $suffixe = "ère";
    } else {
        $suffixe = "ème";
    }

    echo "<h2>Je m'affiche pour la " . $i . $suffixe . " fois</h2>";
}
?>