<?php

namespace app\controllers;

use app\models\CartModel;


class CartController extends Controller
{
    public function Index()
    {
        $this->pageData['title'] = "Cart";

        if ( count($_SESSION['cart_list']) <= 0 )
        {
            $this->pageData['cart_is_empty'] = 'There are no items in the cart';
        }

        return $this->view->render($this->nameTemplate('index'), $this->pageData);
    }


    function nameClass()
    {
        return get_class($this) ;
    }

    public function OrderSend()
    {
        if ( count($_SESSION['cart_list']) > 0)
        {
            $this->pageData['title'] = "Order send";
            $date = date('Y-m-d H:i:s');
            $userId = $_SESSION['user'];

            CartModel::addProduct($userId, $_SESSION['statusDelivery'], $date);
            $order_last_id = CartModel::getLastId();

            $this->pageData['order'] = $order_last_id[0];

            foreach ($_SESSION['cart_list'] as $item)
            {
                CartModel::insertProduct($order_last_id[0], $item['id'], $item['quantity']);
            }
            $this->pageData['purse'] = $_SESSION['purse'];

            unset( $_SESSION['cart_list'] );
        }

        return $this->view->render($this->nameTemplate('orderSend'), $this->pageData);
    }
}