<?php

require_once __DIR__ . "/../Repository/ProduitRepository.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function searchProduit($motclef): array
{
    $p = new ProduitRepository();
    return ($p->searchProduit($motclef));
}

function searchAllProduits(): array
{
    $p = new ProduitRepository();
    return ($p->searchAllProduits());
}
