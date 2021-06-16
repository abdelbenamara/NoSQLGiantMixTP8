<?php

require __DIR__ . "/src/Repository/PanierRepository.php";

$panierRepository = new PanierRepository();

$panierRepository->connect();
$panierRepository->persistPanier(1);
$panierRepository->addProduit("ordi1", 1);
$panierRepository->addQteProduit(10, 'ordi1', 1);
$panierRepository->removeQteProduit(8, 'ordi1', 1);
$panier = $panierRepository->getPanier(1);
foreach ($panier as $item) {
    echo $item;
}
$panierRepository->addTimePanier(1);
$panierRepository->deletePanier(1);
