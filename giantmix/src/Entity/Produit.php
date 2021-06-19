<?php

class Produit
{
    /**
     * @var string
     */
    private int $idProduit;

    /**
     * @var string
     */
    private string $nom;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $marque;

    /**
     * @var double
     */
    private $prix;

    /**
     * @return string
     */
    public function getIdProduit(): string
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

    /**
     * @return string
     */
    public function getMarque(): string
    {
        return $this->marque;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getPrix(): string
    {
        return $this->prix;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $marque
     */
    public function setMarque(string $marque): void
    {
        $this->marque = $marque;
    }

    /**
     * @param float $prix
     */
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }


}
