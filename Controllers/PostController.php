<?php

namespace App\Controllers;
use App\Models\Post;
use App\Models\Comment;
class PostController{

    public static function get($id){
        
        $post = Post::get(['*'],['id'=> $id])[0];
        $comments = $post->comments();
        $author = $post->author();
        //Cargar el post entero
        require '../Views/blog-details.php';
    }

    public function createPost(){

    }

    public static function createComment($data){
        $comentario = new Comment();
        $comentario->post_id = $data['post_id'];
        $comentario->name = $data['name'];
        $comentario->comment = $data['comment'];
        $comentario->status = 1;
        $comentario->save();
    }

}