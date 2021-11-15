<?php
namespace app\system;

use PDO;

class DB{

    private static $connection;

    public static function connToDB()
    {
        if(empty(self::$connection))
        {
            self::$connection = self::init();
        }
        return self::$connection;
    }

    private static function init()
    {
        $dbConfig = ConfigReader::get('bd', []);

        $conn = new PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['password']);
        return $conn;
    }
}