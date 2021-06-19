<?php

class Commande
{
    function __construct(string $idClient, array|object $detailsProduits)
    {
        $this->idClient = $idClient;
        $this->detailsProduits = $detailsProduits;
    }

    /**
     * @var string
     */
    private string $idClient;

    /**
     * @var array|object
     */
    private array|object $detailsProduits;

    /**
     * @return array|object
     */
    public function getDetailsProduits(): array|object
    {
        return $this->detailsProduits;
    }

    /**
     * @param array|object $detailsProduits
     */
    public function setDetailsProduits(object|array $detailsProduits): void
    {
        $this->detailsProduits = $detailsProduits;
    }

    /**
     * @return string
     */
    public function getIdClient(): string
    {
        return $this->idClient;
    }


}
