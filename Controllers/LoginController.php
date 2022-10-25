<?php

namespace App\Controllers;
use App\Models\Usuario;
class LoginController{

    public static function index(){
        require '../Views/login.php';
    }

    public static function checkUser($params){
        $users = Usuario::get(['*'],['username' => $params['username']]);
        if (count($users) == 0){
            $_SESSION['loginError'] = 'User not found.';
            header('Location: /login');
            die();
        }
        if (password_verify($params['password'],$users[0]->password)){
            $_SESSION['user'] = $users[0]->id;
            unset($_SESSION['loginError']);
            header('Location: /home');
            die();
        }
        $_SESSION['loginError'] = 'User or password are incorrect';
        header('Location: /login');
        die();
    }

    public static function logout(){
        unset($_SESSION['user']);
        header('Location: /home');
        die();
    }
}
?>