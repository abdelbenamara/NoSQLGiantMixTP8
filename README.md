# Context

Ce repository contient les livrable du projet NoSQLGiantMix (TP8), projet final du cours de bases de données non SQL de la MIAGE Paris 1 Panthéon Sorbonne.
Il s'agit d'un site de e-commerce simplifié possédant les fonctionnalitées suivantes : 

* Inscription
* Connection
* Recherche d'articles
* Ajout d'article au Panier
* Modification du panier
* Passage de commandes
* Affichage des commandes


# Technologies

* Redis

Pour la persistance des paniers clients, objets temporaires stcokés pendant 5 minutes

* ElasticSearch

Peristance des produits. Permet de chercher les produits sur plusieurs de ses champs avec une recherche syntaxique de proximité (fuzzyness)

* MongoDB

Persistance des commandes et des données clients.

* PHP

# Prérequis

* PHP 7.4 ou plus
* Plugin MongoDB pour php 7.4 ou plus
   
# Base de données locales

* Serveur local MongoDB en cours d'éxécution
* Serveur local ElasticSearch contenant des données produits en cours d'éxécution :
    * Index : Product
    * Format :
        {
         "nom": "x",
         "type": "x",
         "prix": "x",
         "Marque": "x"
        }

* Serveur local Redis en cours d'éxécution

# Lancer le projet

1 - Cloner le repository sur votre poste

2 - Installer les dépendances
```bash
composer update
composer install
```
4 - Lancer un serveur php 7.4+

3 - ouvrir ../giantmix/index.php
