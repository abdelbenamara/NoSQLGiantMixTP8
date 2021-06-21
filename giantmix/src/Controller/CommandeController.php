<?php

require_once __DIR__ . "/../Repository/CommandeRepository.php";
require_once __DIR__ . "/../Repository/ProduitRepository.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function getAllCommande(): array
{
    $repoCommande = new CommandeRepository();
    return $repoCommande->getAllCommandesByClient($_SESSION["ClientID"]);
}

function CalculateTotal(Commande $cmd): float
{
    $total = 0.0;
    $repoProduit = new ProduitRepository();
    foreach($cmd->getDetailsProduits() as $dtlsProduit) {
        $idProduit = $dtlsProduit[0];
        $qteProduit = $dtlsProduit[1];
        $produit = $repoProduit->getProduit($idProduit);
        $total += $produit->getPrix()*$qteProduit;
    }
    return $total;
}
