<?php
namespace App\Models;


class Comment extends Model{

    protected static string $tabla = 'comment';
    public int $user_id;
    public string $comment;
    public static string $created_at;
    public int $status;
    public int $post_id;

    public function author(){
        return Usuario::get(['*'],['id'=> $this->user_id])[0];
    }
    public function post(){
        return Post::get(['*'],['id' => $this->post_id])[0];
    }
}