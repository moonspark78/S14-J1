<?php

$platChoisi = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $platChoisi = $_POST["plat"] ?? "";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1 class="text-center mb-4">🍽️ Choisissez votre plat</h1>

    <form method="POST" class="card p-4 shadow-sm">

        <label class="form-label">Sélectionnez un plat :</label>

        <select name="plat" class="form-select mb-3" required>
            <option value="">-- Choisir --</option>
            <option value="Pizza">Pizza</option>
            <option value="Burger">Burger</option>
            <option value="Sushi">Sushi</option>
            <option value="Pâtes">Pâtes</option>
        </select>

        <button type="submit" class="btn btn-primary">
            Valider
        </button>

    </form>

    <?php if ($platChoisi): ?>
        <div class="alert alert-success mt-4 text-center">
            🍴 Vous avez choisi : <strong><?= $platChoisi ?></strong>
        </div>
    <?php endif; ?>

</div>

</body>
</html>