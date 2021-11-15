<?php

namespace app\models;

use PDO;
use PDOException;

class CartModel extends Model
{
    public static function getProducts($id)
    {
        $sql = "SELECT * FROM `products` WHERE id = :id";
        $stm =  self::getDB()->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getLastId()
    {
        $sql = "SELECT MAX(Id) FROM `orders`";
        $stm =  self::getDB()->prepare($sql);
        $stm->execute();
        return $data = $stm->fetch();
    }

    public static function addProduct($user_id, $delivery, $date)
    {
        $sql = "INSERT INTO `orders` (`user_id`, `delivery`, `date`) VALUES (:user_id, :delivery, :date)";
        $stm =  self::getDB()->prepare($sql);
        $stm->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stm->bindParam(':delivery', $delivery, PDO::PARAM_INT);
        $stm->bindParam(':date', $date);
        $stm->execute();

        return $data = $stm->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertProduct($order_id, $product_id, $amount)
    {
        $sql = "INSERT INTO `order_info` (`order_id`, `product_id`, `amount`) VALUES (:order_id, :product_id, :amount)";
        $stm =  self::getDB()->prepare($sql);
        $stm->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stm->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stm->bindParam(':amount', $amount, PDO::PARAM_INT);
        $stm->execute();

        return $data = $stm->fetch(PDO::FETCH_ASSOC);
    }


}