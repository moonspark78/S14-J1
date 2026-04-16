<?php

$langue = "fr"; // langue par défaut

// si on clique sur un lien
if (isset($_GET["lang"])) {

    $langue = $_GET["lang"];

    // on enregistre dans un cookie (1 jour)
    setcookie("langue", $langue, time() + 86400);

} else {

    // sinon on regarde si un cookie existe
    if (isset($_COOKIE["langue"])) {
        $langue = $_COOKIE["langue"];
    }
}
?>

<a href="?lang=fr">Français</a>
<a href="?lang=en">Anglais</a>
<a href="?lang=es">Espagnol</a>

<br><br>

<?php

// afficher selon langue
if ($langue == "fr") {
    echo "Bonjour";
}

if ($langue == "en") {
    echo "Hello";
}

if ($langue == "es") {
    echo "Hola";
}


?>