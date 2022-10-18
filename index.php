<?php
    namespace App;
    include 'Models/Usuario.php';
    use App\Models\Usuario;

    $user = new Usuario();
    $user::$id         = 2;
    $user->username   = 'MarioZz99';
    $user->password   = 'abcde';
    $user->email      = 'mario@hola.com';
    $user->created_at = date('Y-m-d H:i:s');
    $user->last_login = date('Y-m-d H:i:s');
    $user->active     = 1;
    $user->first_name = 'Mario';
    $user->last_name  = 'Bros';
    $user->rol        = 0;
    $user->save();
