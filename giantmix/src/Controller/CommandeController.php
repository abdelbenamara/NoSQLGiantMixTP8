<?php

require_once __DIR__ . "/../Repository/CommandeRepository.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function getAllCommande(): array
{
    $repoCommande = new CommandeRepository();
    return $repoCommande->getAllCommandesByClient($_SESSION["ClientID"]);
}

function CalculateTotal(Commande $cmd): float
{
    //TODO
    return 0.0;
}
