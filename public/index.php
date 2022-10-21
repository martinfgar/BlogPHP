<?php
namespace App;
require '../Models/Model.php';
require '../Models/Comment.php';
require '../Models/Usuario.php';
require '../Models/Post.php';
require '../Config/Dotenv.php';
require '../Config/Database.php';




use App\Models\Post;
use App\Config\Dotenv;

(new Dotenv('../.env'))->load();
$routes = [];
$getParams = [];
$postParams = [];
function route($path, $callback)
{
    global $routes;
    $routes[$path] = $callback;
}
route('/',function(){
    //Cargar datos de los posts con imagen, fecha, id y titulo 
    $posts = Post::get();
    require '../Views/index.php';
});
route('/home',function(){ 
    //Cargar datos de los posts con imagen, fecha, id y titulo
    $posts = Post::get(); 
    require '../Views/index.php';
});

route('/login', function(){
    require '../Views/login.php';
});

route('/blog', function(){
    //comprobar por get el post a mostrar
    global $getParams;
    $id_blog =  $getParams['id'];
    $post = Post::get(['*'],['id'=> $id_blog])[0];
    $comments = $post->comments();
    $author = $post->author();
    //Cargar el post entero
    require '../Views/blog-details.php';
});
function run()
{   
    global $routes;
    
    echo $_POST['name'];
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $params = explode('?',$uri);
    $uri =  array_shift($params);
    if (count($params)>0){
        global $getParams;
        $getParams = [];
        foreach($params as $param){
            $getParams[explode('=',$param)[0]] = explode('=',$param)[1];
        }
    }
    foreach ($routes as $path => $callback){
        if ($path !== $uri) continue;

        $callback();
        return;
    }
    require '../Views/404.php';
}
run();

