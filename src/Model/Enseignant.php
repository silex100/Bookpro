<?php

/**
 * @file
 *
 * @package \Bookpro\Model\Enseignant
 */

 namespace Bookpro\Model;

 use Bookpro\Model\User;
 
/**
 *  class Etudiant
 */
class Enseignant extends User
{

    /**
     * @var string| null, $_unite
     */
    protected $_unite;

    /**
     * Constructor
     */
    public function __construct(array $data){
         $this->hydrate($data);
         parent::__construct($data);
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
    * Return $_unite
    *
    * @return $_unite
    */
   public function getUnite(){
       return $this->_unite;
   }

    /**
     * Set the id of the User
     * @return  $unite
     */
    public function setUnite($unite){
        $this->_unite =  $unite;
    }

}
