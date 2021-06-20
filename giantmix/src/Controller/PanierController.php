<?php

require_once "../Repository/PanierRepository.php";

function addProduit($idProduit){
//TODO
}

function removeProduit($idProduit){
//TODO
}

function addCommandeFromPanier(){
//TODO
}

function getPanierClient():Panier{
    $panierRepo = new PanierRepository();
   return $panierRepo->getPanier($_SESSION["clientID"]);
}

?>