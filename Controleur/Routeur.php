<?php
// Routeur qui dirige les différentes requêtes aux controleurs correspondants
class Routeur
{
    private $ctrlAccueil;
    private $ctrlArticle;
    private $ctrlSignal;
    private $ctrlCommenter;
    private $ctrlConnexion;
    private $ctrlAdmin;
    private $ctrlIdentification;
    private $ctrlNouvelarticle;
    private $ctrlEditarticle;
    private $ctrlDeletearticle;
    private $ctrlDeletecom;
    private $ctrlOkcom;
    /*private $ctrlInscription;
    private $ctrlContact;*/

// Routage des requêtes à partir de la variable $_GET['action']
    public function routerRequete()
    {
        try {
            if (isset($_GET['action']))
            {
              switch ($_GET['action'])
              {
                case 'article' :
                    $this->ctrlArticle = new ControllerArticle;
                    $this->ctrlArticle->controlArticle();
                    break;
// Vérifie la valeur $getAction
                case 'connexion' :
                    $this->ctrlConnexion = new ControllerConnexion;
                    $this->ctrlConnexion->connexion();
                    break;
                  case 'deconnexion' :
                    $this->ctrlAccueil= new ControllerHome;
                    $this->ctrlAccueil->deconnexion();
                    break;
                case 'identification' :
                    $this->ctrlIdentification = new ControllerIdentification;
                    $this->ctrlIdentification->identification();
                    break;
                /*case 'inscription' :
                    $this->ctrlInscription->inscription();
                    break;
                case 'contact' :
                    $this->ctrlContact->contact();
                    break;*/
                case 'commenter' :
                    $this->ctrlCommenter = new ControllerCommentaire;
                    $this->ctrlCommenter->commenter();
                    break;
                case 'signaler' :
                    $this->ctrlSignal = new ControllerCommentaire;
                    $this->ctrlSignal->signal();
                    break;
                default :
                    $this->routerRequeteAdmin();
              }
            }
            else {
                echo('Controleur/Routeur l:63 > no action get from url -> go to index page<br/>');
                $this->ctrlAccueil = new ControllerAccueil;
                $this->ctrlAccueil->accueil();
            }
          }
          catch (Exception $e) {
              $msgErreur = $e->getMessage();
              require 'view/viewErreur.php';
          }
// catch affiche message erreur et renvoie à la uE VviewErreur
    }

// Routage des requêtes à partir de la variable $_GET['action'] avec un test des variables stockées en session pour permettre
// l'identification de l'admin.
// Exception: l'action n'est pas valide
    public function routerRequeteAdmin()
    {
        try{
            if (isset($_SESSION['nom']) AND isset($_SESSION['is_admin']))
//Isset détermine si une variable est définie et est différente de NULL.
            {
                if (isset($_GET['action']))
                {
                    switch ($_GET['action'])
//swith = série d'instructions if
                    {
                    case 'nouvelarticle' :
                        $this->ctrlNouvelarticle = new ControllerArticle;
                        $this->ctrlNouvelarticle->nouvelarticle();
                        break;
//L'instruction break permet de sortir d'une structure for, foreach, while, do-while ou switch
                    case 'editarticle' :
                        $this->ctrlEditarticle = new ControllerArticle;
                        $this->ctrlEditarticle->editarticle();
                        break;
                    case 'deletearticle' :
                        $this->ctrlDeletearticle = new ControllerArticle;
                        $this->ctrlDeletearticle->deletearticle();
                        break;
                    case 'deletecom' :
                        $this->ctrlDeletecom = new ControllerCommentaire;
                        $this->ctrlDeletecom->deletecom();
                        break;
                    case 'okcom' :
                        $this->ctrlOkcom = new ControllerCommentaire;
                        $this->ctrlOkcom->okcom();
                        break;
                    default :
                        $this->ctrlAccueil = new ControllerAccueil;
                        $this->ctrlAccueil->accueil();
                    }
                }
                else
                    throw new Exception("Action non valide");
            }
            else {
                $this->ctrlAccueil = new ControllerAccueil;
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $msgErreur = $e->getMessage();
            require 'view/viewErreur.php';
        }
    }
}