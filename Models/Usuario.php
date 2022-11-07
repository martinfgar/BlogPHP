<?php
namespace App\Models;

use App\Models\Post;
class Usuario extends Model{

    protected static string $tabla = 'user';
    public string $username;
    public string $password;
    public string $email;
    public static string $created_at;
    public ?string $last_login =  null;
    public int $active;
    public string $first_name;
    public string $last_name;
    public int $rol;

    public function posts(){
        return Post::get(['*'],['user_id' => $this->id]);
    }
}