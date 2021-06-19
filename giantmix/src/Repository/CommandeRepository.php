<?php

require __DIR__ . "/../Entity/Commande.php";
require __DIR__ . "/PanierRepository.php";
require __DIR__ . "/../../vendor/autoload.php";

class CommandeRepository
{
    private $db;
    private $collection;

    function connect()
    {
        $m = new MongoDB\Client();
        $this->db = $m->commandes;
        $this->collection = $this->db->createCollection("col_commandes");
    }

    function panierToCommande(string $idClient): Commande
    {
        $panierRepo = new PanierRepository();
        $panier = $panierRepo->getPanier($idClient);
        $commande = new Commande('', $idClient, $panier->getProduits());
        return $commande;
    }

    function persistCommande(Commande $commande): void
    {
        $this->collection->insert(array(
            "idClient" => $commande->getIdClient(),
            "produits" => $commande->getProduits()
        ));
    }

    function getAllCommandesByClient(int $idClient): array
    {
        $cmds = array();
        $cursor = $this->collection->find();
        foreach ($cursor as $document) {
            if($document["idClient"] == $idClient) {
                array_push($cmds, new Commande($document["idCommande"], $document["idClient"], $document["produits"]));
            }
        }
        return $cmds;
    }
}
