<?php

namespace app\system;


class ConfigReader
{
    const FILE_PATH = ROOT . '/config/bd.php';

    private static $data = [];

    private static function init()
    {
        self::$data = include self::FILE_PATH;
    }

    public static function get($key, $default = null)
    {
        if(empty(self::$data)) {
            self::init();
        }

        return isset(self::$data[$key]) ? self::$data[$key] : $default;
    }
}