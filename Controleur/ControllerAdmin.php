<?php
//Controleur qui gère la vue admin
class ControllerAdmin 
{
  private $_article;
  private $_commentaire;
//déclarer des attributs
  public function __construct() {
//méthodes en général pas besoin d'être masquées à l'utilisateur -> public
    $this->_article = new ArticleManager();
    $this->_commentaire = new CommentaireManager();
  }

  // Affiche la liste de tous les billets du blog ainsi que la liste des commentaires signalés
  // Pas d'entrée. En sortie on génère la vue admin avec un tableau contenant les objets articles et un tableau contenant
  // les objets commentaires.
  public function admin() {
    $listebillet = $this->_article->getList();
    $listecoms = $this->_commentaire->getCommentaires_is_signal();
    $view = new View("Admin");
    $view->generer(array('listebillet' => $listebillet, 'listecoms' => $listecoms));
  }
}

//Une classe, c'est un ensemble de variables et de fonctions (attributs et méthodes).
//Un objet, c'est une instance de la classe pour pouvoir l'utiliser.
//Tous vos attributs doivent être privés. Pour les méthodes, peu importe leur visibilité. C'est ce qu'on appelle le principe d'encapsulation.
//On déclare une classe avec le mot-cléclasssuivi du nom de la classe, et enfin deux accolades ouvrantes et fermantes qui encercleront la liste des attributs et méthodes.