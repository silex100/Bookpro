<?php

/**
 * @file
 *
 * @package \Bookpro\Manager\Manager
 */
 
 namespace Bookpro\Manager;

 use Bookpro\Storage\StorageDAO;
 use Bookpro\Model\Etudiant;

/**
 * Class abstract Manager
 *
 */
 class EtudiantManager extends Manager{

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
          return $this->storage->getAllEtudiant();
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
         $users =  $this->queryAssoc("select * from user" );
         foreach($users as $user){
            $users_tab[] = new User($user);
         }
         return $users_tab;
     }
 }