<?php

require "../Repository/ProduitRepository.php";

function search_product($motclef): array
{
    $p = new ProduitRepository();
    return ($p->searchProduit($motclef));
}