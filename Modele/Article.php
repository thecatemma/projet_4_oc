<?php

// POPO article qui stockera les données relatives à un article
//Les objets de ce projet sont les classes: articles, commentaires, utilisateur
// Il se compose de getters (accesseurs) qui permettront l'accès aux attributs et de setters (mutateurs) qui permettront
// de changer les valeurs des attributs.
// L'hydratation de l'objet se fera via un array avec les données correspondantes aux attributs.

class Article
{
    protected $_id;
    protected $_titre;
    protected $_auteur;
    protected $_contenu;
    protected $_dateCreation;
    protected $_dateModification;
    protected $_commentaires;

    public function __construct(array $donnees)
    {
        echo ('je suis le nouvel objet Article crée (Modele/Article:l:20)<br/>');
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
      //echo('hydratation des données l:27 <br/>');
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

    public function titre()
    {
        return $this->_titre;
    }

    public function auteur()
    {
        return $this->_auteur;
    }

    public function contenu()
    {
        return $this->_contenu;
    }

    public function dateCreation()
    {
        return $this->_dateCreation;
    }

    public function dateModification()
    {
        return $this->_dateModification;
    }

    public function commentaires()
    {
        return $this->_commentaires;
    }

    public function setId($id)   {
     
	  //Setter --> injecte valeur dans BDD
	  // Conversion de l'argument en nombre entier.
      // Si c'en était déjà un, rien ne changera.
      // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
      $id = (int) $id;

      // On vérifie ensuite si ce nombre est bien strictement positif.
      if ($id > 0)
      {
        // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
        $this->_id = $id;
      }
    }

    public function setTitre($titre)
    {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
      if (is_string($titre))
      {
        $this->_titre = $titre;
      }
    }

    public function setAuteur($auteur)
    {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
      if (is_string($auteur))
      {
        $this->_auteur = $auteur;
      }
    }

    public function setContenu($contenu)
    {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
      if (is_string($contenu))
      {
        $this->_contenu = $contenu;
      }
    }

    public function setDateCreation($dateCreation)
    {
        if (is_string($dateCreation))
        {
            $this->_dateCreation = $dateCreation;
        }
    }

    public function setDateModification($dateModification)
    {
        if (is_string($dateModification))
        {
            $this->_dateModification = $dateModification;
        }
    }

    //public function setCommentaires(array $commentaires)
    public function setCommentaires($commentaires)
    {
        $this->_commentaires = $commentaires;
    }
}