<?php

require_once __DIR__ . "/../Controller/PanierController.php";
require_once __DIR__ . "/../Repository/ProduitRepository.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if (isset($_GET["idProduit"])) {
    if ($_GET["do"] == "less") {
        removeProduit($_GET["idProduit"]);
    } else if ($_GET["do"] == "plus") {
        addProduit($_GET["idProduit"]);
    }
}

$panier = getPanierClient();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
</head>
<body>

<h2>Votre panier</h2>

<table>
    <tr>
        <td>Produit</td>
        <td>Quantité</td>
        <td>Prix (euros)</td>
    </tr>
    <?php
    $repoProduit = new ProduitRepository();
    foreach ($panier->getProduits() as $idProduit => $qte) {
        if ($idProduit == "init") {
            continue;
        }
        $produit = $repoProduit->getProduit($idProduit);
        echo "<tr><td>" . $produit->getNom() . "</td>";
        echo "<td>" . $qte . "</td>";
        echo "<td>" . $produit->getPrix() . "</td>";
        echo "<td><form action='panier.php' method='get'><button type='submit'>+</button>
              <input type='hidden' name='idProduit' value='" . $idProduit . "'> 
              <input type='hidden' name='do' value='plus'> 
              </form></td>
            ";
        echo "<td><form action='panier.php' method='get'><button type='submit'>-</button>
              <input type='hidden' name='idProduit' value='" . $idProduit . "'> 
              <input type='hidden' name='do' value='less'> 
              </form></td></tr>
            ";
    }
    ?>
</table>

<div class="submit-form">
    <form action="commande.php" method="get">
        <button type="submit">Passer la commande</button>
        <input type="hidden" name="commandToPanier" value="1">
    </form>
</div>

</body>
</html>
