<?php
//Controleur qui gère la vue accueil
class ControleurAccueil {

  private $_article;

  public function __construct() {
    $this->_article = new ArticleManager();
  }

  // Reset des variables stockées en session et appel de la fonction accueil().
  // Pas d'entrée. En sortie, on génère la vue accueil.
  public function deconnexion() {
    $_SESSION = array();
    $this->accueil();
  }

  // Affiche la liste de tous les billets du blog.
  // Pas d'entrée. En sortie, on génère la vue accueil avec un tableau $billets contenant les objets articles.
  public function accueil() {
    echo('controller Accueil loading <br/>');
    $billets = $this->_article->getList();
    echo('controller Accueil loading 1 <br/>');
    $vue = new Vue("Accueil");
    echo('controller Accueil loading 2 <br/>');
    $vue->generer(array('billets' => $billets));
    echo('controller Accueil loading 3 <br/>');
  }


}