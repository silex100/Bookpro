<?php

/**
 * @file
 *
 * @package \Bookpro\Model\User
 */
 
 namespace Bookpro\Model;

/**
 * Class abstract User
 *
 */
 abstract class User 
 {
      /**
       * @var int | null , id of the User
       */
      protected $_id ;

      /**
       * @var string| null, login of the User
       */
      protected $_login;

      /**
       * @var string| null, password of the User
       */
      protected $_password;

      /** 
       * @var string | null , role of the User
       */
      protected $_role;

      /** 
       * @var string | null , email of the User
       */
      protected $_email;

      /**
       * @var string| null , $_nom of the Etudiant
       */
      protected $_nom ;

     /**
      * @var string| null, $_prenom of the etudiant
      */
     protected $_prenom;

     /**
      * @var date| null, $_datebirth of the etudiant
      */
      protected $_datebirth;

     /**
      * @var year| null, $_$annees of the etudiant
      */
     protected $_annees;

     /**
      * @var string| null, $_adresse of the etudiant
      */
     protected $_adresse;
    
     /**
      * @var string| null, $_ville of the etudiant
      */
     protected $_ville;

     /**
      * @var  integer| null, $_cp of the etudiant
      */
     protected $_cp;

      /**
       * Constructor
       */
      public function  __construct(array $data){
         $this->hydrate($data);
      }

      /**
       * Hydrate 
       */
      private function hydrate(array $data){
          foreach($data as $key=> $value){
              $method ='set'.ucfirst($key);
              if(method_exists($this,$method)){
				 $this->$method($value);
    		  }
          }
      }

      /**
       * Return  the Id of User
       * @return $_id
       */
      public function getId(){
         return $this->_id;
      }
      
      /**
       * Set the id of the User
       *@param$id
       */
       public function setId($id){
          $this->_id = (int) $id;
       }

      /**
       * Return the login of the User
       * @return $_login
       */
      public function getLogin(){
          return($this->_login);
      }


      /**
       * Set the login of the User
       * @param $login
       */
      public function setLogin($login){
         $this->_login = isset($login)? $login : null;
      }

      /**
       * Return the password of the User
       * @return $_password
       */
      public function getPassword(){
          return $this->_password;
      }
      
      /**
       * Set the password of the User
       * @param $password
       */
      public function setPassword($password){
          $this->_password = isset($password)? $password : null;
      }

      /**
       * Return the role of the User
       * @return $_role
       */
      public function getRole(){
          return  $this->_role;
      }

      /**
       * Set the role of the User
       * @param $_role
       */
      public function setRole($role){
         $this->_role = isset($role)? $role : null;
      }

      /**
       * Return the role of the User
       * @return $_role
       */
      public function getEmail(){
          return $this->_email;
      }

      /**
       * Set the role of the User
       * @param $_role
       */
      public function setEmail($email){
         $this->_email=isset($email)?$email : null;
      }

      /**
     * Return  the nom of etudiant
     * @return $_nom
     */
    public function getNom(){
         return $this->_nom;
    }

    /**
     * Return  the prenom of etudiant
     * @return $_prenom
     */
    public function getPrenom(){
         return $this->_prenom;
    }

    /**
     * Return  the datebirth of etudiant
     * @return $_datebirth
     */
    public function getDateBirth(){
         return $this->_datebirth;
    }

    /**
     * Return  the annees
     * @return $_annees
     */
    public function getAnnees(){
         return $this->_annees;
    }

    /**
     * Return  the adresse
     * @return $_adresse
     */
    public function getAdresse(){
         return $this->_adresse;
    }

    /**
     * Return  the ville
     * @return $_ville
     */
    public function getVille(){
         return $this->_ville;
    }

    /**
     * Return  the cp
     * @return $_cp
     */
    public function getCp(){
         return $this->_cp;
    }

    /**
     * Set the login of the Etudiant
     * @param $nom
     */
    public function setNom($nom){
         $this->_nom = isset($nom)? $nom : null;
    }

    /**
     * Set the prenom of the Etudiant
     * @param $prenom
     */
    public function setPrenom($prenom){
         $this->_prenom = isset($prenom)? $prenom : null;
    }

    /**
     * Set the Datebirth of the Etudiant
     * @param $datebirth
     */
    public function setDatebirth($datebirth){
         $this->_datebirth = isset($datebirth)? $datebirth : null;
    }

    /**
     * Set the annees of the User
     * @param $annees
     */
    public function setAnnees($annees){
         $this->_annees = isset($annees)? $annees : null;
    }

    /**
     * Set the adresse of the user
     * @param $adresse
     */
    public function setAdresse($adresse){
         $this->_adresse = isset($adresse)? $adresse : null;
    }

    /**
     * Set the  ville of the Etudiant
     * @param $ville
     */
    public function setVille($ville){
         $this->_ville = isset($ville)? $ville : null;
    }

    /**
     * Set the  ville of the Etudiant
     * @param $codepostal
     */
    public function setCp($codepostal){
         $this->_cp = isset($codepostal)? $codepostal : null;
    }
 }