<?php

class Produit
{
    /**
     * @var string
     */
    private string $idProduit = "";

    /**
     * @var string
     */
    private string $nom = "";

    /**
     * @var string
     */
    private string $type = "";

    /**
     * @var string
     */
    private string $marque = "";

    /**
     * @var float
     */
    private float $prix = 0.0;

    /**
     * @var int
     */
    private int $qteCommandee = 0;

    /**
     * @return string
     */
    public function getIdProduit(): string
    {
        return $this->idProduit;
    }

    /**
     * @param string $idProduit
     */
    public function setIdProduit(string $idProduit): void
    {
        $this->idProduit = $idProduit;
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

    /**
     * @return int
     */
    public function getQteCommandee(): int
    {
        return $this->qteCommandee;
    }

    /**
     * @param int $qteCommandee
     */
    public function setQteCommandee(int $qteCommandee): void
    {
        $this->qteCommandee = $qteCommandee;
    }

    public function toArray(): array
    {
        return array("idProduit" => $this->idProduit, "marque" => $this->marque, "nom" => $this->nom,
            "prix" => $this->prix, "qteCommandee" => $this->qteCommandee);
    }
}
