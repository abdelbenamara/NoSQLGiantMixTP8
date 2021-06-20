<?php

require_once "../Repository/CommandeRepository.php";

function getAllCommande(): array{
    $repoCommande = new CommandeRepository();
    return $repoCommande->getAllCommandesByClient($_SESSION["ClientID"]);
}

function CalculateTotal(Commande $cmd) : float{
    //TODO
    return 0.0;
}