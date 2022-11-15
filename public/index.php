<?php

namespace App;
require '../Models/Model.php';
require '../Models/Comment.php';
require '../Models/Usuario.php';
require '../Models/Post.php';
require '../Config/Dotenv.php';
require '../Config/Database.php';
require '../Controllers/PostController.php';
require '../Controllers/HomeController.php';
require '../Controllers/UserController.php';
require '../Controllers/LoginController.php';
session_start();

use App\Config\Dotenv;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\PostController;
use App\Controllers\UserController;

(new Dotenv('../.env'))->load();
$routes = [];

function route($path, $callback)
{
    global $routes;
    $routes[$path] = $callback;
}
route('/',$fn = fn() => HomeController::index());
route('/index',$fn = fn() => HomeController::index());
route('/home',$fn = fn() => HomeController::index());
route('/userform', $fn = fn()=> UserController::userForm());
route('/user', $fn = fn() => UserController::createUser($_POST));
route('/comment', $fn = fn() => PostController::createComment($_POST));
route('/comment-edit', $fn = fn() => PostController::editComment($_POST));
route('/deletecomment',$fn = fn() => PostController::deleteComment($_GET));
route('/login', $fn = fn() => LoginController::index());
route('/newpost', $fn = fn() => PostController::getPostForm());
route('/blog', $fn= fn() =>PostController::get($_GET['id']));
route('/userlogin', $fn = fn() => LoginController::checkUser($_POST));
route('/post', $fn = fn() => PostController::createPost($_POST, $_FILES));
route('/edit', $fn= fn() => PostController::getPostEditForm($_GET['id']));
route('/logout' ,$fn = fn() => LoginController::logout());
route('/editUser', $fn = fn() => UserController::editForm());
route('/updateUser',$fn = fn() => UserController::editUser($_POST));
route('/adminPanel',$fn = fn() => HomeController::adminPanel());
route('/deleteuser',$fn = fn() => UserController::deleteUser($_GET));
route('/deletepost',$fn = fn() => PostController::deletePost($_GET));
route('/edituser-admin',$fn = fn() => UserController::editUserAdmin($_POST));
route('/forbidden', $fn = fn() => require('../Views/401.php'));
function run()
{   
    global $routes;
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $uri =  array_shift(explode('?',$uri));
    
    foreach ($routes as $path => $callback){
        if ($path !== $uri) continue;

        $callback();
        return;
    }
    require '../Views/404.php';
}
run();

