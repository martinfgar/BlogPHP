<?php
namespace App\Models;
include 'Model.php';


class Usuario extends Model{

    private static string $tabla = 'user';
    public static ?int $id = null;
    public string $username;
    public string $password;
    public string $email;
    public string $created_at;
    public string $last_login;
    public bool $active;
    public string $first_name;
    public string $last_name;
    public int $rol;
    
   /**
    * Devuelve un array con objetos Usuario
    * @param $filter Array con estructura campo => valor
   */
    public static function get($filter = [1=>1]){
        $conn = Self::getConexion();
        $tabla = self::$tabla;
        array_walk($filter, function (&$val, $key) {
            $val = "{$key}='{$val}'";
        });
        $query = "select * from {$tabla} where ".implode('and ',$filter);
        $resultado = $conn->query($query);
        $usuarios = [];
        // mostrar resultado
        while ($row = $resultado->fetch_assoc()) {
           $user = new Usuario();
           $user->id         = $row['id'];
           $user->username   = $row['username'];
           $user->password   = $row['password'];
           $user->email      = $row['email'];
           $user->created_at = $row['created_at'];
           $user->last_login = $row['last_login'];
           $user->active     = $row['active'];
           $user->first_name = $row['first_name'];
           $user->last_name  = $row['last_name'];
           $user->rol        = $row['rol']; 
           $usuarios[]  = $user;
        }
        $resultado->close();
        return $usuarios;
    }

     /**
        * Llamar a esta función cuando se quiera actualizar o guardar.
        * Intenta actualizar si el usuario tiene id. Si no intenta introducir uno nuevo.
      */
    public function save(){
        $conn = Self::getConexion();
        $tabla = self::$tabla;
        $arrayAttr = get_object_vars($this);
        $id = self::$id;
        if($id){
            array_walk($arrayAttr,function (&$val,$key){$val = "{$key}='{$val}'";});
            $values = implode(', ',$arrayAttr);
            $query = "update {$tabla} set {$values} where id={$id}";
            echo $query;
        }else{
            $query = "insert into {$tabla} (".(implode(', ',array_keys($arrayAttr))).") values (".implode(',',array_map(function($val){return "'{$val}'";},array_values($arrayAttr))).")";
        }
        $stmt = $conn->query($query); 
        $stmt->close();
    }
}