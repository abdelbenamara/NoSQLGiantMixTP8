<?php

class Client
{
    /**
     * @var int
     */
    private int $idClient;

    /**
     * @var Panier
     */
    private Panier $panier;

    /**
     * @var array
     */
    private array $commandes;

    /**
     * @return int
     */
    public function getIdClient(): int
    {
        return $this->idClient;
    }

    /**
     * @return Panier
     */
    public function getPanier(): Panier
    {
        return $this->panier;
    }

    /**
     * @param Panier $panier
     */
    public function setPanier(Panier $panier): void
    {
        $this->panier = $panier;
    }

    /**
     * @return array
     */
    public function getCommandes(): array
    {
        return $this->commandes;
    }

    /**
     * @param array $commandes
     */
    public function setCommandes(array $commandes): void
    {
        $this->commandes = $commandes;
    }
}
