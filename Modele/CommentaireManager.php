<?php

// DAO (data access object) commentaire
// Classe qui assure la relation avec la bdd à partir d'un POPO commentaire
// CRUD

require_once "Modele.php";
class CommentaireManager extends Modele
{

    // Ajoute en bdd les attributs de l'objet commentaire d'entrée
    public function add(Commentaire $commentaire)
    {
      // Préparation de la requête d'insertion.
      // Assignation des valeurs pour le commentaire.
      // Exécution de la requête.

      $q = $this->_db->prepare('INSERT INTO commentaires(auteur, contenu, id_article, is_signal, datePublication) VALUES (:auteur, :contenu, :id_article, :is_signal, NOW())');
      $q->bindParam(':auteur', $commentaire->auteur(), PDO::PARAM_STR);
      $q->bindParam(':contenu', $commentaire->contenu(), PDO::PARAM_STR);
      $q->bindParam(':id_article', $commentaire->id_article(), PDO::PARAM_INT);
      $q->bindParam(':is_signal', $commentaire->is_signal(), PDO::PARAM_INT);
      $q->execute();
    }

    // Supprime de la bdd la ligne dont l'id est le même que l'objet commentaire en entrée
    public function delete(Commentaire $commentaire)
    {
      $q = $this->_db->prepare('DELETE FROM commentaires WHERE id = :id');
      $q->bindValue(':id', $commentaire->id(), PDO::PARAM_INT);
      $q->execute();
    }

    // Récupère les données du commentaire dont l'id est entrée.
    // En sortie on récupère un popo commentaire
    public function get($idCommentaire)
    {
      if (is_int($idCommentaire))
      {
        $q = $this->_db->query('SELECT * FROM commentaires WHERE id = '.$idCommentaire);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        return new Commentaire($donnees);
      }
    }

    // Récupère un array composé d'objet commentaire dont l'attribut is_signal vaut true
    public function getCommentaires_is_signal()
    {
      $commentairesSignal = [];
      $q = $this->_db->prepare('SELECT * FROM commentaires WHERE is_signal=1 ORDER BY datePublication DESC');
      $q->execute();
      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
          $commentairesSignal[] = new Commentaire($donnees);
        }
      return $commentairesSignal;
    }

    // Update utilisé lors de la confirmation d'un commentaire en backoffice. is_signal passe à false
    public function updatesignal(Commentaire $commentaire)
    {
      $q = $this->_db->prepare('UPDATE commentaires SET is_signal = :is_signal WHERE id = :id');
  
      $q->bindValue(':is_signal', $commentaire->is_signal(), PDO::PARAM_INT);
      $q->bindValue(':id', $commentaire->id(), PDO::PARAM_INT);
      $q->execute();
    }
}