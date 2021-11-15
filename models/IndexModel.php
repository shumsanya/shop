<?php
namespace app\models;

use PDO;
use PDOException;

class IndexModel extends Model
{

    public static function getProducts()
    {
        $sql = "SELECT * FROM `products` ";
        $stm =  self::getDB()->prepare($sql);
        /*$stm->bindParam(':beginning_of_choice', $beginning_of_choice, PDO::PARAM_INT);
        $stm->bindParam(':number_of_lines', $number_of_lines, PDO::PARAM_INT);  */
        $stm->execute();
        return $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function setUser($name)
    {
        $sql = "INSERT INTO `user` (`name`) VALUES (:name); ";
        $stm =  self::getDB()->prepare($sql);
        $stm->bindParam(':name', $name);
        $stm->execute();
        return $data = $stm->fetch(PDO::FETCH_ASSOC);
    }

    public static function getUserId($name)
    {
        $sql = "SELECT `id` FROM `user` WHERE `name` = :name";
        $stm =  self::getDB()->prepare($sql);
        $stm->bindParam(':name', $name);
        $stm->execute();
        return $data = $stm->fetch(PDO::FETCH_ASSOC);
    }

     public static function setRatingInfo($rating, $product_id)
    {
        $user_id = $_SESSION['user'];

        $sql = "INSERT INTO `rating_info` (`product_id`, `user_id`, `rating`) VALUES  (:product_id, :user_id, :rating)";
        $stm =  self::getDB()->prepare($sql);
        $stm->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stm->bindParam(':rating', $rating, PDO::PARAM_INT);
        $stm->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stm->execute();

        return $data = $stm->fetch(PDO::FETCH_ASSOC);
    }

    public static function getRatingInfo($product_id)
    {
        $sql = "SELECT `rating` FROM `rating_info` WHERE `product_id` = :product_id";
        $stm =  self::getDB()->prepare($sql);
        $stm->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stm->execute();
        return $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function setRating($rating, $product_id)
    {
        $sql = "UPDATE `products` SET `rating` = :rating WHERE `products`.`id` = :product_id";
        $stm =  self::getDB()->prepare($sql);
        $stm->bindParam(':rating', $rating, PDO::PARAM_INT);
        $stm->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stm->execute();
        return $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    /*public static function getRating($product_id)
    {
        $sql = "SELECT `rating` FROM `products` WHERE `id` = :product_id";
        $stm =  self::getDB()->prepare($sql);
        $stm->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stm->execute();
        return $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    }*/

}