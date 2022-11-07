<?php

namespace App\Models;
use App\Config\Database;
abstract class Model
{
    public static ?int $id = null;

    /**
     * Devuelve un array con los objetos en cuestion

     * @param array $fields [fieldname1, fieldname2,...] default * 
     * @param array $filter [campo=>valor]
     */
    public static function get($fields = ['*'], $filter = [1 => 1])
    {
        $class = get_called_class();
        $conn = Database::getConexion();
        $tabla = $class::$tabla;
        array_walk($filter, function (&$val, $key) {
            $val = "{$key}='{$val}'";
        });

        array_push($fields, 'id');
        $query = "select " . implode(', ', $fields) . " from {$tabla} where " . implode('and ', $filter);

        $resultado = $conn->query($query);
        $results = [];
        // mostrar resultado
        while ($row = $resultado->fetch_assoc()) {
            $line = new $class();
            foreach ($row as $campo => $valor) {
                $line->$campo = $valor;
            }
            $results[]  = $line;
        }
        $resultado->close();
        return $results;
    }

    /**
     * Llamar a esta función cuando se quiera actualizar o guardar.
     * Intenta actualizar si el objeto tiene id. Si no intenta introducir uno nuevo.
     */
    public function save()
    {
        $conn = Database::getConexion();
        $class = get_called_class();
        $tabla = $class::$tabla;
        $arrayAttr = get_object_vars($this);
        $id = $this->id;     
        if ($id) {
            array_walk($arrayAttr, function (&$val, $key) {
                $val = "{$key}='{$val}'";
                
            });
            $values = implode(', ', $arrayAttr);
            $query = "update {$tabla} set {$values} where id={$id}";
        } else {
            $query = "insert into {$tabla} (" . (implode(', ', array_keys($arrayAttr))) . ") values (" . implode(',', array_map(function ($val) {
                return $val == null ? "NULL" : "'{$val}'";
            }, array_values($arrayAttr))) . ")";
        }
        $stmt = $conn->query($query);
        $conn->close();     
    }
}
