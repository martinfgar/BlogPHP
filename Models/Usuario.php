<?php
namespace App\Models;

use DateTime;

class Usuario extends Model{

    private static string $tabla = 'user';
    public int $id;
    public string $username;
    public string $password;
    public string $email;
    public string $created_at;
    public string $last_login;
    public bool $active;
    public string $first_name;
    public string $last_name;
    public int $rol;
    
   /*
    Funcion para obtener los usuarios de la base de datos
   */
    public static function get(){
        $conn = Self::getConexion();
        $tabla = self::$tabla;
        $query = "select * from {$tabla}";
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

     /*
        Funcion para crear y editar
    */
    public function Save(){
        $conn = Self::getConexion();
        $tabla = self::$tabla;
        $query = "insert into {$tabla} values (".implode(',',get_object_vars($this)).") on duplicate key update password=?, name=?";
        $stmt = $conn->prepare($query); 
        $stmt->bind_param("sssss", $this->username,$this->password,$this->name,$this->password,$this->name);
        $stmt->execute();
        $stmt->close();
    }
}