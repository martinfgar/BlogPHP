<?php

namespace App\Controllers;

use App\Config\Database;
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
    public static function getPostEditForm($id){
        if (!isset($_SESSION['user'])){
            header('Location: /login');
            die();
        }
        $post = Post::get(['*'],['id' => $id])[0];
        require '../Views/postform.php';
    }

    public static function createPost($data,$image){
        if(!isset($_SESSION['user'])){
            header('Location: /forbidden');
            die();
        }
        $post = isset($data['id']) ? Post::get(['*'],['id' => $data['id']])[0] : new Post();
        $post->title = $data['title'];
        $post->brief = $data['brief'];
        $post->content = $data['content'];
        $post->user_id = $_SESSION['user']->id;
        $conn = Database::getConexion();
        if ($image['image']['size'] != 0){
            $post->image = mysqli_real_escape_string($conn,base64_encode(file_get_contents($image['image']['tmp_name'])));
        }
        $conn->close();
        $post->save();
        header('Location: /home');
        die();
    }

    public static function createComment($data){
        $comentario = new Comment();
        $comentario->post_id = $data['post_id'];
        $comentario->user_id = $_SESSION['user']->id;
        $comentario->comment = $data['comment'];
        $comentario->status = 1;
        $comentario->save();
        header("Location: /blog?id={$data['post_id']}");
        die();
    }

    public static function editComment($data){
        $comentario = Comment::get(['*'],['id' => $data['id']])[0];
        $comentario->comment = $data['comment'];
        $comentario->save();
        header("Location: /blog?id={$comentario->post_id}");
        die();
    }

    public static function deleteComment($data){
        $comentario = Comment::get(['*'],['id' => $data['id']])[0];
        if ($_SESSION['user']->id != $comentario->author()->id && $_SESSION['user']->id != $comentario->post()->author()->id){
            header('Location: /forbidden');
            die();
        }
        $comentario->delete();
        header("Location: /blog?id={$comentario->post_id}");
        die();
    }

    public static function deletePost($data){
        if(!isset($_SESSION['user']) || $_SESSION['user']->rol == 0){
            header('Location: /forbidden');
            die();
        }
        Post::get(['*'],['id' => $data['id']])[0]->delete();
        header('Location: /adminPanel');
        die();
    }
}
