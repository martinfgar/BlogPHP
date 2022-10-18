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

    * @param array $fields [fieldname1, fieldname2,...] default * 
    * @param array $filter [campo=>valor]
   */
    public static function get($fields = ['*'],$filter = [1=>1]){

        $conn = Self::getConexion();
        $tabla = self::$tabla;
        array_walk($filter, function (&$val, $key) {
            $val = "{$key}='{$val}'";
        });

        array_push($fields,'id');
        $query = "select ".implode(', ',$fields)." from {$tabla} where ".implode('and ',$filter);

        $resultado = $conn->query($query);
        $usuarios = [];
        // mostrar resultado
        while ($row = $resultado->fetch_assoc()) {
           $user = new Usuario();
           foreach ($row as $campo=>$valor){
                $user->$campo = $valor;
           }
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