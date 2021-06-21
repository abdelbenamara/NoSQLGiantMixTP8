<?php

require_once __DIR__ . "/../Controller/RechercheController.php";
require_once __DIR__ . "/../Controller/PanierController.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

$product = searchAllProduits();

if (!isset($_SESSION["clientID"])) {
    header('Location: accueil.php');
}
if (isset($_POST["cancel"])) {
    unset($_GET["q"]);
    unset($_GET["idProduit"]);
}
if (isset($_GET["q"])) {
    $product = searchProduit($_GET["q"]);
} else if (isset($_GET["idProduit"])) {
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

<div>
    <h2>Nos produits</h2>

    <form action="accueil.php" method="post">
        <input type="hidden" name="disconnect">
        <button type="submit">Se déconnecter</button>
    </form>
</div>

<div>
    <form action="recherche.php" method="get">
        <label for="site-search">Recherchez un produit : </label>
        <input type="search" id="site-search" name="q" aria-label="Rechercher un produit ici">
        <button type="submit">Rechercher</button>
    </form>

    <?php
    if (isset($_GET["q"]) or isset($_GET["idProduit"])) {
        ?>
        <form action="recherche.php" method="post">
            <input type="hidden" name="cancel">
            <button type="submit">Annuler</button>
        </form>
        <?php
    }
    ?>
</div>

<table>
    <?php
    foreach ($product as $p) {
        echo "<form method='get' action='recherche.php'>";
        echo "<tr><td>" . $p->getNom() . "</td>";
        echo "<td>" . $p->getType() . "</td>";
        echo "<td>" . $p->getMarque() . "</td>";
        echo "<td>" . $p->getPrix() . "€</td>";
        echo "<td><input type='hidden' name='idProduit' value='" . $p->getIdProduit() . "'></td>";
        if (isset($_GET["q"])) {
            echo "<td><input type='hidden' name='q' value='" . $_GET["q"] . "'></td>";
        }
        echo "<td><button type='submit'> Ajouter au panier</button></td>";
        echo "</form>";
    }
    ?>
</table>

<div>
    <a href="panier.php">
        <button>Votre panier</button>
    </a>
    <a href="commande.php">
        <button>Vos commandes</button>
    </a>
</div>

</body>
</html>
