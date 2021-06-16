<?php

namespace App\Entity;

class Produit
{
    /**
     * @var int
     */
    private $idProduit;

    /**
     * @var string
     */
    private $nom;

    /**
     * @return int
     */
    public function getIdProduit(): int
    {
        return $this->idProduit;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }
}
