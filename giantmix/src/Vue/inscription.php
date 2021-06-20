<?php

require_once __DIR__ . "/../Controller/ClientController.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if (isset($_POST["password"])) {
    createClient($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"]);
    header('Location: connexion.php');
} else if (isset($_SESSION["clientID"])) {
    header('Location: connexion.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'inscription</title>
</head>
<body>
<div>Vous n'êtes pas déjà client ? Inscrivez-vous !</div>

<form method="post" action="inscription.php">

    <div class="inscription-form">
        <input type="text" name="prenom" id="prenom" placeholder=" ">
        <label for="prenom">Prénom</label>
    </div>

    <div class="inscription-form">
        <input type="text" name="nom" id="nom" placeholder=" ">
        <label for="nom">Nom</label>
    </div>

    <div class="inscription-form">
        <input type="text" name="email" id="email" placeholder=" ">
        <label for="email">Adresse mail</label>
    </div>

    <div class="inscription-form">
        <input type="password" name="password" id="password" placeholder=" ">
        <label for="password">Mot de passe</label>
    </div>

    <div class="submit-form">
        <button type="submit">S'inscrire</button>
    </div>
</form>
</body>
</html>
