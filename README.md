# Qu'est-ce que le projet Caviste?

_Caviste_ est le nom du présent dépôt. Il s'agit aussi du nom de code du projet. Toutefois le **projet Caviste** consiste en la réalisation de trois applications: _MonCellier_, _Caviste Catalogue_ et _Caviste Webservice_. Le présent dépôt ne concerne que la partie de développement des applications _Caviste Catalogue_ et _Caviste Webservice_.

# Qu'est-ce que _Caviste Webservice_?

_Caviste Webservice_ est une API RESTFul d'un service Web (implémenté côté serveur en PHP/MySQL) qui distribue et donne accès aux données d'un catalogue de bouteilles de vin. Toute application cliente pourra:

* consulter la liste des vins (lister),
* afficher le détail de chaque bouteille de vins (sélectionner),
* modifier les données d'une bouteille de vins (mettre à jour),
* supprimer une bouteille de vin (supprimer),
* ajouter une bouteille de vin au catalogue (insérer).

Tous ces services seront disponibles sans nécéssité d'_authentification_ ni d'_autorisation_.

# Qu'est-ce que _Caviste Catalogue_?

_Caviste Catalogue_ est une application Web qui permet de consulter une base de données de bouteilles de vins sous la forme d'une page Web de type Catalogue. _Caviste Catalogue_ comporte une partie de développement côté serveur (PHP/MySQL), ainsi qu'une partie de développement côté client (HTML5/CSS3/JS). Tout internaute, sans nécéssité de connexion, pourra:

* consulter la liste des vins (lister),
* trier la liste des vins (sort),
* filtrer la liste des vins (filter),
* paginer la liste des vins (paginate),
* afficher le détail de chaque bouteille de vins (sélectionner).

# Technologies utilisées

La réalisation des applications _Caviste Webservice_ et _Caviste Catalogue_ nécessitent l'exploitation des langages, outils et technologies suivantes:

* _Caviste Webservice_
  * Slim framework (framework PHP)
  * Twig (moteur de template) - _facultatif_
  * RedBeanPHP (ORM – mapping objet-relationnel) - _alternative: PDO_

* _Caviste Catalogue_
  * Slim framework (framework PHP)
  * Twig (moteur de template)
  * RedBeanPHP (ORM – mapping objet-relationnel)
  * Zurb Foundation (framework HTML, CSS, JS)
  * jQuery et jQueryUI (librairies JS)
  * Slim-Twig-Flash (extension Twig / middleware Slim)
  * Slim-Csrf (middleware Slim)

* Git & GitHub (système de contrôle de versions & solution d’hébergement)
* Trello (gestionnaire de projet)

___
# Projet caviste - partie backend

## Arborescence
* Fichier de route: src/routes.php
* Dossier de controller: src/Controller
* Dossier de vue: src/views
* Dossier du modèle: src/Models

##A l'importation du projet

* composer dump-autoload
* Redémarer serveur
* Vider le cache du browser
* Si ça ne marche toujours pas composer update

## Objectifs

### Fonctionnalités du Webservice JSON

* GET /api/wines Retrouve tous les vins de la base de données
* GET /api/wines/search/Chateau Recherche les vins dont le nom contient ‘Chateau’
* GET /api/wines/10 Retrouve le vin dont l'id == 10
* POST /api/wines Ajoute un vin dans la base de données
* PUT /api/wines/10 Modifie les données du vin dont l'id == 10
* DELETE /api/wines/10 Supprime le vin dont l'id == 10

### Présentation du Catalogue

Interface montrant tous les vins de la base de donnée avec son type (Bordeaux, Bourgogne,...), son label (Château Arnes), son prix et une description.
