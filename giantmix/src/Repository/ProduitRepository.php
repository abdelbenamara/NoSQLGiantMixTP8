<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Entity/Produit.php';

class ProduitRepository
{
    /**
     * @var string[]
     */
    private array $hosts = ['http://localhost:9200'];

    /**
     * @var Elasticsearch\Client
     */
    private Elasticsearch\Client $client;

    public function __construct()
    {
        $this->client = Elasticsearch\ClientBuilder::create()
            ->setHosts($this->hosts)
            ->build();
    }

    function searchProduit(string $motClef): array
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
            $p = $this->mapProduitToObject($pResult);
            array_push($produits, $p);
        }
        return $produits;
    }

    function getProduit($idProduit): Produit
    {
        $params = [
            'index' => 'product',
            'id' => $idProduit
        ];
        return $this->mapProduitToObject($this->client->get($params));
    }

    private function mapProduitToObject(array $pResult): Produit
    {
        $p = new Produit();
        $p->setIdProduit($pResult["_id"]);
        $p->setNom($pResult["_source"]["nom"]);
        $p->setType($pResult["_source"]["type"]);
        $p->setMarque($pResult["_source"]["Marque"]);
        $p->setPrix($pResult["_source"]["prix"]);
        return $p;
    }
}
