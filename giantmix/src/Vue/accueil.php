<?php

require_once __DIR__ . "/../Controller/ClientController.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if (isset($_POST["disconnect"])) {
    unset($_SESSION["clientID"]);
}
if (isset($_POST["nom"]) and isset($_POST["prenom"])) {
    createClient($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"]);
}
if (isset($_POST["email"]) and isset($_POST["password"])) {
    if (!connectClient($_POST["email"], $_POST["password"])) {
        echo "Problème de connexion";
    }
}
if (isset($_SESSION["clientID"])) {
    header('Location: recherche.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/accueil.css">
</head>

<body>

<div class="page">
    <h1>Giant Mix Project</h1>

    <div class="content">
        <div>
            <h2>Vous n'êtes pas encore client ? Inscrivez-vous !</h2>

            <form action="accueil.php" method="post">
                <div class="input-form">
                    <input type="text" name="prenom" id="prenom" placeholder=" " required>
                    <label for="prenom">Prénom</label>
                </div>

                <div class="input-form">
                    <input type="text" name="nom" id="nom" placeholder=" " required>
                    <label for="nom">Nom</label>
                </div>

                <div class="input-form">
                    <input type="text" name="email" id="email" placeholder=" " required>
                    <label for="email">Adresse mail</label>
                </div>

                <div class="input-form">
                    <input type="password" name="password" id="password" placeholder=" " required>
                    <label for="password">Mot de passe</label>
                </div>

                <div class="submit-form">
                    <button type="submit">S'inscrire</button>
                </div>
            </form>
        </div>

        <div>
            <h2>Déjà client ? Connectez-vous !</h2>

            <form action="accueil.php" method="post">
                <div class="input-form">
                    <input type="text" name="email" id="email" placeholder=" " required>
                    <label for="email">Adresse mail</label>
                </div>

                <div class="input-form">
                    <input type="password" name="password" id="password" placeholder=" " required>
                    <label for="password">Mot de passe</label>
                </div>

                <div class="submit-form">
                    <button type="submit">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
