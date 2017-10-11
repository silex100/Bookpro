<?php

/**
 * @file
 *
 * @package \Bookpro\Manager\Manager
 */
 
 namespace Bookpro\Manager;

 use \Bookpro\Storage\StorageDAO;

/**
 * Class abstract Manager
 *
 */
 abstract class Manager{

     /**
      * @var $storage; Should allow connection Mysql, same for all subclasses
      */
      protected  $storage;


     /**
      * Constructor of Manager
      * 
      * @param \Bookpro\Storage\StorageDAO
      */
     public function __construct(StorageDAO $storage){
         $this->storage = $storage;
     }
     
     /**
      * Return array 
      *
      * @return $array 
      */
     public abstract function  findAll();

     /**
      * Return the object by id
      * @param int|not null , $id
      *
      * @return  $one object by $id
      */
    public abstract function find($id);

    /**
     * Create the object 
     * @param Object 
     */
    public abstract function createObject($object);

    /**
     * Update the object 
     * @param Object 
     */
    public abstract function UpdateObject($object);

    /**
     * Delete the object  by id
     * @param int| not null, $id 
     */
    public abstract function DeleteObject($id);

    /**
     * Get Role 
     * @param $object
     *
     * @return $role of the user current
     */
    public abstract function role($object);

    /**
     * Return all object user 
     */
    public abstract function  getAllUsers();
 }