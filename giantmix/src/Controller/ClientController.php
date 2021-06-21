<?php

require_once __DIR__ . "/../Entity/Client.php";
require_once __DIR__ . "/../Repository/ClientRepository.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function createClient($nom, $prenom, $mail, $password)
{
    $client = new Client();
    $client->setNom($nom);
    $client->setMail($mail);
    $client->setPassword($password);
    $client->setPrenom($prenom);

    $repo = new ClientRepository();
    $repo->persistClient($client);
}

function connectClient($mail, $password): bool
{
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $repo = new ClientRepository();
    $idClient = $repo->checkUpLogin($mail, $password);
    if (!is_null($idClient)) {
        $_SESSION["clientID"] = $idClient;
        return true;
    }
    return false;
}
