<?php

require_once __DIR__ . "/../Controller/PanierController.php";
require_once __DIR__ . "/../Controller/CommandeController.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if (!isset($_SESSION["clientID"])) {
    header('Location: accueil.php');
}
if (isset($_GET["commandToPanier"])) {
    addCommandeFromPanier();
}
if (isset($_POST["hideDetails"])) {
    unset($_POST["displayDetails"]);
}

$commandes = getAllCommande()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/commande.css">
</head>

<body>

<div class="page">
    <div class="page-top">
        <h2>Vos commandes</h2>

        <div class="nav-zone">
            <a href="recherche.php">
                <button>Nos produits</button>
            </a>
            <a href="panier.php">
                <button>Votre panier</button>
            </a>
            <form action="accueil.php" method="post">
                <input type="hidden" name="disconnect">
                <button type="submit">Se déconnecter</button>
            </form>
        </div>
    </div>

    <div class="product-zone">
        <?php foreach ($commandes as $cmd) {
            echo "<div class='commande-zone'>";
            echo "<span>Commande n°" . $cmd->getIdCommande() . "</span>";
            echo "<span>Passée le " . $cmd->getDateCommande() . "</span>";
            echo "<span>Total de " . calculateTotalOfCommande($cmd) . " €</span>";
            if (!isset($_POST["displayDetails"]) or $_POST["displayDetails"] != $cmd->getIdCommande()) {
                echo "<form action='commande.php' method='post'>
                      <button type='submit'>Afficher les détails de la commande</button>
                      <input type='hidden' name='displayDetails' value='" . $cmd->getIdCommande() . "'>
                      </form></div>";
            } else if ($_POST["displayDetails"] == $cmd->getIdCommande()) {
                ?>
                <form action='commande.php' method='post'>
                    <button type="submit">Masquer les détails de la commande</button>
                    <input type="hidden" name="hideDetails">
                </form>
                <?php
                echo "</div>";
                foreach ($cmd->getDetailsProduits() as $idProduit => $qte) {
                    if ($idProduit == "init") {
                        continue;
                    }
                    $produit = getObjectFromIdProduit($idProduit);
                    echo "<div class='commande-info'><span>" . $produit->getNom() . "</span>
                          <span>x" . $qte . "</span>
                          <span>" . $produit->getPrix() . " €</span></div>";
                }
            }
        } ?>
    </div>
</div>

</body>
</html>
