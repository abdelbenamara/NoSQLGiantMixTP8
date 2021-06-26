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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/recherche.css">
</head>

<body>

<div class="page">
    <div class="page-top">
        <h2>Nos produits</h2>

        <div class="nav-zone">
            <a href="panier.php">
                <button>Votre panier</button>
            </a>
            <a href="commande.php">
                <button>Vos commandes</button>
            </a>
            <form action="accueil.php" method="post">
                <input type="hidden" name="disconnect">
                <button type="submit">Se déconnecter</button>
            </form>
        </div>
    </div>

    <div class="recherche-zone">
        <form action="recherche.php" method="get">
            <label class="search-label" for="site-search">Recherchez un produit : </label>
            <input type="search" name="q" aria-label="Rechercher un produit ici">
            <button type="submit">Rechercher</button>
        </form>

        <?php
        if (isset($_GET["q"]) or isset($_GET["idProduit"])) {
            ?>
            <form action="recherche.php" method="post">
                <input type="hidden" name="cancel">
                <button type="submit">Réinitialiser</button>
            </form>
            <?php
        }
        ?>
    </div>

    <div class="product-zone">
        <?php
        foreach ($product as $p) {
            echo "<form method='get' action='recherche.php'>
                  <span>" . $p->getNom() . "</span>
                  <span>" . $p->getType() . "</span>
                  <span>" . $p->getMarque() . "</span>
                  <span>" . $p->getPrix() . " €</span>
                  <input type='hidden' name='idProduit' value='" . $p->getIdProduit() . "'>";
            if (isset($_GET["q"])) {
                echo "<input type='hidden' name='q' value='" . $_GET["q"] . "'>";
            }
            echo "<button type='submit'> Ajouter au panier</button></form>";
        }
        ?>
    </div>
</div>

</body>
</html>
