<?php

require_once __DIR__ . "/../../vendor/autoload.php";

class ClientRepository

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
    private string $clients = "clients";

    public function __construct()
    {
        try {
            $this->mongodb = new MongoDB\Client();
            $db = new MongoDB\Database($this->mongodb->getManager(), $this->database);
            $col_names = array();
            foreach ($db->listCollectionNames() as $collection_name) {
                array_push($col_names, $collection_name);
            }
            if (!in_array($this->clients, $col_names)) {
                $db->createCollection($this->clients);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function checkUpLogin(string $mail, string $password): string|null
    {
        $user = $this->mongodb->selectDatabase($this->database)->selectCollection($this->clients)->findOne(
            array("mail" => $mail, "password" => $password));
        if ($user != null) {
            return (string)$user['_id'];
        }
        return null;
    }

    function persistClient(Client $client)
    {
        $this->mongodb->selectDatabase($this->database)->selectCollection($this->clients)->insertOne(array(
            "prenom" => $client->getPrenom(),
            "nom" => $client->getNom(),
            "mail" => $client->getMail(),
            "password" => $client->getPassword()
        ));
    }
}
