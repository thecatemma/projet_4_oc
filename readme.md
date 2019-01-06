OBJET :
Cette application est un blog simple avec un front qui permet la lecture d'article et la possibilité de commenter les articles
ainsi que le signalement de commentaires.
Elle dispose d'un back-office qui permet l'administration des articles (CRUD) et la modération des commentaires signalés.
Ce fichier index configure l'application en déclarant l'autoload des  classes utilisées dans ce projet. On démarre la session.
On instancie la classe Routeur qui va permettre de router les requêtes reçues.

INSTALLATION :
créer la DB et intégrer la structure renseignée dans SQL/DB.sql
+optionnel : intégrer contenus de tests si besoin : SQL/content.sql
renseigner les informations d econnection à la DB dans Modele/Modele.php

REQUIEREMENTS :
PHP 7.1

UTILISATION :
require 'config.php';
MyAutoload::autoload();
session_start();

$routeur = new Routeur;
$routeur->routerRequete();

