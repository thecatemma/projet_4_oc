<?php

// POPO commentaires qui stockera les données relatives à un commentaire
// Il se compose de getters (accesseurs) qui permettront l'accès aux attributs et de setters (mutateurs) qui permettront
// de changer les valeurs des attributs.
// L'hydratation de l'objet se fera via un array avec les données correspondantes aux attributs.

class Commentaire
{
    protected $_id;
    protected $_auteur;
    protected $_contenu;
    protected $_datePublication;
    protected $_id_article;
    protected $_is_signal;

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

    public function auteur()
    {
        return $this->_auteur;
    }

    public function contenu()
    {
        return $this->_contenu;
    }

    public function datePublication()
    {
        return $this->_datePublication;
    }

    public function id_article()
    {
        return $this->_id_article;
    }

    public function is_signal()
    {
        return $this->_is_signal;
    }

    public function setId($id)
    {
      // On convertit l'argument en nombre entier.
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

    public function setDatePublication($datePublication)
    {
        if (is_string($datePublication))
        {
            $this->_datePublication = $datePublication;
        }
    }

    public function setId_article($id_article)
    {
        $id_article = (int) $id_article;
        
        // On vérifie ensuite si ce nombre est bien strictement positif.
        if ($id_article > 0)
        {
          // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
          $this->_id_article = $id_article;
        }
    }

    public function setIs_signal($is_signal)
    {
        $is_signal = (int) $is_signal;
        $this->_is_signal = $is_signal;
    }
}