<?php

class Commande
{
    function __construct(string $idClient, array|object $detailsProduits, string $dateCommande)
    {
        $this->idClient = $idClient;
        $this->setDetailsProduits($detailsProduits);
        $this->setDateCommande($dateCommande);
    }

    /**
     * @var string
     */
    private string $idCommande;

    /**
     * @var string
     */
    private string $idClient;

    /**
     * @var string
     */
    private string $dateCommande;

    /**
     * @var array|object
     */
    private array|object $detailsProduits;

    /**
     * @return string
     */
    public function getIdCommande(): string
    {
        return $this->idCommande;
    }

    /**
     * @param string $idCommande
     */
    public function setIdCommande(string $idCommande): void
    {
        $this->idCommande = $idCommande;
    }

    /**
     * @return string
     */
    public function getIdClient(): string
    {
        return $this->idClient;
    }

    /**
     * @return string
     */
    public function getDateCommande(): string
    {
        return $this->dateCommande;
    }

    /**
     * @param string $dateCommande
     */
    public function setDateCommande(string $dateCommande): void
    {
        $this->dateCommande = $dateCommande;
    }

    /**
     * @return array|object
     */
    public function getDetailsProduits(): array|object
    {
        return $this->detailsProduits;
    }

    /**
     * @param array|object $detailsProduits
     */
    public function setDetailsProduits(object|array $detailsProduits): void
    {
        $this->detailsProduits = $detailsProduits;
    }
}
