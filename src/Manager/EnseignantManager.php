<?php

/**
 * @file
 *
 * @package \Bookpro\Manager\EnseignantManager
 */
 
 namespace Bookpro\Manager;

 use Bookpro\Manager\Manager;
 use Bookpro\Storage\StorageDAO;
 use Bookpro\Model\Enseignant;

/**
 * Class abstract Manager
 *
 */
 class EnseignantManager extends Manager{

     /**
      * Constructor of Manager
      * 
      * @param \Bookpro\Storage\StorageDAO
      */
     public function __construct(StorageDAO $storage){
         parent::__construct($storage);
     }

     /**
      * Return array 
      *
      * @return $array 
      */
     public function  findAll(){
         return $this->storage->getAllEnseignant();
     }

     /**
      * Return the object by id
      * @param int|not null , $id
      *
      * @return  $one object by $id
      */
    public  function find($id){
    }

    /**
     * Create the object 
     * @param Object 
     */
    public  function createObject($object){
    }

    /**
     * Update the object 
     * @param Object 
     */
    public function UpdateObject($object){

    }

    /**
     * Delete the object  by id
     * @param int| not null, $id 
     */
    public  function DeleteObject($id){
    }

    /**
     * Get Role 
     * @param $object
     *
     * @return $role of the user current
     */
    public  function role($object){
        return $this->storage->getRole($object);
    }

     /**
      * Return all object user 
      */
     public function  getAllUsers(){
         $users_tab = [];
         $users = $this->storage->getAllUser();
         foreach($users as $user){
            $users_tab[] = $user;
         }
         return $users_tab;
     }
    
 }