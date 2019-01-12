<?php

// DAO (data access object) utilisateur
// Classe qui assure la relation avec la bdd à partir d'un POPO utilisateur
// CRUD

require_once 'Modele.php';
class UtilisateurManager extends Modele
{
  //Fonction en construction pour l'implémentation d'un module d'inscription d'utilisateur et d'ajout en bdd
  /*public function add(Utilisateur $utilisateur)
  {
    // Préparation de la requête d'insertion.
    // Assignation des valeurs pour le nom de l'utilisateur.
    // Exécution de la requête.

    $q = $this->_db->prepare('INSERT INTO utilisateur(nom, mot_de_passe, is_admin) VALUES(:nom, :mot_de_passe, :is_admin)');
    $q->bindValue(':nom', $utilisateur->nom());
    $q->bindValue(':mot_de_passe', $utilisateur->mot_de_passe());
    $q->bindValue(':is_admin', $utilisateur->is_admin());
    $q->execute();
  }*/


  //Récupère la ligne de la bdd utilisateur et on instancie un objet ou renvoi null
  public function get($utilisateur)
  {
    if (is_string($utilisateur))
    {
      $query= $this->_db->prepare('SELECT * FROM utilisateur WHERE nom = :nom');
      $query->bindValue(':nom',$utilisateur, PDO::PARAM_STR);
      $query->execute();
      $donnees=$query->fetch();
      if ($donnees)
      {
        return new Utilisateur($donnees);
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

}