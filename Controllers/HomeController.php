<?php

namespace App\Controllers;
use App\Models\Post;
class HomeController{

    public static function index(){
        $posts = Post::get();
        require '../Views/index.php';
    }
}
?>