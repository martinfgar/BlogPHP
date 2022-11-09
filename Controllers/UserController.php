<?php
namespace App\Controllers;
use App\Models\Usuario;
class UserController{
    
    public static function userForm(){
        require '../Views/userform.php';
    }

    public static function editForm(){
        require '../Views/updateuserform.php';
    }
    

    public static function editUser($data){
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
        
        $usr->rol    = isset($data['rol']) ;
        $usr->active = isset($data['active']);
        $usr->save();
        header('Location: /home');
        die();
    }
    public static function deleteUser($data){
        Usuario::get(['*'],['id' => $data['id']])[0]->delete();
        header('Location: /adminPanel');
        die();
    }

}