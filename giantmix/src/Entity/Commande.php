<?php

class Commande
{
    /**
     * @var int
     */
    private int $idCommande;

    /**
     * @var array
     */
    private array $qteProduits;

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
