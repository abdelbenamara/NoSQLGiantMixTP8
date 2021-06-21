<?php

require_once __DIR__ . "/../../vendor/predis/predis/autoload.php";
require_once __DIR__ . "/../Entity/Panier.php";
require_once __DIR__ . "/../Entity/Commande.php";

Predis\Autoloader::register();

class PanierRepository
{
    /**
     * @var Predis\Client
     */
    private Predis\Client $redis;

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

    function createPanier(string $idClient)
    {
        $this->redis->hset($idClient, "init", 0);
        $this->addTimePanier($idClient);
    }

    function getPanier(string $idClient): Panier
    {
        $this->createPanierIfNotExists($idClient);
        $redisProduits = $this->redis->hgetall($idClient);
        $panier = new Panier($idClient);
        $panier->setProduits($redisProduits);
        return $panier;
    }

    function deletePanier(string $idClient)
    {
        $this->redis->del($idClient);
    }

    function addProduit(string $idProduit, string $idClient)
    {
        $this->createPanierIfNotExists($idClient);
        if ($this->redis->hexists($idClient, $idProduit)) {
            $this->addQteProduit(1, $idProduit, $idClient);
        } else {
            $this->persistProduitInPanier($idClient, $idProduit, 1);
        }
    }

    function addQteProduit($qteProduit, string $idProduit, string $idClient)
    {
        $this->createPanierIfNotExists($idClient);
        $newQteProduit = $this->redis->hget($idClient, $idProduit) + $qteProduit;
        $this->persistProduitInPanier($idClient, $idProduit, $newQteProduit);
    }

    function removeQteProduit($qteProduit, string $idProduit, string $idClient)
    {
        if ($this->redis->exists($idClient)) {
            $newQteProduit = $this->redis->hget($idClient, $idProduit) - $qteProduit;
            if ($newQteProduit <= 0) {
                $this->redis->hdel($idClient, array($idProduit));
            } else {
                $this->persistProduitInPanier($idClient, $idProduit, $newQteProduit);
            }
        } else {
            $this->createPanier($idClient);
        }
    }

    function panierToCommande(string $idClient): Commande|null
    {
        if ($this->redis->exists($idClient)) {
            $panier = $this->getPanier($idClient);
            $this->deletePanier($idClient);
            $date = date("Y-m-d H:i:s");
            return new Commande($idClient, $panier->getProduits(), $date);
        } else {
            $this->createPanier($idClient);
            return null;
        }
    }

    private function addTimePanier(string $idClient)
    {
        $this->redis->expire($idClient, 300);
    }

    private function createPanierIfNotExists(string $idClient)
    {
        if (!$this->redis->exists($idClient)) {
            $this->createPanier($idClient);
        }
    }

    private function persistProduitInPanier(string $idClient, string $idProduit, $qteProduit)
    {
        $this->createPanierIfNotExists($idClient);
        $this->redis->hset($idClient, $idProduit, $qteProduit);
        $this->addTimePanier($idClient);
    }
}
