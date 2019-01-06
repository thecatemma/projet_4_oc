<?php

// POPO utilisateur qui stockera les données relatives à un utilisateur
// Il se compose de getters (accesseurs) qui permettront l'accès aux attributs et de setters (mutateurs) qui permettront
// de changer les valeurs des attributs.
// L'hydratation de l'objet se fera via un array avec les données correspondantes aux attributs.

class Utilisateur
{
    protected $_id;
    protected $_nom;
    protected $_mot_de_passe;
    protected $_is_admin;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }
    
    public function hydrate(array $donnees)
    {
      foreach ($donnees as $key => $value)
      {
        $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
      }
    }

    public function id()
    {
        return $this->_id;
    }

    public function nom()
    {
        return $this->_nom;
    }

    public function mot_de_passe()
    {
        return $this->_mot_de_passe;
    }

    public function is_admin()
    {
      return $this->_is_admin;
    }

    public function setId($id)
    {
      // On convertit l'argument en nombre entier.

      $id = (int) $id;
      
      // On vérifie ensuite si ce nombre est bien strictement positif.
      if ($id > 0)
      {
        $this->_id = $id;
      }
    }
    
    public function setNom($nom)
    {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
      if (is_string($nom))
      {
        $this->_nom = $nom;
      }
    }

    public function setMot_de_passe($mot_de_passe)
    {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
      if (is_string($mot_de_passe))
      {
        $this->_mot_de_passe = $mot_de_passe;
      }
    }

    public function setIs_admin($is_admin)
    {
      $is_admin = (int) $is_admin;
      
      // On vérifie ensuite si ce nombre est bien strictement positif.
      if ($is_admin > 0)
      {
        // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
        $this->_is_admin = $is_admin;
      }
    }
}