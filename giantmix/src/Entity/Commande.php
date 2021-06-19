<?php

class Commande
{
    /**
     * @var string
     */
    private int $idCommande;

    /**
     * @var array
     */
    private array $qteProduits;

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
