# Projet caviste - partie backend (version redbean)

Redbean a été installé à l'aide composer. Version "single file de redbean"
Téléchargé à partir de ce compte Github https://github.com/yeriomin/redbean-single-file

Seul le fichier WinesModel a été modifié par rapport à la version PDO


* Fichier de route: src/routes.php
* Dossier de controller: src/Controller
* Dossier de vue: src/views

##A l'importation du projet

* composer dump-autoload
* Redémarer serveur
* Vider le cache du browser

## Objectifs

### Fonctionnalités affichant du JSON

* GET /api/wines Retrouve tous les vins de la base de données
* GET /api/wines/search/Chateau Recherche les vins dont le nom contient ‘Chateau’
* GET /api/wines/10 Retrouve le vin dont l'id == 10
* POST /api/wines Ajoute un vin dans la base de données
* PUT /api/wines/10 Modifie les données du vin dont l'id == 10
* DELETE /api/wines/10 Supprime le vin dont l'id == 10

### Présentation de backend

Interface montrant tous les vins de la base de donnée avec son type (Bordeaux, Bourgogne,...), son label (Château Arnes), son prix et une description.