<?php

namespace Bookpro;

/**
 * @file 
 *
 * @package Bookpro\AccountInterface
 */

 use Bookpro\RoleInterface;

 /**
  * AccountInterface
  */
interface AccountInterface extends RoleInterface{
    /**
     * @method $array_loginIn
     *
     * @param $array
     */
    public static  function login($array = []);
    
    /**
     * @method logout()
     */
    public static function logout($action= []);

    /**
     * @method getRole();
     */
    public function getRole();

    /**
     * @method getLastAccess();
     */
    public function getLastAccess();

    /**
     * @method getUserLogin()
     */
    public function getLogin();

    /**
     * @method getEmail()
     */
    public function getEmail();

    /**
     * Return all user
     */
    public function getAllUser();

    /**
     * Return boolean 
     * @return TRUE;
     */
    public function hasAdmin();

    /**
     * Return boolean 
     * @return TRUE;
     */
    public function hasEtudiant();

    /**
     * Return boolean 
     * @return TRUE;
     */
    public function hasEnseignant();

    /**
     * Display User Role
     * @param int| not null
     * 
     * @return use role
     */
    public function displayUserRole($role);

    /**
     * Proctege Page Admin
     */
    public function protectAdmin();

    /**
     * Proctege page Enseignant
     */
     public function protectEnseignant();

    /**
     * Proctege page Etudiant
     */
     public function protectEtudiant();

    /**
     * Public getNomComplet()
     */
    public function getNomComplet();

    /**
     *  Enregistre new user
     */
    public function enregistre($array = []);
}