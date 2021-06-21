<?php

//require_once __DIR__ . "/src/Entity/Client.php";
//require_once __DIR__ . "/src/Entity/Produit.php";
//require_once __DIR__ . "/src/Repository/PanierRepository.php";
//require_once __DIR__ . "/src/Repository/CommandeRepository.php";
//
//$client1 = new Client();
//$client1->setIdClient("1");
//
//$panier_repo = new PanierRepository();
//$panier_repo->createPanier($client1->getIdClient());
//
//$produit1 = new Produit();
//$produit1->setIdProduit("1");
//
//$panier_repo->addProduit($produit1->getIdProduit(), $client1->getIdClient());
//$panier_repo->addQteProduit(2, $produit1->getIdProduit(), $client1->getIdClient());
//
//$produit2 = new Produit();
//$produit2->setIdProduit("2");
//
//$panier_repo->addProduit($produit2->getIdProduit(), $client1->getIdClient());
//$panier_repo->addQteProduit(4, $produit2->getIdProduit(), $client1->getIdClient());
//
//$panier1 = $panier_repo->getPanier($client1->getIdClient());
//
//$commande1 = $panier_repo->panierToCommande($client1->getIdClient());
//
//$commande_repo = new CommandeRepository();
//$commande_repo->persistCommande($commande1);
//
//var_dump($commande_repo->getAllCommandesByClient($client1->getIdClient()));

header('Location: src/Vue/inscription.php');