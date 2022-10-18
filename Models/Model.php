<?php
namespace App\Models;
include 'Config.php';
use App\Config;

(new Config('.env'))->load();
abstract class Model{
    public static function getConexion(){
        return new \mysqli(getenv('DB_HOSTNAME'),getenv('DB_USER'),getenv('DB_PASSWORD'),getenv('DB_NAME'));
    }
}



