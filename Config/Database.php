<?php
namespace App\Config;

class Database{


    public static function getConexion()
    {

        return new \mysqli(getenv('DB_HOSTNAME'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'), getenv('DB_PORT'));
    }
}