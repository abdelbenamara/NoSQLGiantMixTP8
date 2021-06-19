<?php
session_start();
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
    <td>idProduit</td>
    <td>Produit</td>
    <td>Quantité</td>
    <td>Prix (euros)</td>
  </tr>
  <tr>
    <td>67</td>
    <td>Asus Zenbook</td>
    <td>1</td>
    <td>799.90</td>
    <td><button type="submit">+</button></td>
    <td><button type="submit">-</button></td>
  </tr>
  <tr>
    <td>42</td>
    <td>Lenovo Yoga Slim 7</td>
    <td>1</td>
    <td>679.99</td>
    <td><button type="submit">+</button></td>
    <td><button type="submit">-</button></td>
  </tr>
</table>

<div class="submit-form">
  <button type="submit">Passer la commande</button>
</div>

</body>
</html>