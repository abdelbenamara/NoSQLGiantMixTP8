<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'inscription</title>
</head>
<body>
<div>Vous n'êtes pas déjà client ? Inscrivez-vous !</div>

<div>Vous êtes : </div>
<div>
    <input type="checkbox" id="genre_femme" name="genre">
    <label for="genre_femme">Femme</label>
</div>

<div>
    <input type="checkbox" id="genre_homme" name="genre">
    <label for="genre_homme">Homme</label>
</div>

<div class="inscription-form">
    <input type="text" name="nom" id="nom" placeholder=" ">
    <label for="nom">Nom</label>
</div>

<div class="inscription-form">
    <input type="text" name="prenom" id="prenom" placeholder=" ">
    <label for="prenom">Prénom</label>
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

</body>
</html>