<?php

require_once __DIR__ . "/../Repository/PanierRepository.php";
require_once __DIR__ . "/../Repository/CommandeRepository.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function addProduit($idProduit)
{
    $panierRepo = new PanierRepository();
    $panierRepo->addProduit($idProduit, $_SESSION["clientID"]);
}

function removeProduit($idProduit)
{
    $panierRepo = new PanierRepository();
    $panierRepo->removeQteProduit(1, $idProduit, $_SESSION["clientID"]);
}

function addCommandeFromPanier()
{
    $panierRepo = new PanierRepository();
    $commande = $panierRepo->panierToCommande($_SESSION["clientID"]);
    if (!is_null($commande)) {
        $commandeRepo = new CommandeRepository();
        $commandeRepo->persistCommande($commande);
    }
}

function getPanierClient(): Panier
{
    $panierRepo = new PanierRepository();
    return $panierRepo->getPanier($_SESSION["clientID"]);
}

function getHeureFinPanier(): string
{
    $panierRepo = new PanierRepository();
    return $panierRepo->getHeureDeFinPanier($_SESSION["clientID"]);
}
