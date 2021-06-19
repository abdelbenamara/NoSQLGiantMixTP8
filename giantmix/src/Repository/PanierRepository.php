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

    function connect()
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

    function persistPanier($idClient)
    {
        $this->redis->hset($idClient, "init", 0);
        $this->addTimePanier($idClient);
    }

    function getPanier($idClient): Panier
    {
        $redisProduits = $this->redis->hgetall($idClient);
        $panier = new Panier();
        $panier->setProduits($redisProduits);
        return $panier;
    }

    function deletePanier($idClient)
    {
        $this->redis->del($idClient);
    }

    function addTimePanier($idClient)
    {
        $this->redis->expire($idClient, 300);
    }

    function addProduit($idProduit, $idClient)
    {
        $this->persistProduit($idClient, $idProduit, 1);
    }

    function addQteProduit($qteProduit, $idProduit, $idClient)
    {
        $newQteProduit = $this->redis->hget($idClient, $idProduit) + $qteProduit;
        $this->persistProduit($idClient, $idProduit, $newQteProduit);
    }

    function removeQteProduit($qteProduit, $idProduit, $idClient)
    {
        $newQteProduit = $this->redis->hget($idClient, $idProduit) - $qteProduit;
        $this->persistProduit($idClient, $idProduit, $newQteProduit);
    }

    private function persistProduit($idClient, $idProduit, $qteProduit)
    {
        $this->redis->hset($idClient, $idProduit, $qteProduit);
    }
}
