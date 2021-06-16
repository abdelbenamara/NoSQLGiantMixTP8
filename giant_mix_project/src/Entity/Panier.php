<?php

namespace App\Entity;

class Panier
{
    /**
     * @var int
     */
    private $idPanier;

    /**
     * @var array
     */
    private $produits;

    /**
     * @return array
     */
    public function getProduits(): array
    {
        return $this->produits;
    }

    /**
     * @param array $produits
     */
    public function setProduits(array $produits): void
    {
        $this->produits = $produits;
    }

    /**
     * @return int
     */
    public function getIdPanier(): int
    {
        return $this->idPanier;
    }
}
