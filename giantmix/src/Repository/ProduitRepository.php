<?php
require '../../vendor/autoload.php';
require '../Entity/Produit.php';

use Elasticsearch\ClientBuilder;

class ProduitRepository
{

    private $hosts = ['http://localhost:9200'];

    private $client;

    public function __construct()
    {
        $this->client = ClientBuilder::create()
            ->setHosts($this->hosts)
            ->build();
    }

    function searchProduit(string $motClef)
    {
        $params = [
            'index' => 'product',
            'body' => [
                'query' => [
                    'multi_match' => [
                        "query" => $motClef,
                        "fields" => ["Marque", "nom", "type"],
                        "fuzziness" => "AUTO"
                    ]
                ]
            ]
        ];

        $produits = array();
        $result = $this->client->search($params);
        foreach ($result['hits']['hits'] as $pResult) {
            $p = new Produit();
            $p->setNom($pResult["_source"]["nom"]);
            $p->setType($pResult["_source"]["type"]);
            $p->setMarque($pResult["_source"]["Marque"]);
            $p->setPrix($pResult["_source"]["prix"]);
            $p->setIdProduit($pResult["_id"]);
            array_push($produits, $p);
        }


        return $produits;
    }

    function getProduit($idProduit)
    {
        $params = [
            'index' => 'product',
            'id' => $idProduit
        ];
        return $this->client->get($params);
    }
}
