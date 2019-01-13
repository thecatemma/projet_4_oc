<?php
// Classe autoload qui va chercher dans les différents dossiers les classes à instancier et les met dans la pile autoload
class MyAutoload {
    public static function autoload() {
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