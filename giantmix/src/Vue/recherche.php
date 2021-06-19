<?php

require "../Controller/RechercheController.php";

$product = array();

if(isset($_GET["q"])){
    $product = search_product($_GET["q"]);
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

<form action="recherche.php" method="get" >
    <label for="site-search">Recherchez un produit : </label>
    <input type="search" id="site-search" name="q" aria-label="Rechercher un produit ici">
    <button type="submit">Rechercher</button>
</form>


<table>
    <?php
    foreach ($product as $p){

        echo "<tr><td>".$p->getNom()."</td>";
        echo "<td>".$p->getType()."</td>";
        echo "<td>".$p->getMarque()."</td>";
        echo "<td>".$p->getPrix()."€</td>";
        echo "<td hidden>".$p->getIdProduit()."</td></tr>";
    }
    ?>
<!---
    <tr>
        <td>David</td>
        <td>33 ans</td>
        <td>Espagne</td>
        <td><button type="submit">Ajouter au panier</button></td>
    </tr>
    <tr>
        <td>Abdel</td>
        <td>26 ans</td>
        <td>États-Unis</td>
        <td><button type="submit">Ajouter au panier</button></td>
    </tr>
    <tr>
        <td>Mathieu</td>
        <td>20 ans</td>
        <td>Allemagne</td>
        <td><button type="submit">Ajouter au panier</button></td>
    </tr>
 -->
</table>


</body>
</html>