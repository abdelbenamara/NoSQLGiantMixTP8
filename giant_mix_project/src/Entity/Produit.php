<?php

class Produit
{
    /**
     * @var string
     */
    private string $idProduit;

    /**
     * @var int
     */
    private int $qteCommandee;

    /**
     * @var string
     */
    private string $nom;

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


}
