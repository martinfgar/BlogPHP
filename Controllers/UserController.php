<?php
namespace App\Controllers;
use App\Models\Usuario;
class UserController{
    
    public static function userForm(){
        require '../Views/userform.php';
    }

    public static function createUser($data){
        
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
        
        $usr->rol    = isset($data['rol']) ? 1 : 0;
        $usr->active = isset($data['active']) ? 1: 0;
        $usr->save();
        header('Location: /home');
        die();
    }
}