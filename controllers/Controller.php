<?php
namespace app\controllers;

use app\models\Model;
use app\system\View;

abstract class Controller
{
    public $view;
    protected $template;
    protected $pageData = array();


    public function __construct()
    {
        $this->view = new View();
        $this->template = $this->nameClass();

        // initialize session variables
        if (!isset($_SESSION['purse']))
        {
            $_SESSION['purse'] = 100.00;
        }

        if (!isset($_SESSION['cart_list']))
        {
             $_SESSION['cart_list'] = [];
             $_SESSION['statusDelivery'] = 0;
        }
    }


    protected function nameTemplate($file)
    {
        $re = '~^(\P{Lu}*\p{Lu}.*?)\s*(\p{Lu}.*)$~us';
        preg_match($re, $this->nameClass(), $matches);
        $x = explode("\\", $matches[1]);
        return strtolower($x[2].'/'.$file.'.php');
    }
}