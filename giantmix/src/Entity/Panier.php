<?php

class Panier
{
    /**
     * @var array
     */
    private array $produits;

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
}
