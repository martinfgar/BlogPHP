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


use App\Config\Dotenv;
use App\Controllers\HomeController;
use App\Controllers\PostController;

(new Dotenv('../.env'))->load();
$routes = [];
$getParams = [];
$postParams = $_POST;
function route($path, $callback)
{
    global $routes;
    $routes[$path] = $callback;
}
route('/',$fn = fn() => HomeController::index());
route('/index',$fn = fn() => HomeController::index());
route('/home',$fn = fn() => HomeController::index());
route('/comment', $fn = fn() => PostController::createComment($GLOBALS['postParams']));

route('/login', function(){
    require '../Views/login.php';
});

route('/blog', $fn= fn() =>PostController::get($GLOBALS['getParams']['id']));

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

