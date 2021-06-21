<?php

require_once __DIR__ . "/../Repository/CommandeRepository.php";
require_once __DIR__ . "/../Repository/ProduitRepository.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function getAllCommande(): array
{
    $commandeRepo = new CommandeRepository();
    return $commandeRepo->getAllCommandesByClient($_SESSION["clientID"]);
}

function calculateTotalOfCommande(Commande $cmd): float
{
    $total = 0.0;
    $produitRepo = new ProduitRepository();
    foreach ($cmd->getDetailsProduits() as $idProduit => $qte) {
        if ($idProduit == "init") {
            continue;
        }
        $produit = $produitRepo->getProduit($idProduit);
        $total += $produit->getPrix() * $qte;
    }
    return $total;
}

function getObjectFromIdProduit(string $idProduit): Produit
{
    $produitRepo = new ProduitRepository();
    return $produitRepo->getProduit($idProduit);
}
