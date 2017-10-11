<?php

namespace Bookpro\Model;

/**
 * @file
 *
 * @package \Bookpro\Model\Projet
 */


 abstract class Projet 
{
     /**
      * @var int | null , id of the projet
      */
    protected $_id ;

     /**
      * @var String | null , titre of the projet
      */
    protected $_titre ;

    /**
      * @var String | null , description of the projet
      */
    protected $_description ;

    /**
      * @var date | null , datecreated of the projet
      */
    protected $_datecreated;

     /**
      * @var date | null ,datevalided of the projet
      */
    protected $_datevalided;

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
     * @param$id
     */
    public function setId($id){
        $this->_id = (int) $id;
    }

    /**
     * Return the titre of the Projet
     * @return $_titre
     */
    public function getTitre(){
        return($this->_titre);
    }


    /**
     * Set the titre of the projet
     * @param $titre
     */
    public function setTitre($titre){
        $this->_titre = isset($titre)? $titre : null;
    }


    /**
     * Return the description of the Projet
     * @return $_description
     */
    public function getDescription(){
        return($this->_description);
    }

     /**
     * Set the description of the projet
     * @param $description
     */
    public function seDescription($description){
        $this->_description = isset($description)? $description : null;
    }
    
}
