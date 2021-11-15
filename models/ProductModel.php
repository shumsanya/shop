<?php

namespace app\models;

use PDO;
use PDOException;

class ProductModel extends Model
{

    public static function getProduct($id=1)
    {
        $sql = "SELECT * FROM `products` WHERE id = :id";
       // $stm =  self::$db->prepare($sql);
        $stm =  self::getDB()->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $data = $stm->fetch(PDO::FETCH_ASSOC);
    }
}