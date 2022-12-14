<?php
namespace App\Controllers;
use App\Models\Usuario;
class UserController{
    
    public static function userForm(){
        if(!isset($_SESSION['user']) || $_SESSION['user']->rol == 0){
            header('Location: /forbidden');
            die();
        }
        require '../Views/userform.php';
    }

    public static function editForm(){
        if(!isset($_SESSION['user'])){
            header('Location: /forbidden');
            die();
        }
        require '../Views/updateuserform.php';
    }
    

    public static function editUser($data){
        if(!isset($_SESSION['user'])){
            header('Location: /forbidden');
            die();
        }
        if (!password_verify($data['current_password'],$_SESSION['user']->password)){
            $_SESSION['updateUserError'] = 'Incorrect current password';
            require '../Views/updateuserform.php';
            return;
        }
        $_SESSION['user']->first_name = $data['first_name'];
        $_SESSION['user']->last_name = $data['last_name'];
        $_SESSION['user']->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $_SESSION['user']->save();
        unset($_SESSION['updateUserError']);
        header('Location: /home');
        die();
    }
    public static function editUserAdmin($data){
       
        if(!isset($_SESSION['user']) || $_SESSION['user']->rol == 0){
            header('Location: /forbidden');
            die();
        }
        $usr = Usuario::get(['*'],['id'=> $data['id']])[0];
        $usr->first_name = $data['first_name'];
        $usr->last_name = $data['last_name'];
        $usr->email = $data['email'];
        $usr->username = $data['username'];
        $usr->rol = $data['rol'];
        $usr->active = $data['active'];
        $usr->save();
        header('Location: /adminPanel');
        die();
    }
   

    public static function createUser($data){
        if(!isset($_SESSION['user']) || $_SESSION['user']->rol == 0){
            header('Location: /forbidden');
            die();
        }
        if(count(Usuario::get(['*'],['username' => $data['username']]))>0){
            $_SESSION['newUserError'] = 'Username already in use.';
            require '../Views/userform.php';
            die();
        }
        if (count(Usuario::get(['*'],['email' => $data['email']]))>0){
            $_SESSION['newUserError'] = 'Email already in use.';
            require '../Views/userform.php';
            die();
        }
        unset($_SESSION['newUserError']);
        $usr = new Usuario();

        $usr->username = $data['username'];
        $usr->email = $data['email'];
        $usr->first_name = $data['first_name'];
        $usr->password = password_hash('root', PASSWORD_DEFAULT);
        $usr->last_name = $data['last_name'];
        
        $usr->rol    = isset($data['rol']) ;
        $usr->active = isset($data['active']);
        $usr->save();
        header('Location: /home');
        die();
    }

    public static function deleteUser($data){
        if(!isset($_SESSION['user']) || $_SESSION['user']->rol == 0){
            header('Location: /forbidden');
            die();
        } 
        Usuario::get(['*'],['id' => $data['id']])[0]->delete();
        if ($_SESSION['user']->id == $data['id']){
            unset($_SESSION['user']);
            header('Location: /home');
            die();
        }
        header('Location: /adminPanel');
        die();
    }

}