<?php

// DAO (data access object) article
// Classe qui assure la relation avec la bdd à partir d'un POPO article
// CRUD

require_once 'Modele.php';
class ArticleManager extends Modele
{

  // Ajoute les attributs d'un objet article en entrée à la bdd article
  public function add(Article $article)
  {
    // Préparation de la requête d'insertion.
    // Assignation des valeurs pour l'article.
    // Exécution de la requête.

    $q = $this->_db->prepare('INSERT INTO article(auteur, titre, contenu, dateCreation) VALUES(:auteur, :titre, :contenu, NOW())');
    $q->bindValue(':auteur', $article->auteur());
    $q->bindValue(':titre', $article->titre());
    $q->bindValue(':contenu', $article->contenu());
    $q->execute();
  }

  // Supprime de la bdd la ligne dont l'id est le même que l'objet article en entrée
  public function delete(Article $article)
  {
    $q = $this->_db->prepare('DELETE FROM article WHERE id = :id');
    $q->bindValue(':id', $article->id(), PDO::PARAM_INT);
    $q->execute();
  }

  // Récupère les données de l'article dont l'id est entrée.
  // En sortie on récupère un popo article ou si l'id est incorrecte on récupère null
  public function get($idArticle)
  {
    if (is_int($idArticle))
    {
      $q = $this->_db->query('SELECT * FROM article WHERE id = '.$idArticle);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      if ($donnees)
      {
        return new Article($donnees);
      }
      else
      {
        return null;
      }
    }
    else
    {
      return null;
    }
  }

  //Récupère un array d'objet commentaire correspondant à l'id article en entrée
  public function getCommentaires($idArticle)
  {
    $commentaires = [];
    if(is_int($idArticle))
    {
      $q = $this->_db->query('SELECT * FROM commentaires WHERE id_article='.$idArticle.' ORDER BY id_article ='.$idArticle.' DESC');
      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
          $commentaires[] = new Commentaire($donnees);
        }
      return $commentaires;
    }
  }

  //Récupère un array d'objet article
  public function getList()
  {
    echo('on charge la liste des articles (Modele/ArtcleManagerl:74) <br/> ');
    $articles = [];

    $q = $this->_db->prepare('SELECT * FROM article ORDER BY id DESC');
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
       echo ('pour chacuns des articles en base on instancie un nouvel objet Article<br/>');
      $articles[] = new Article($donnees);
    }
    return $articles;
  }

  // Update en bdd les entrées correspondantes à l'objet article d'entrée.
  public function update(Article $article)
  {
    $q = $this->_db->prepare('UPDATE article SET auteur = :auteur, titre = :titre, contenu = :contenu, dateModification = NOW() WHERE id = :id');
    $q->bindValue(':auteur', $article->auteur(), PDO::PARAM_STR);
    $q->bindValue(':titre', $article->titre(), PDO::PARAM_STR);
    $q->bindValue(':contenu', $article->contenu(), PDO::PARAM_STR);
    $q->bindValue(':id', $article->id(), PDO::PARAM_INT);
    $q->execute();
  }
}