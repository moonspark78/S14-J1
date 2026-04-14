<?php
$message = "";

if (isset($_GET["pays"])) {
    $pays = $_GET["pays"];

    if ($pays == "france") {
        $message = "Vous êtes français 🇫🇷";
    } elseif ($pays == "espagne") {
        $message = "Vous êtes espagnol 🇪🇸";
    } elseif ($pays == "italie") {
        $message = "Vous êtes italien 🇮🇹";
    } elseif ($pays == "allemagne") {
        $message = "Vous êtes allemand 🇩🇪";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>GET + Bootstrap</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container text-center mt-5">

    <h1>Choisissez un pays 🌍</h1>

    
    <div class="mt-4">
        <a href="?pays=france" class="btn btn-primary m-2">France</a>
        <a href="?pays=espagne" class="btn btn-danger m-2">Espagne</a>
        <a href="?pays=italie" class="btn btn-success m-2">Italie</a>
        <a href="?pays=allemagne" class="btn btn-warning m-2">Allemagne</a>
    </div>

    
    <?php if ($message != ""): ?>
        <div class="alert alert-info mt-4">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>