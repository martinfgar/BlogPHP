<?php

namespace App\Controllers;
use App\Models\Post;
use App\Models\Usuario;

class HomeController{

    public static function index(){
        $posts = Post::get();
        require '../Views/index.php';
    }

    public static function adminPanel(){
        if(!isset($_SESSION['user']) || $_SESSION['user']->rol == 0){
            header('Location: /forbidden');
            die();
        }
        $posts = Post::get();
        $usuarios= Usuario::get();
        require '../Views/adminpanel.php';
    }
}
?>