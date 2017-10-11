<?php

namespace Bookpro\Service;

/**
 * @file
 *
 * @package \Bookpro\Service\Account
 *
 */

use Bookpro\AccountInterface;
use Bookpro\Service\Session;
use Bookpro\UserInterface;
use Bookpro\Database\Connection;
use Bookpro\Manager\UserManager;

use Bookpro\Service\Validator;
use Bookpro\Service\Authentification;
use Bookpro\BuildFactory;

/**
 *  Class Account
 */
class Account implements AccountInterface
{
    /**
     * @method login
     *
     * @param $array
     */
    public static function login($array= []){
        if(is_array($array)){
            if(!empty($array)){
                if(isset($array['bookpro_login_in'])){
                    $validator = new Validator($array);
                    if(is_object($validator)){
                         $auto  = new Authentification();
                         $auto->authentificat($validator->ObjectUseConnect());
                    }
                }
            }
        }
    }

    /**
     * Allow the log out in compte
     */
    public  static function logout($action= []){
        $action  = !empty($action['action'])? $action['action'] : null;
        if($action == "logout"){
             Session::remove('user');
             header('Location: http://'.$_SERVER['HTTP_HOST'].'/bookpro');
            exit();
         }
    }

    /**
     * Allow to get a role of user
     * @return role
     */
    public function getRole(){
        $user = $this->getUser();
        if(is_object($user)){
            return $user->getRole();
        }
    }

    /**
     * Return the last connection
     * @return last connection
     */
    public function getLastAccess(){
    }

    /**
     * Return login user
     * @return login
     */
    public function getLogin(){
    }

    /**
     * Return email user
     * @return email 
     */
    public function getEmail(){
        $user = $this->getUser();
        if(is_object($user)){
            return $user->getEmail();
        }
    }

    /**
     * Create a new user
     */
    public function createUser(UserInterface $user){
        if(is_object($user) && !empty($user)){
            $this->getUManager()->create($user);
        }
    }

    /**
     * @return all user
     */
    public function getAllUser(){
        $build  = new BuildFactory();
        $factory = $build->getUserFactory();
        $users = $build->getUserManagerFactory()->getAllUser();
        $ObjectUser = [];
        foreach ($users as $user) {
           $role = (int) $user['role'];
           $user= $factory->createUser($user,$role);
           $ObjectUser[] = $user;
        }
        return  $ObjectUser;
    }

    /**
     * @return User of account
     */
    public function getUser(){
       $user = Session::getKey('user');
       if(!empty($user)&& is_object($user)){
           return $user;
       }
    }

   
   /**
     * Return boolean 
     * @return TRUE;
     */
    public function hasAdmin(){
        return $this->getRole() == Account::ROLE_ADMIN ? TRUE : FALSE;
    }

    /**
     * Return boolean 
     * @return TRUE;
     */
    public function hasEtudiant(){
         return $this->getRole() == Account::ROLE_ETUDIANT ? TRUE : FALSE;
    }

    /**
     * Return boolean 
     * @return TRUE;
     */
    public function hasEnseignant(){
         return $this->getRole() == Account::ROLE_ENSEIGNANT ? TRUE : FALSE;
    }
     
    /**
     * Display User Role
     * @param int| not null
     * 
     * @return use role
     */
    public function displayUserRole($role){
         $str="";
         $role = (int) $role;
         if(Account::ROLE_ADMIN === $role){
             $str = "Administrateur (enseignant).";
         }
         if(Account::ROLE_ENSEIGNANT ===$role ){
             $str = "Enseignant.";
         }
        if(Account::ROLE_ETUDIANT ===$role ){
             $str = "Etudiant.";
         }
        return $str;
    }

    /**
     * Proctege Page Admin
     */
    public function protectAdmin(){
        if(empty(Session::getKey('user')) ||  !$this->hasAdmin()){
            if($this->hasEnseignant()){
                 header("Location: http://localhost/bookpro/web/enseignant");
            }elseif($this->hasEtudiant()){
                header("Location: http://localhost/bookpro/web/etudiant");
            }else{
                header("Location: http://localhost/bookpro"); 
             }
         }
    }

    /**
     * Proctege Page Enseignant
     */
    public function protectEnseignant(){
        if(empty(Session::getKey('user')) ||  !$this->hasEnseignant()){
             if($this->hasAdmin()){
                header("Location: http://localhost/bookpro/web/Admin");
             }elseif($this->hasEtudiant()){
                header("Location: http://localhost/bookpro/web/etudiant");
             }else{
                header("Location: http://localhost/bookpro"); 
             }
        }
    }

    /**
     * Proctege Page Etudaint
     */
    public function protectEtudiant(){
        if(empty(Session::getKey('user')) ||  !$this->hasEtudiant()){
            if($this->hasEnseignant()){
                 header("Location: http://localhost/bookpro/web/enseignant");
            }elseif($this->hasAdmin()){
                header("Location: http://localhost/bookpro/web/Admin");
            }else{
                header("Location: http://localhost/bookpro"); 
             }
        }
    }

    /**
     * @return Nom Complet utilisatgeur
     *
     */
    public function getNomComplet(){
        $nomComplet = (string) ucfirst($this->getUser()->getPrenom()).' '.$this->getUser()->getNom();
        return $nomComplet;
    }
    public function enregistre($array = []){
        if(!empty($array)){
            if(isset($array['sign_up_user'])){
                $build  = new BuildFactory();
                $factory = $build->getUserFactory();
                $role = (int) $array['role']; 
                $validator = new Validator($array);
                $newUser = $factory->createUser($array,$role);
                $validator->newObectUser();

            }
        }
    }
    public function __destuct(){}
}
