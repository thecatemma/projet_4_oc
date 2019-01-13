<?php
// Controleur qui gère les actions relatives aux articles
class ControleurArticle
{
    protected $_article;

    public function __construct() {
        echo('ok');
        $this->_article = new ArticleManager;
    }

    // Affiche les détails d'un article. On récupère en entrée l'id de l'article dont on veut le détail.
    // En sortie on affiche, les détails de l'article ainsi que ses commentaires avec deux tableaux contenant les objs articles et
    // commentaires.
    // Deux exceptions, un id non défini ou un id non valide.
    public function controlArticle() {
    if (isset($_GET['id']))
    {
      $idArticle = intval($_GET['id']);
      $billet = $this->_article->get($idArticle);
      if (!(is_null($billet)))
      {
          $commentaires = $this->_article->getCommentaires($idArticle);
          $view = new View("Article");
          $view->generer(array('billet' => $billet, 'commentaires' => $commentaires));
      }
      else
        throw new Exception("Identifiant de billet non valide");
    }
    else
      throw new Exception("Identifiant de billet non défini");
    }

    // Ajoute un nouvel article en bdd à partir d'un objet article créé avec les entrées du formulaire en backoffice.
    // Si le formulaire est vide, on le réaffiche.
    // En sortie on ajoute à la bdd article le nouvel article puis on affiche la vue admin.
    // Une exception concernant le contenu incorrect.
    public function nouvelarticle() {
        if (!empty($_POST['titre']) OR !empty($_POST['contenu']))
        {
           if (isset($_POST['titre']) AND isset($_POST['contenu']))
           {
                $titre = htmlspecialchars($_POST['titre']);
                $contenu = $_POST['contenu'];
                $donnees = array(
                    "auteur" => $_SESSION['nom'],
                    "titre" => $titre,
                    "contenu" => $contenu
                );
                $nouvelarticle = new Article($donnees);
                $this->_article->add($nouvelarticle);
                $view = new ControleurAdmin;
                $view->admin();
           }
           else
            throw new Exception("Titre ou contenu incorrect");
        }
        else
        {
            $view = new View("Nouvelarticle");
            $view->generer($test);
        }
    }

    // Supprime un article de la bdd à partir d'un objet article créé avec son id et sa date de création.
    // On compare les données reçues aux données en bdd pour s'assurer que l'article est le bon.
    // En sortie on supprime l'article en bdd puis on affiche la vue admin.
    // Trois exceptions. L'id et la date de création reçues ne correspondent pas en bdd, l'article n'est pas à supprimer,
    // l'article n'existe pas ou son identifiant est incorrect.
    public function deletearticle() {
            if (isset($_GET['id']))
            {
                $idArticle = intval($_GET['id']);
                $dateCreation = $_GET['dateCreation'];
                $articleasupprimer = $this->_article->get($idArticle);
                if (!(is_null($articleasupprimer)))
                {
                    if ($dateCreation == $articleasupprimer->dateCreation())
                    {
                        $this->_article->delete($articleasupprimer);
                        $view = new ControleurAdmin;
                        $view->admin();
                    }
                    else
                        throw new Exception("Cet article n'est pas à supprimer");
                }
                else
                    throw new Exception("Cet article n'existe pas");
            }
            else
                throw new Exception("Identifiant de l'article non défini");

    }

    // Edite un article de la bdd à partir d'un objet article créé avec son id et sa date de création.
    // On remplit les champs titre et contenu du formulaire (récupérés en bdd) à partir de l'id et la date de création de l'article
    // On affiche récupère les données en $_POST puis on update la bdd.
    // Une exception est lancée si l'id de l'article n'est pas valide.
    public function editarticle() {
        if ((isset($_GET['id'])) AND (isset($_GET['dateCreation'])))
        {
            $idArticle = intval($_GET['id']);
            $dateCreation = $_GET['dateCreation'];
            $article= $this->_article->get($idArticle);
            $view = new View("Editarticle");
            $view->generer(array('article' => $article));
        }
        else if (!empty($_POST['titre']) AND !empty($_POST['contenu']) AND isset($_POST['id']))
        {
            $id = intval($_POST['id']);
            $titre = htmlspecialchars($_POST['titre']);
            $contenu = ($_POST['contenu']);
            $donnees = array(
                'id' => $id,
                'titre' => $titre,
                'contenu' => $contenu,
                'auteur' => "admin"
            );
            $articleupdate = new Article($donnees);
            $this->_article->update($articleupdate);
            $view = new ControleurAdmin;
            $view->admin();
        }
        else
            throw new Exception("Identifiant article invalide");
    }

}