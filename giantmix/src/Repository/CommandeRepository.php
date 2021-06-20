<?php

require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "/../Entity/Commande.php";
require_once __DIR__ . "/PanierRepository.php";

class CommandeRepository
{
    /**
     * @var MongoDB\Client
     */
    private MongoDB\Client $mongodb;

    /**
     * @var string
     */
    private string $database = "giantmix_bdd";

    /**
     * @var string
     */
    private string $commandes = "commandes";


    public function __construct()
    {
        try {
            $this->mongodb = new MongoDB\Client();
            $db = new MongoDB\Database($this->mongodb->getManager(), $this->database);
            $col_names = array();
            foreach ($db->listCollectionNames() as $collection_name) {
                array_push($col_names, $collection_name);
            }
            if (!in_array($this->commandes, $col_names)) {
                $db->createCollection($this->commandes);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function panierToCommande(string $idClient): Commande
    {
        $panierRepo = new PanierRepository();
        $panier = $panierRepo->getPanier($idClient);
        return new Commande($idClient, $panier->getProduits());

    }

    function persistCommande(Commande $commande): void
    {
        $this->mongodb->selectDatabase($this->database)->selectCollection($this->commandes)->insertOne(array(
            "idClient" => $commande->getIdClient(),
            "produits" => $commande->getDetailsProduits()
        ));
    }

    function getAllCommandesByClient(int $idClient): array
    {
        $cmds = array();
        $cursor = $this->mongodb->selectDatabase($this->database)->selectCollection($this->commandes)->find();
        foreach ($cursor as $document) {
            if ($document["idClient"] == $idClient) {
                array_push($cmds, new Commande($document["idClient"], $document["produits"]));
            }
        }
        return $cmds;
    }
}
