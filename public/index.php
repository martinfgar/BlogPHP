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
$getParams = [];
$postParams = $_POST;
$files = $_FILES;
function route($path, $callback)
{
    global $routes;
    $routes[$path] = $callback;
}
route('/',$fn = fn() => HomeController::index());
route('/index',$fn = fn() => HomeController::index());
route('/home',$fn = fn() => HomeController::index());
route('/userform', $fn = fn()=> UserController::userForm());
route('/user', $fn = fn() => UserController::createUser($GLOBALS['postParams']));
route('/comment', $fn = fn() => PostController::createComment($GLOBALS['postParams']));
route('/login', $fn = fn() => LoginController::index());
route('/newpost', $fn = fn() => PostController::getPostForm());
route('/blog', $fn= fn() =>PostController::get($GLOBALS['getParams']['id']));
route('/userlogin', $fn = fn() => LoginController::checkUser($GLOBALS['postParams']));
route('/post', $fn = fn() => PostController::createPost($GLOBALS['postParams'], $GLOBALS['files']));
route('/edit', $fn= fn() => PostController::getPostEditForm($GLOBALS['getParams']['id']));
route('/logout' ,$fn = fn() => LoginController::logout());
route('/editUser', $fn = fn() => UserController::editForm());
function run()
{   
    
    global $routes;
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $params = explode('?',$uri);
    $uri =  array_shift($params);
    if (count($params)>0){
        foreach($params as $param){
            $GLOBALS['getParams'][explode('=',$param)[0]] = explode('=',$param)[1];
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $uri = '/'.$_POST['item'];
    }
    foreach ($routes as $path => $callback){
        if ($path !== $uri) continue;

        $callback();
        return;
    }
    require '../Views/404.php';
}
run();

