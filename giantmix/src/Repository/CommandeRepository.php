<?php

require __DIR__ . "/../Entity/Commande.php";
require __DIR__ . "/PanierRepository.php";
require __DIR__ . "/../../vendor/autoload.php";

class CommandeRepository
{
    /**
     * @var MongoDB\Database
     */
    private MongoDB\Database $db;

    /**
     * @var array|object
     */
    private array|object $collection;

    public function __construct()
    {
        $mongo_client = new MongoDB\Client();
        $this->db = new MongoDB\Database($mongo_client->getManager(), "commandes");
        $col_commandes = "col_commandes";
        $col_names = array();
        foreach ($this->db->listCollectionNames() as $collection_name) {
            array_push($col_names, $collection_name);
        }
        if (!in_array($col_commandes, $col_names)) {
            $this->db->createCollection($col_commandes);
        }
        $this->collection = $this->db->selectCollection($col_commandes);
    }

    function panierToCommande(string $idClient): Commande
    {
        $panierRepo = new PanierRepository();
        $panier = $panierRepo->getPanier($idClient);
        return new Commande($idClient, $panier->getProduits());
    }

    function persistCommande(Commande $commande): void
    {
        $this->collection->insertOne(array(
            "idClient" => $commande->getIdClient(),
            "produits" => $commande->getDetailsProduits()
        ));
    }

    function getAllCommandesByClient(int $idClient): array
    {
        $cmds = array();
        $cursor = $this->collection->find();
        foreach ($cursor as $document) {
            if ($document["idClient"] == $idClient) {
                array_push($cmds, new Commande($document["idClient"], $document["produits"]));
            }
        }
        return $cmds;
    }
}
