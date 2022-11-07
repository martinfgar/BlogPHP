<?php

namespace App\Models;

use App\Models\Usuario;
use App\Models\Comment;
class Post extends Model
{

    protected static string $tabla = 'post';
    public string $title;
    public string $brief;
    public string $content;
    public string $image;
    public static string $created_at;
    public bool $status;
    public int $user_id;


    public function comments(){
        return Comment::get(['*'], ['post_id' => $this->id]);
    }
    public function author(){
        return Usuario::get(['*'],['id'=> $this->user_id])[0];
    }
}
