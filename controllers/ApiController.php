<?php

namespace app\controllers;

use app\models\ProductModel;
use app\models\IndexModel;


class ApiController extends Controller
{
    public function AddToCart()
    {
        $id_product = $_POST['current_id'];
        $quantity = $_POST['quantity'];

        if ( array_key_exists($id_product, $_SESSION['cart_list']) )
        {
            echo ('product isset');
        }
        else
        {
            $_SESSION['cart_list'][$id_product] = ProductModel::getProduct($id_product);

            $_SESSION['cart_list'][$id_product]['quantity'] = $quantity;

            echo  count($_SESSION['cart_list']);
            die;
        }
    }

    public function DeleteItem()
    {
        $current_id = $_POST['delete'];

        unset( $_SESSION['cart_list'][$current_id] );

        print_r( $_SESSION['cart_list']);
    }

    public function ChangePrice()
    {
        $current_id = $_POST['current_id'];
        $quantity = $_POST['quantity'];

        $_SESSION['cart_list'][$current_id]['quantity'] = $quantity;

        $productPrice = $_SESSION['cart_list'][$current_id]['quantity'] * $_SESSION['cart_list'][$current_id]['price'];
        $totalPrice = 0;

        foreach ($_SESSION['cart_list'] as $item)
        {
            $sum = $item['quantity'] * $item['price'];
            $totalPrice = $totalPrice + $sum;
        }

        echo ( json_encode( array('productPrice' => $productPrice, 'totalPrice' => $totalPrice)) );
    }

    public function GetPurse()
    {
        $purse = $_SESSION['purse'];

        echo $purse;
    }

    public function ChangeStatusDelivery()
    {
        $statusDelivery = $_POST['status'];
        $_SESSION['statusDelivery'] = $statusDelivery;
        echo $statusDelivery;
    }

    public function GetStatusDelivery()
    {
        $statusDelivery = $_SESSION['statusDelivery'];
        echo $statusDelivery;
    }

    public function ChangeQuantity()
    {
        $current_id = $_POST['current_id'];
        $quantity = $_POST['quantity'];

        $_SESSION['cart_list'][$current_id]['quantity'] = $quantity;

        echo ( json_encode( $_SESSION['cart_list']) );
    }

    public function GetUser()
    {
        if (! isset($_SESSION['user']))
        {
            $userName = $_COOKIE['PHPSESSID'];
            IndexModel::setUser($userName);
            $user_id = IndexModel::getUserId($userName);
            $_SESSION['user'] = $user_id['id'];

            echo('user_id - '.$user_id['id'] );
        }
    }

    function SetRating()
    {
        $rating = $_POST['rating'];
        $product_id = $_POST['product_id'];

        if (isset($_SESSION['rating_status'][$product_id ]) != 1)
        {
            IndexModel::setRatingInfo($rating, $product_id) ;
            $rating = $this->GetRatingInfo($product_id);
            IndexModel::setRating($rating, $product_id);

            $_SESSION['rating_status'][$product_id ] = 1;

            echo ('ok');
        }
    }

    function GetRatingInfo($product_id)
    {
       $ratings = IndexModel::getRatingInfo($product_id) ;
       $rating = 0;

       foreach ($ratings as $item)
       {
           $rating += $item['rating'];
       }
        $rating = $rating / count($ratings);

      return $rating;
    }

    function ChangePurse()
    {
       $total_price = $_POST['total_price'];
       $purse = $_SESSION['purse'];

       $balance = $purse - $total_price;
       $_SESSION['purse'] = $balance;

       echo $balance;
    }

    function nameClass()
    {
        return get_class($this) ;
    }
}