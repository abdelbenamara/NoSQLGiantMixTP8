<?php

require __DIR__ . "/../Repository/CommandeRepository.php";
require __DIR__ . "/../Entity/Commande.php";
require __DIR__ . "/../Entity/Produit.php";
require __DIR__ . "/../Entity/Panier.php";


$produit1 = new Produit();
$produit1->setNom('produit1');
$produit1->setQteCommandee(2);

$produit2 = new Produit();
$produit2->setNom('produit2');
$produit2->setQteCommandee(1);

$produit3 = new Produit();
$produit3->setNom('produit3');
$produit3->setQteCommandee(12);

$produits1 = [$produit1, $produit2];
$produits2 = [$produit1, $produit2, $produit3];

$panier1 = new Panier('1');
$panier1->setProduits($produits1);
$panier2 = new Panier('2');
$panier2->setProduits($produits2);

$cmd1 = new Commande('', '1', $produits1);
$cmd2 = new Commande('', '1', $produits2);


$cmdRepo = new CommandeRepository();
$cmdRepo->connect();

$cmdFromPanier = $cmdRepo->panierToCommande('1');
var_dump($cmdFromPanier);

$cmdRepo->persistCommande($cmd1);
$cmdRepo->persistCommande($cmd2);
// Check in DB

$cmdsClientId1 = $cmdRepo->getAllCommandesByClient(1);
var_dump($cmdsClientId1);

?>