<?php

namespace App\Entity;

class Commande
{
    /**
     * @var int
     */
    private $idCommande;

    /**
     * @var array
     */
    private $qteProduits;

    /**
     * @return int
     */
    public function getIdCommande(): int
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
