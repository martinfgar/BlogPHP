<?php

namespace App\Models;

include 'Model.php';

class Post extends Model
{

    private static string $tabla = 'post';
    public static ?int $id = null;
    public string $title;
    public string $brief;
    public string $content;
    public string $image;
    public string $created_at;
    public bool $status;
    public int $user_id;



    /**
     * Devuelve un array con objetos Post
     * @param array $filter [campo=>valor]
     */
    public static function get($filter = [1=>1])
    {
        $conn = Self::getConexion();
        $tabla = self::$tabla;
        array_walk($filter, function (&$val, $key) {
            $val = "{$key}='{$val}'";
        });
        
        $query = "select * from {$tabla} where ".implode('and ',$filter);
        $resultado = $conn->query($query);
        $posts = [];
        // mostrar resultado
        while ($row = $resultado->fetch_assoc()) {
            $post = new Post();
            $post->id         = $row['id'];
            $post->title      = $row['title'];
            $post->brief      = $row['brief'];
            $post->content    = $row['content'];
            $post->image      = $row['image'];
            $post->created_at = $row['created_at'];
            $post->status     = $row['status'];
            $post->user_id    = $row['user_id'];
            $post->last_name  = $row['last_name'];
            $posts[]  = $post;
        }
        $resultado->close();
        return $posts;
    }


    /**
     * Llamar a esta función cuando se quiera actualizar o guardar.
     * Intenta actualizar si el post tiene id. Si no intenta introducir uno nuevo.
     */
    public function save()
    {
        $conn = Self::getConexion();
        $tabla = self::$tabla;
        $arrayAttr = get_object_vars($this);
        $id = self::$id;
        if ($id) {
            array_walk($arrayAttr, function (&$val, $key) {
                $val = "{$key}='{$val}'";
            });
            $values = implode(', ', $arrayAttr);
            $query = "update {$tabla} set {$values} where id={$id}";
            echo $query;
        } else {
            $query = "insert into {$tabla} (" . (implode(', ', array_keys($arrayAttr))) . ") values (" . implode(',', array_map(function ($val) {
                return "'{$val}'";
            }, array_values($arrayAttr))) . ")";
        }
        $stmt = $conn->query($query);
        $stmt->close();
    }
}
