<?php

require_once __DIR__ . "/../Repository/PanierRepository.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function addProduit($idProduit)
{
    $panierRepo = new PanierRepository();
    $panierRepo->addProduit($idProduit, $_SESSION["clientID"]);
    // var_dump($_SESSION["clientID"]);
}

function removeProduit($idProduit)
{
//TODO
}

function addCommandeFromPanier()
{
//TODO
}

function getPanierClient(): Panier
{
    $panierRepo = new PanierRepository();
    return $panierRepo->getPanier($_SESSION["clientID"]);
}
