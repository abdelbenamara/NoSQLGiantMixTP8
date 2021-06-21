<?php

require_once __DIR__ . "/../Controller/RechercheController.php";
require_once __DIR__ . "/../Controller/PanierController.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

$product = array();

if (isset($_GET["q"])) {
    $product = search_product($_GET["q"]);
}

if (isset($_GET["idProduit"])) {
    addProduit($_GET["idProduit"]);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- <link rel="stylesheet" href="styleRecherche.css" />-->
</head>
<body>

<form action="recherche.php" method="get">
    <label for="site-search">Recherchez un produit : </label>
    <input type="search" id="site-search" name="q" aria-label="Rechercher un produit ici">
    <button type="submit">Rechercher</button>
</form>


<table>
    <?php
    foreach ($product as $p) {
        echo "<form method='get' action='recherche.php'>";
        echo "<tr><td>" . $p->getNom() . "</td>";
        echo "<td>" . $p->getType() . "</td>";
        echo "<td>" . $p->getMarque() . "</td>";
        echo "<td>" . $p->getPrix() . "€</td>";
        echo "<td><input type='hidden' name='idProduit' value='" . $p->getIdProduit() . "'></td>";
        echo "<td><input type='hidden' name='q' value='" . $_GET["q"] . "'></td>";
        echo "<td><button type='submit'> Ajouter au panier</button></td>";
        echo "</form>";
    }
    ?>
</table>

</body>
</html>
