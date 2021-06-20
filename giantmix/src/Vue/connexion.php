<?php

require_once __DIR__ . "/../Controller/ClientController.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if (isset($_POST["email"])) {
    if (connectClient($_POST["email"], $_POST["password"])) {
        header('Location: recherche.php');
    } else {
        echo "Erreur de connexion";
    }
} else if (isset($_SESSION["clientID"])) {
    header('Location: recherche.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<h2>Déjà client ? Enregistrez-vous !</h2>
<form action="connexion.php" method="post">
    <div class="input-form">
        <input type="text" name="email" id="email" placeholder=" ">
        <label for="email">Adresse mail</label>
    </div>

    <div class="input-form">
        <input type="password" name="password" id="password" placeholder=" ">
        <label for="password">Mot de passe</label>
    </div>

    <div class="submit-form">
        <button type="submit">Se connecter</button>
    </div>
</form>
</body>
</html>
