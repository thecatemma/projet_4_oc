<?php

//View: affiche les informations dans une page html
//cette class permet de créer un objet, qui contient des variables
//l'accès aux éléments privés est uniquement réservé à la classe qui les a défini
//http://php.net/manual/fr/language.oop5.visibility.php?fbclid=IwAR3NbLa_Ae4ATjD662LsR1ueJkHKMMFgLxj0HXz1F4rJVpOKsK90n8jpnsQ
// une class sert à construire un objet

class View {
// Nom du fichier associé à la vue
  private $fichier; 
// Titre de la vue (défini dans le fichier vue)
  private $titre;

  public function __construct($action) {
//Les 2 tirets se mettent toujours devant le constructeur
//Class appelée quand on appelle l'objet, qu'est-ce que ça fait ?
//Le constructeur méthode par défaut quand la class et appelée
//Détermination du nom du fichier vue à partir de l'action
    $this->fichier = "view/view" . $action . ".php";
//ça instancie, la prend la ce fichier est égal à view view.php
  }
//Génère et affiche la vue
  public function generer($donnees) {
//Génération de la partie spécifique de la vue
    $contenu = $this->genererFichier($this->fichier, $donnees);
//Génération du gabarit commun utilisant la partie spécifique
    $view = $this->genererFichier('view/template.php',
      array('titre' => $this->titre, 'contenu' => $contenu));
//Renvoi de la view au navigateur
    echo $view;
  }
//Génère un fichier vue et renvoie le résultat produit
  private function genererFichier($fichier, $donnees) {
    if (file_exists($fichier) AND $donnees) {
//Rend les éléments du tableau $donnees accessibles dans la vue
      extract($donnees);
//Démarrage de la temporisation de sortie
      ob_start();
//Inclut le fichier vue
//Son résultat est placé dans le tampon de sortie
      require $fichier;
//Arrêt de la temporisation et renvoi du tampon de sortie
      return ob_get_clean();
    }
    else if (file_exists($fichier) AND !($donnees)) {
// Démarrage de la temporisation de sortie
      ob_start();
// Inclut le fichier vue
// Son résultat est placé dans le tampon de sortie
      require $fichier;
// Arrêt de la temporisation et renvoi du tampon de sortie
      return ob_get_clean();
    }
    else {
      throw new Exception("Fichier '$fichier' introuvable");
//à chercher
    }
  }
}