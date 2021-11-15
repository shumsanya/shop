<?php
namespace app\models;

use app\system\DB;

 class Model
{
    protected static $db;

    public function __construct()
    {
        self::getDB();
    }

    public static function getDB()
    {
        if(empty(self::$db)) {
            self::$db = DB::connToDB();
        }
        return self::$db;
    }
}