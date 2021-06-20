<?php

require_once __DIR__ . "/../Repository/ProduitRepository.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function search_product($motclef): array
{
    $p = new ProduitRepository();
    return ($p->searchProduit($motclef));
}
