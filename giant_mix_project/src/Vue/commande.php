<?php

session_start();
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
  <tr>
    <td>1</td>
    <td>12/04/2010</td>
    <td>1479.89</td>
    <td><button type="submit">Afficher les détails de la commande</button></td>
  </tr>

  <tr>
    <td>2</td>
    <td>14/05/2010</td>
    <td>654.20</td>
    <td><button type="submit">Afficher les détails de la commande</button></td>
  </tr>
</table>


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
  </tr>
  <tr>
    <td>42</td>
    <td>Lenovo Yoga Slim 7</td>
    <td>1</td>
    <td>679.99</td>
  </tr>
</table>


</body>
</html>