<?php

require __DIR__ . "/../../vendor/predis/predis/autoload.php";
require __DIR__ . "/../Entity/Panier.php";

Predis\Autoloader::register();

class PanierRepository
{
    /**
     * @var Predis\Client
     */
    public Predis\Client $redis;

    public function __construct()
    {
        try {
            $this->redis = new Predis\Client(array(
                "scheme" => "tcp",
                "host" => "localhost",//changer le nom de la base
                "port" => 6379
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function persistPanier(string $idClient)
    {
        $this->redis->hset($idClient, "init", 0);
        $this->addTimePanier($idClient);
    }

    function getPanier(string $idClient): Panier
    {
        $redisProduits = $this->redis->hgetall($idClient);
        $panier = new Panier($idClient);
        $panier->setProduits($redisProduits);
        return $panier;
    }

    function deletePanier(string $idClient)
    {
        $this->redis->del($idClient);
    }

    function addTimePanier(string $idClient)
    {
        $this->redis->expire($idClient, 300);
    }

    function addProduit(string $idProduit, string $idClient)
    {
        $this->persistProduitInPanier($idClient, $idProduit, 1);
    }

    function addQteProduit($qteProduit, string $idProduit, string $idClient)
    {
        $newQteProduit = $this->redis->hget($idClient, $idProduit) + $qteProduit;
        $this->persistProduitInPanier($idClient, $idProduit, $newQteProduit);
    }

    function removeQteProduit($qteProduit, string $idProduit, string $idClient)
    {
        $newQteProduit = $this->redis->hget($idClient, $idProduit) - $qteProduit;
        $this->persistProduitInPanier($idClient, $idProduit, $newQteProduit);
    }

    private function persistProduitInPanier(string $idClient, string $idProduit, $qteProduit)
    {
        $this->redis->hset($idClient, $idProduit, $qteProduit);
    }
}
