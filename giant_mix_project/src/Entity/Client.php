<?php

namespace App\Entity;

class Client
{
    /**
     * @var int
     */
    private $idClient;

    /**
     * @var Panier
     */
    private $panier;

    /**
     * @var array
     */
    private $commandes;

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
