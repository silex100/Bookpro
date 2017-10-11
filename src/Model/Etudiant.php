<?php

/**
 * @file
 *
 * @package \Bookpro\Model\Etudiant
 */

 namespace Bookpro\Model;

 use Bookpro\Model\User;
 
/**
 *  class Etudiant
 */
class Etudiant extends User 
{
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
}
