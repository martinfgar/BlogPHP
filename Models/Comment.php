<?php
namespace App\Models;


class Comment extends Model{

    protected static string $tabla = 'comment';
    public string $name;
    public string $comment;
    public string $created_at;
    public int $status;
    public int $post_id;

     
}