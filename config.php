<?php
// Classe autoload qui va chercher dans les différents dossiers les classes à instancier et les met dans la pile autoload
class MyAutoload {
    public static function autoload() {
//méthodes: pas besoin d'être masquées à l'utilisateur
        function chargerClasse($classe)
        {
            if (file_exists('Modele/'.$classe.'.php')) {
                require 'Modele/'.$classe . '.php'; // On inclut la classe correspondante au paramètre passé.
            }
            else if (file_exists('Controleur/'.$classe.'.php')) {
                require 'Controleur/'.$classe . '.php';
            }
            else if (file_exists('view/'.$classe.'.php')) {
                require 'view/'.$classe . '.php';
            }
        }
        
        spl_autoload_register('chargerClasse');
    }
}

//Pour rappel, un getter est une méthode chargée de renvoyer la valeur d'un attribut, tandis qu'un setter est une méthode chargée d'assigner une valeur à un attribut en vérifiant son intégrité (si vous assignez la valeur sans aucun contrôle, vous perdez tout l'intérêt qu'apporte le principe d'encapsulation).
//Pour construire nos setters, il faut donc nous pencher sur les valeurs possibles de chaque attribut :
//les valeurs possibles de l'identifiant sont tous les nombres entiers strictement positifs ;
//les valeurs possibles pour le nom du personnage sont toutes les chaînes de caractères ;
//les valeurs possibles pour la force du personnage sont tous les nombres entiers allant de 1 à 100 ;
//les valeurs possibles pour les dégâts du personnage sont tous les nombres entiers allant de 0 à 100 ;
//les valeurs possibles pour le niveau du personnage sont tous les nombres entiers allant de 1 à 100 ;
//les valeurs possibles pour l'expérience du personnage sont tous les nombres entiers allant de 1 à 100.

//14/04/2019
//Lecture cours PDO + appronfondissement des getters et des setters et hydratation + objets pour appeler BDD + objets managers sachant que les managers peuvent aller dans des fichiers xml ou autre

//+notions d'héritage: lorsqu'une classe B hérite de la classe A
//Héritage: c'est-à-dire faire en sorte qu'une classe hérite des attributs et méthodes d'une autre classe, avec le mot-clé extends.

//Partie redéfinir les méthodes

//16/04 Introduction à la résolution statique <:::

//Méthodes abstraites

//Essayer de comprendre les statiques

//poursuite du cours "concevez votre site avec PHP et MySQL"

//chapitre héritage terminé à relire

//les méthodes magiques

//a méthode__constructest magique !