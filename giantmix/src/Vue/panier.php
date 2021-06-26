<?php

require_once __DIR__ . "/../Controller/PanierController.php";
require_once __DIR__ . "/../Repository/ProduitRepository.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if (!isset($_SESSION["clientID"])) {
    header('Location: accueil.php');
}
if (isset($_GET["idProduit"])) {
    if ($_GET["do"] == "less") {
        removeProduit($_GET["idProduit"]);
    } else if ($_GET["do"] == "plus") {
        addProduit($_GET["idProduit"]);
    }
}

$panier = getPanierClient();
$heureFinPanier = getHeureFinPanier();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/panier.css">
</head>

<body>

<div class="page">
    <div class="page-top">
        <h2>Votre panier <?php
            if (count($panier->getProduits()) > 1) {
                echo "<span>(disponible jusqu'à " . $heureFinPanier . ")</span>";
            }
            ?>
        </h2>

        <div class="nav-zone">
            <a href="commande.php">
                <button>Vos commandes</button>
            </a>
            <a href="recherche.php">
                <button>Nos produits</button>
            </a>
            <form action="accueil.php" method="post">
                <input type="hidden" name="disconnect">
                <button type="submit">Se déconnecter</button>
            </form>
        </div>
    </div>

    <div class="product-zone">
        <?php
        $repoProduit = new ProduitRepository();
        foreach ($panier->getProduits() as $idProduit => $qte) {
            if ($idProduit == "init") {
                continue;
            }
            $produit = $repoProduit->getProduit($idProduit);
            echo "<div><span>" . $produit->getNom() . "</span>";
            echo "<span>x" . $qte . "</span>";
            echo "<span>" . $produit->getPrix() . " €</span>";
            echo "<form action='panier.php' method='get'>
                  <button type='submit'>Ajouter (+1)</button>
                  <input type='hidden' name='idProduit' value='" . $idProduit . "'> 
                  <input type='hidden' name='do' value='plus'></form>";
            echo "<form action='panier.php' method='get'>
                  <button type='submit'>Retirer (-1)</button>
                  <input type='hidden' name='idProduit' value='" . $idProduit . "'> 
                  <input type='hidden' name='do' value='less'></form></div>";
        }
        ?>
    </div>

    <div class="commande-form">
        <form action="commande.php" method="get">
            <button type="submit">Passer la commande</button>
            <input type="hidden" name="commandToPanier" value="1">
        </form>
    </div>
</div>

<div>

</div>

</body>
</html>
