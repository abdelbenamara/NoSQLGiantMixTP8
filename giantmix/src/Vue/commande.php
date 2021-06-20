<?php

require_once "../Controller/PanierController.php";
require_once "../Controller/CommandeController.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if (isset($_GET["commandToPanier"])) {
    addCommandeFromPanier();
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
        echo "<td>" . CalculateTotal($cmd) . "</td>";
        ?>
        <td>
            <button type="submit">Afficher les détails de la commande</button>
        </td>
        <div>
            <table>
                <tr>
                    <td>Produit</td>
                    <td>Quantité</td>
                    <td>Prix (euros)</td>
                </tr>
                <?php foreach ($cmd->getDetailsProduits() as $qte => $produit) {
                    echo "<tr><td>" . $produit->getNom() . "</td>";
                    echo "<td>" . $qte . "</td>";
                    echo "<td>" . $produit->getPrix() . "</td></tr>";
                } ?>
            </table>
        </div>
    <?php } ?>
</table>

</body>
</html>
