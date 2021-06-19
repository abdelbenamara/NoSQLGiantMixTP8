<?php

class Commande
{
    function __construct(string $idCommande, string $idClient, array $produits) {
        $this->idCommande = $idCommande;
        $this->idClient = $idClient;
        $this->produits = $produits;
    }

    /**
     * @var string
     */
    private string $idCommande;

    /**
     * @var string
     */
    private string $idClient;

    /** Contient l'idProduit et sa quantité
     * @var array
     */
    private array $produits;

    /**
     * @return string
     */
    public function getIdCommande(): string
    {
        return $this->idCommande;
    }

    /**
     * @return string
     */
    public function getIdClient(): string
    {
        return $this->idClient;
    }

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
