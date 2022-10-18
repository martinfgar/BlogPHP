<?php
namespace App;

$routes = [];

function route($path, $callback)
{
    global $routes;
    $routes[$path] = $callback;
}
route('/',function(){
    require 'Views/index.php';
});
route('/home',function(){   
    require 'Views/index.php';
});

route('/login', function(){
    header('Location: Views/Login/index.html');
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

