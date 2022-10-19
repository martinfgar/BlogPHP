<?php
namespace App;
require 'Models/Post.php';
//require 'Models/Usuario.php';
use App\Models\Post;
use App\Models\Usuario;
$routes = [];

function route($path, $callback)
{
    global $routes;
    $routes[$path] = $callback;
}
route('/',function(){
    //Cargar datos de los posts con imagen, fecha, id y titulo 
    $posts = Post::get();
    require 'Views/index.php';
});
route('/home',function(){ 
    //Cargar datos de los posts con imagen, fecha, id y titulo
    $posts = Post::get(); 
    require 'Views/index.php';
});

route('/login', function(){
    require 'Views/login.php';
});

route('/blog', function(){
    //comprobar por get el post a mostrar
    //Cargar el post entero
    require 'Views/blog-details.php';
});
function run()
{
    global $routes;
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $position = strpos($uri, '?');
    if ($position !== false) {
        $uri = substr($uri, 0, $position);
    }
    foreach ($routes as $path => $callback){
        if ($path !== $uri) continue;

        $callback();
    }

}
run();

