<?php

namespace App\Entity;

class Commande
{
    /**
     * @var string
     */
    private $idCommande;

    /**
     * @var array
     */
    private $qteProduits;

    /**
     * @return string
     */
    public function getIdCommande(): string
    {
        return $this->idCommande;
    }

    /**
     * @return array
     */
    public function getDetailsProduits(): array
    {
        return $this->detailsProduits;
    }

    /**
     * @param array $detailsProduits
     */
    public function setDetailsProduits(array $detailsProduits): void
    {
        $this->detailsProduits = $detailsProduits;
    }
}
