# Contexte

Ce repository contient les livrables du projet NoSQLGiantMix (TP8), projet final du cours de bases de données non SQL de la MIAGE Paris 1 Panthéon Sorbonne.
Il s'agit d'un site d'e-commerce simplifié possédant les fonctionnalitées suivantes : 

* Inscription
* Connection
* Recherche d'articles
* Ajout d'article au Panier
* Modification du panier
* Passage de commandes
* Affichage des commandes


# Technologies

* [Redis](https://redis.io/download)

Pour la persistance des paniers clients sous forme d'objets temporaires stcokés pendant 5 minutes.

* [ElasticSearch](https://www.elastic.co/fr/downloads/elasticsearch)

Peristance des produits permettant de chercher ces derniers sur plusieurs de leurs champs avec une recherche syntaxique de proximité (fuzzyness).

* [MongoDB](https://docs.mongodb.com/manual/administration/install-community/)

Persistance des commandes et des informations de clients.

# Prérequis

* [PHP](https://www.php.net/downloads.php) 7.4 ou plus

* Extension [MongoDB PHP Driver](https://www.php.net/manual/fr/mongodb.installation.php) pour PHP 7.4 ou plus

* [Composer](https://getcomposer.org/download/)
   
## Bases de données locales

* Serveur local MongoDB en cours d'éxécution
* Serveur local ElasticSearch contenant des données produits en cours d'éxécution :
    * Index : product
    * Format :
        {
         "nom": "x",
         "type": "x",
         "prix": "x",
         "Marque": "x"
        }

* Serveur local Redis en cours d'éxécution

# Lancer le projet

1 - Se rendre vous dans le dossier ``` giantmix ```

2 - Ouvrir un terminal et installer les dépendances à l'aide de composer
```
composer update
composer install
```

3 - Lancer un serveur PHP built-in server en renseignant un port disponible (e.g. 8043)
```
php -S localhost:8043
```

4 - Ouvrir un navigateur web à l'adresse renseignée au lancement du serveur
