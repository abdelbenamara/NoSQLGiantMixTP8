<?php

require_once __DIR__ . "/../Controller/PanierController.php";
require_once __DIR__ . "/../Controller/CommandeController.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

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
</head>
<body>

<table>
    <tr>
        <td>Numéro de commande</td>
        <td>Date de la commande</td>
        <td>Total (euros)</td>
    </tr>
    <?php foreach ($commandes as $cmd) {
        echo "<tr><td>" . $cmd->getIdClient() . "</td>";
        echo "<td>" . $cmd->getDateCommande() . "</td>";
        echo "<td>" . calculateTotalOfCommande($cmd) . "</td>";
        if (!isset($_POST["displayDetails"])) {
            ?>
            <td>
                <form action='commande.php' method='post'>
                    <button type="submit">Afficher les détails de la commande</button>
                    <input type="hidden" name="displayDetails">
                </form>
            </td>
            <?php
        }
        if (isset($_POST["displayDetails"])) {
            ?>
            <td>
                <form action='commande.php' method='post'>
                    <button type="submit">Masquer les détails de la commande</button>
                    <input type="hidden" name="hideDetails">
                </form>
            </td>
            <div>
                <table>
                    <tr>
                        <td>Produit</td>
                        <td>Quantité</td>
                        <td>Prix (euros)</td>
                    </tr>
                    <?php foreach ($cmd->getDetailsProduits() as $idProduit => $qte) {
                        if ($idProduit == "init") {
                            continue;
                        }
                        $produit = getObjectFromIdProduit($idProduit);
                        echo "<tr><td>" . $produit->getNom() . "</td>";
                        echo "<td>" . $qte . "</td>";
                        echo "<td>" . $produit->getPrix() . "</td></tr>";
                    } ?>
                </table>
            </div>
            <?php
        }
    } ?>
</table>

</body>
</html>
