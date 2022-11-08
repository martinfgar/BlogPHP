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
        $usuarios= Usuario::get();
        require '../Views/adminpanel.php';
    }
}
?>