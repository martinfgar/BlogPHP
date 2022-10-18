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
     * @param array $fields [fieldname1, fieldname2,...] default * 
     * @param array $filter [campo=>valor]
     */
    public static function get($fields = ['*'],$filter = [1=>1])
    {
        $conn = Self::getConexion();
        $tabla = self::$tabla;
        array_walk($filter, function (&$val, $key) {
            $val = "{$key}='{$val}'";
        });
        array_push($fields,'id');
        $query = "select ".implode(', ',$fields)." from {$tabla} where ".implode('and ',$filter);
        $resultado = $conn->query($query);
        $posts = [];
        // mostrar resultado
        while ($row = $resultado->fetch_assoc()) {
            $post = new Post();
            foreach ($row as $campo=>$valor){
                $post->$campo = $valor;
            }
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
