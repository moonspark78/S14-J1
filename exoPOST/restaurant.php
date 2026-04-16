<?php
if (isset($_POST["plat"])) {
    $plat = $_POST["plat"];
} else {
    $plat = "";
}
?>

<form method="POST">
    <select name="plat">
        <option value="">Choisir un plat</option>
        <option value="Pizza">Pizza</option>
        <option value="Burger">Burger</option>
        <option value="Sushi">Sushi</option>
    </select>
    <button type="submit">OK</button>
</form>

<?php
if ($plat) {
echo "Tu as choisi : " . $plat;
}
?>