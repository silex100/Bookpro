<?php

 namespace Bookpro\Model;

/**
 * @file
 *
 * @package \Bookpro\Model\Groupe;
 */

 use Bookpro\Model\Projet;

class Groupe extends Projet 
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
