<?php

class Panier
{

    public function __construct(string $idClient)
    {
        $this->idClient = $idClient;
    }

    /**
     * @var string
     */
    private string $idClient;

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

    /**
     * @return string
     */
    public function getIdClient(): string
    {
        return $this->idClient;
    }

}
