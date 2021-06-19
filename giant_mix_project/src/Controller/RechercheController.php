<?php

require "../Repository/ProduitRepository.php";

function search_product($motclef): array
{
    $p = new ProduitRepository();
    $p->connect();
    return ($p->searchProduit($motclef));
}