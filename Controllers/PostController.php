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

    public static function getPostForm(){
        if (!isset($_SESSION['user'])){
            header('Location: /login');
            die();
        }
        require '../Views/postform.php';
    }

    public static function createPost($data,$image){
        $post = new Post();
        $post->title = $data['title'];
        $post->brief = $data['brief'];
        $post->content = $data['content'];
        $post->user_id = $_SESSION['user'];
        $post->image = file_get_contents($image['image']['tmp_name']);
        $post->save();
        header('Location: /home');
        die();
        
        
        
    }

    public static function createComment($data){
        $comentario = new Comment();
        $comentario->post_id = $data['post_id'];
        $comentario->name = $data['name'];
        $comentario->comment = $data['comment'];
        $comentario->status = 1;
        $comentario->save();
        header("Location: /blog?id={$data['post_id']}");
        die();
    }

}
