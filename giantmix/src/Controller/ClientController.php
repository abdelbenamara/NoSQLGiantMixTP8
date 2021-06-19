<?php

use App\Entity\Client;
use App\Entity\Panier;
use App\Repository\ClientRepository;

require "../Repository/ClientRepository.php";

function createClient($nom, $prenom, $mail, $password){
    $client = new Client();
    $client->setNom($nom);
    $client->setMail($mail);
    $client->setPassword($password);
    $client->setPrenom($prenom);
    $client->setPanier(new Panier());

    $repo = new ClientRepository();
    $repo->connect();
    $repo->persistClient($client);

}

function connectClient($mail, $password){
    session_start();
    $repo = new ClientRepository();
    $repo->connect();
    $idClient = $repo->checkUpLogin($mail, $password);
    if(!is_null($idClient)){
        $_SESSION["clientID"] = $idClient;
        return true;
    }
    return false;

}